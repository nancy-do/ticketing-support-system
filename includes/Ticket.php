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

    public function getLast()
    {
        return $this->lastName;
    }

    public function getFirst()
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

/* debug bs - uncomment to test */
$ticket = new Ticket(session_id(), "Johhny", "Kronsky", "johnnyk@gmail.com", "Windows 7", "DOESN'T START MOFO", "I PRESS THE BUTTON AND IT DOESN'T WORK");
$ticket->addComment("ITS: YOUR PC IS FUCKED BRAH");
?>
<!doctype html>
<html>
<body>
    <div>
        <?php
            echo $ticket->getID() . "<br>";
            echo $ticket->getFirst() . $ticket->getLast() . "<br>";
            echo $ticket->getEmail() . "<br>";
            echo $ticket->getOS() . "<br>";
            echo $ticket->getIssue() . "<br>";

            $array = $ticket->getComments();
            
            for ($i = 0; $i < count($array); $i++)
            {
                echo $array[$i] . "<br>";
            }
        ?>
    </div>
</body>
</html>