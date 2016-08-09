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

    public function getName()
    {
        return $this->firstName . " " . $this->lastName;
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
        if (isset($this->comments))
        {
            $data = "";

            foreach ($this->comments as $val)
            {
                $data .= $val . "<br>";
            }

            return $data;
        }

        return "<NO COMMENTS>";
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

    public function addComments($comment)
    {
        $this->comments[] = $comment;
    }
}

/* debug bs - uncomment to test */
$ticket = new Ticket(session_id(), "Johhny", "Kronsky", "johnnyk@gmail.com", "Windows 7", "DOESN'T START MOFO", "I PRESS THE BUTTON AND IT DOESN'T WORK");
$ticket->addComments("ITS: YOUR PC IS FUCKED BRAH");
?>
<!doctype html>
<html>
<body>
    <div>
        <?php
            echo $ticket->getID() . "<br>";
            echo $ticket->getName() . "<br>";
            echo $ticket->getEmail() . "<br>";
            echo $ticket->getOS() . "<br>";
            echo $ticket->getIssue() . "<br>";
            echo $ticket->getComments() . "<br>";
        ?>
    </div>
</body>
</html>