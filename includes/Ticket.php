<?php
session_start();

class Ticket
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $os;
    private $issue;
    private $comments;

    public function __construct($id, $first, $last, $email, $os, $issue, $comments)
    {
        $this->id = $id;
        $this->firstName = $first;
        $this->lastName = $last;
        $this->email = $email;
        $this->os = $os;
        $this->issue = $issue;
        $this->comments[] = $comments;
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

    public function addComment($comment)
    {
        $this->comments[] = $comment;
    }
}