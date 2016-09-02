<?php

class Ticket
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $os;
    private $issue;
    private $status;
    private $comments;
    private static $statuses = ["UNRESOLVED", "PENDING", "IN PROGRESS", "COMPLETED"];

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
        $this->comments[] = $comments;
    }

    private function generateID()
    {
        $characters = "01234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randId = "";

        for ($i = 0; $i < 5; $i++)
        {
            $randId .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randId;
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

    public function setName($first, $last)
    {
        $this->firstName = $first;
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

        if (in_array(strtoupper($status), $this->statuses))
        {
            $this->status = strtoupper($status);
        }
        else
        {
            $this->status = "PENDING";
        }
    }

    public function addComment($comment)
    {
        $this->comments[] = $comment;
    }
}
