<?php

class Ticket
{
    private static $id_length = 5;
    private static $statuses = ["UNRESOLVED", "PENDING", "IN PROGRESS", "COMPLETED"];

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $os;
    private $issue;
    private $status;
    private $comments;

    public function __construct($first, $last, $email, $os, $issue, $status, $comments, $id = null)
    {
        /* when re-assigning a ticket you don't want to re-generate a new id so
            this way, if id is null a new id is generated, otherwise the
            ticket takes the id passed */
        $this->id = ($id == null ? $this->generateID() : $id);
        $this->firstName = $first;
        $this->lastName = $last;
        $this->email = $email;
        $this->os = $os;
        $this->issue = $issue;
        $this->status = $status;
        $this->comments = $comments;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getOS()
    {
        return $this->os;
    }

    public function getIssue()
    {
        return $this->issue;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setFirstName($first)
    {
        $this->firstName = $first;
    }

    public function setLastName($last)
    {
        $this->lastName = $last;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setOS($os)
    {
        $this->os = $os;
    }

    public function setIssue($issue)
    {
        $this->issue = $issue;
    }

    public function setStatus($status)
    {

        if (in_array(strtoupper($status), Ticket::$statuses))
        {
            $this->status = strtoupper($status);
        }
        else
        {
            $this->status = "PENDING";
        }
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    public function generateID()
    {
        $characters = "01234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randId = "";

        for ($i = 0; $i < Ticket::$id_length; $i++)
        {
            $randId .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randId;
    }

    // returns an associative array of all vars in the class
    public function getVars()
    {
        return ["id" => $this->id,
                "firstName" => $this->firstName,
                "lastName" =>$this->lastName,
                "email" => $this->email,
                "os" => $this->os,
                "issue" => $this->issue,
                "status" => $this->status,
                "comments" => implode("\n", $this->comments)];
    }
}
