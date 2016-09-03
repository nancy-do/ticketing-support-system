<?php

/**
 * Created by PhpStorm.
 * User: WaiTung Yuen
 * Date: 4/08/2016
 * Time: 22:47
 * Reference: http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
 */

include('Ticket.php');

class TicketPDO
{
    private $db;
    private static $instance;

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new TicketPDO();
        }

        return static::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct() {
        try {
            $this->db = new PDO("sqlite:.." . DIRECTORY_SEPARATOR . "tickets.db");

            // Set errormode to exceptions
            $this->db->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
            $this->createTables();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function createTables() {
        try {
            // TICKET INFO TABLE
            $this->db->exec("CREATE TABLE IF NOT EXISTS ticketInfo(
                    ticket_id text PRIMARY KEY,
                    issue text,
                    status text)");

            // USER INFO TABLE
            $this->db->exec("CREATE TABLE IF NOT EXISTS userInfo(
                    ticket_id text PRIMARY KEY,
                    firstName text,
                    lastName text,
                    email text,
                    os text,
                    FOREIGN KEY (ticket_id) REFERENCES ticketInfo(ticket_id))");

            // COMMENTS TABLE (comments are stored as a serialised array)
            $this->db->exec("CREATE TABLE IF NOT EXISTS comments(
                    ticket_id text PRIMARY KEY,
                    comments text,
                    FOREIGN KEY (ticket_id) REFERENCES ticketInfo(ticket_id))");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * @param Ticket $ticket
     */
    public function insertData(Ticket $ticket) {
        try {
            // TICKET INFO INSERT
            $insert = "INSERT INTO ticketInfo(ticket_id, issue, status) VALUES (?, ?, ?)";
            $sql = $this->db->prepare($insert);
            $sql->execute([$ticket->getID(), $ticket->getIssue(), $ticket->getStatus()]);

            // USER INFO INSERT
            $insert = "INSERT INTO userInfo(ticket_id, firstName, lastName, email, os) VALUES (?, ?, ?, ?, ?)";
            $sql = $this->db->prepare($insert);
            $sql->execute([$ticket->getID(), $ticket->getFirstName(), $ticket->getLastName(), $ticket->getEmail(), $ticket->getOS()]);

            // COMMENTS INSERT
            $insert = "INSERT INTO comments(ticket_id, comments) VALUES (?, ?)";
            $sql = $this->db->prepare($insert);
            $sql->execute([$ticket->getID(), serialize($ticket->getComments())]);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getIDs()
    {
        try
        {
            return $this->db->query("SELECT ticket_id FROM ticketInfo");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getIdData($id)
    {
        // This now returns a ticket constructed from the 3 tables
        try
        {
            // prevent sql injection by preparing, then executing
            $ticketInfo = $this->db->prepare("SELECT U.firstName, U.lastName, U.email, U.os, T.issue, T.status, C.comments
                                                FROM userInfo U NATURAL JOIN ticketInfo T NATURAL JOIN comments C
                                                WHERE T.ticket_id = ?");
            $ticketInfo->execute([$id]);
            $data = $ticketInfo->fetch(PDO::FETCH_OBJ);

            // Check if query was successful
            if (!isset($data->firstName))
            {
                return null;
            }

            return new Ticket($data->firstName, $data->lastName, $data->email, $data->os, $data->issue, $data->status, unserialize($data->comments), $id);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    private function drop()
    {
        try
        {
            $this->db->exec("DROP TABLE ticketInfo");
            $this->db->exec("DROP TABLE userInfo");
            $this->db->exec("DROP TABLE comments");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

}