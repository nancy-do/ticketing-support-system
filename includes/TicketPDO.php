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
            //$this->db = new PDO('sqlite:..\tickets.db');      /* WINDOWS */
            $this->db = new PDO('sqlite:../tickets.db');        /* LINUX, MAC */

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
            /*$this->db->exec("CREATE TABLE IF NOT EXISTS tickets(
                    ticket_id TEXT,
                    firstName TEXT,
                    lastName TEXT,
                    email TEXT,
                    os TEXT,
                    issue TEXT,
                    comments TEXT,
                    status TEXT)");*/

            // TICKET INFO TABLE
            $this->db->exec("CREATE TABLE IF NOT EXISTS ticketInfo(
                    ticket_id text PRIMARY KEY,
                    issue text,
                    status text)");

            // USER INFO TABLE
            $this->db->exec("CREATE TABLE IF NOT EXISTS userInfo(
                    ticket_id text,
                    firstName text,
                    lastName text,
                    email text,
                    os text,
                        FOREIGN KEY (ticket_id) REFERENCES ticketInfo(ticket_id)");

            // COMMENTS TABLE (comments are stored as a serialised array)
            $this->db->exec("CREATE TABLE IF NOT EXISTS comments(
                    ticket_id text,
                    comments text,
                        FOREIGN KEY (ticket_id) REFERENCES ticketInfo(ticket_id)");

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param Ticket $ticket
     */
    public function insertData(Ticket $ticket) {
        try {
            // Prepare INSERT statement to SQLite3 file db

            /*$insert = "INSERT INTO tickets (ticket_id, firstName, lastName, email, os, issue, comments, status)
                VALUES (:ticket_id, :firstName, :lastName, :email, :os, :issue, :comments, :status)";

            $ticket_id = $ticket->getId();
            $firstName = $ticket->getFirstName();
            $lastName = $ticket->getLastName();
            $email = $ticket->getEmail();
            $os = $ticket->getOS();
            $status = $ticket->getStatus();
            $issue = $ticket->getIssue();
            $commentArray = $ticket->getComments();
            $commentString = "";

            foreach ($commentArray as $comment)
            {
                $commentString .= $comment . "\n";
            }

            $sql = $this->db->prepare($insert);
            $sql->bindParam(':ticket_id', $ticket_id);
            $sql->bindParam(':firstName', $firstName);
            $sql->bindParam(':lastName', $lastName);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':os', $os);
            $sql->bindParam(':issue', $issue);
            $sql->bindParam(':comments', $commentString);
            $sql->bindParam(':status', $status);
            $sql->execute();*/

            // TICKET INFO INSERT
            $insert = "INSERT INTO ticketInfo(ticket_id, issue, status)
                        VALUES (:ticket_id, :issue, :status)";
            $sql = $this->db->prepare($insert);
            $sql->bindParam(":ticket_id", $ticket->getID());
            $sql->bindParam(":issue", $ticket->getIssue());
            $sql->bindParam(":status", $ticket->getStats());
            $sql->execute();

            // USER INFO INSERT
            $insert = "INSERT INTO userInfo(ticket_id, firstName, lastName, email, os)
                        VALUES (:ticket_id, :firstName, :lastName, :email, :os)";
            $sql = $this->db->prepare($insert);
            $sql->bindParam(":ticket_id", $ticket->getID());
            $sql->bindParam(":firstName", $ticket->getFirstName());
            $sql->bindParam(":lastName", $ticket->getLastName());
            $sql->bindParam(":email", $ticket->getEmail());
            $sql->bindParam(":os", $ticket->getOS());
            $sql->execute();

            // COMMENTS INSERT
            $insert = "INSERT INTO comments(ticket_id, comments) VALUES (:ticket_id, :comments)";
            $sql = $this->db->prepare($insert);
            $sql->bindParam(":ticket_id", $ticket->getID());
            $sql->bindParam(":comments", serialize($ticket->getComments()));
            $sql->execute();

        } catch(PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
    }

    public function getData()
    {
        try
        {
            $result = $this->db->query("SELECT * FROM ticketInfo");
            echo "ticketInfo: " . $result . "\n";

            $result = $this->db->query("SELECT * FROM userInfo");
            echo "userInfo: " . $result . "\n";

            $result = $this->db->query("SELECT * FROM comments");
            echo "comments: " . $result . "\n";
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        /*try {
            // Prepare INSERT statement to SQLite3 file db
            $result = $this->db->query('SELECT * FROM tickets');
            return $result;
        } catch (PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }*/
    }

    public function getIdData($id)
    {
        try {
            /*// Prepare INSERT statement to SQLite3 file db
            $result = $this->db->query('SELECT firstName,lastName,email, os, issue, comments FROM tickets
                        WHERE ticket_id="'.$id.'"');
            return $result;*/

        } catch (PDOException $e) {
            // Print PDOException message
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