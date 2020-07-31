<?php
declare(strict_types=1);

class PostLoader
{
    private string $title;
    private string $fullName;
    private DateTime $date;
    private string $message;


    public function getTitle(): string
    {
        return $this->title;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }


    public function getDate(): DateTime
    {
        return $this->date;
    }


    public function getMessage(): string
    {
        return $this->message;
    }

    public function getFormData()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['title'])) {
                return $this->title = $_POST['title'];
            }
            if (isset($_POST['fullname'])) {
                return $this->fullName = $_POST['fullname'];
            }
            if (isset($_POST['date'])) {
                return $this->date = $_POST['date'];
            }
            if (isset($_POST['message'])) {
                return $this->message = $_POST['message'];
            }
        }
        return;
    }

}