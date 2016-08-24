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
            // Print PDOException message
            echo $e->getMessage();
        }
    }

    public function createTables() {
        try {
            $this->db->exec("CREATE TABLE IF NOT EXISTS tickets(
                    ticket_id TEXT,
                    firstName TEXT,
                    lastName TEXT,
                    email TEXT,
                    os TEXT,
                    issue TEXT,
                    comments TEXT,
                    status TEXT)");
        } catch(PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
    }

    /**
     * @param Ticket $ticket
     */
    public function insertData(Ticket $ticket) {
        try {
            // Prepare INSERT statement to SQLite3 file db

            $insert = "INSERT INTO tickets (ticket_id, firstName, lastName, email, os, issue, comments, status)
                VALUES (:ticket_id, :firstName, :lastName, :email, :os, :issue, :comments, :status)";

            $commentString = "";

            foreach ($ticket->getComments() as $comment)
            {
                $commentString .= $comment . "\n";
            }

            $sql = $this->db->prepare($insert);
            $sql->bindParam(':ticket_id', $ticket->getId());
            $sql->bindParam(':firstName', $ticket->getFirstName());
            $sql->bindParam(':lastName', $ticket->getLastName());
            $sql->bindParam(':email', $ticket->getEmail());
            $sql->bindParam(':os', $ticket->getOS());
            $sql->bindParam(':issue', $ticket->getIssue());
            $sql->bindParam(':comments', $commentString);
            $sql->bindParam(':status', $ticket->getStatus());
            $sql->execute();
        } catch(PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
    }

    public function update(Ticket $ticket)
    {
        try
        {
            $update = "UPDATE tickets 
                        SET firstName = :firstName,
                            lastName = :lastName,
                            email = :email,
                            os = :os,
                            issue = :issue,
                            comments = :comments,
                            status = :status
                        WHERE ticket_id = :ticket_id";
            
            $sql = $this->db->prepare($update);
            
            $sql->bindParam(':ticket_id', $ticket->getId());
            $sql->bindParam(':firstName', $ticket->getFirstName());
            $sql->bindParam(':lastName', $ticket->getLastName());
            $sql->bindParam(':email', $ticket->getEmail());
            $sql->bindParam(':os', $ticket->getOS());
            $sql->bindParam(':issue', $ticket->getIssue());
            $sql->bindParam(':comments', $commentString);
            $sql->bindParam(':status', $ticket->getStatus());
            
            $sql->execute();
            echo "updated db";
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getData()
    {
        try {
            // Prepare INSERT statement to SQLite3 file db
            $result = $this->db->query('SELECT * FROM tickets');
            return $result;
        } catch (PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
    }

    public function getIdData($id)
    {
        try {
            // Prepare INSERT statement to SQLite3 file db
            $result = $this->db->query('SELECT firstName,lastName,email, os, issue, comments FROM tickets
                        WHERE ticket_id="'.$id.'"');
            return $result;
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