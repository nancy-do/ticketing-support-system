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
            //http://stackoverflow.com/questions/8670687/sqlite-correct-path-uri-for-php-pdo-on-windows
            $this->db = new PDO('sqlite:C:\xampp2\htdocs\WDA-A1\tickets.db');
            //$this->db = new PDO('sqlite:../tickets.db');

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
            $sql->execute();
        } catch(PDOException $e) {
            // Print PDOException message
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
