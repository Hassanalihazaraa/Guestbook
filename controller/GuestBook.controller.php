<?php
declare(strict_types=1);

require_once '../model/GuestBook.model.php';
require_once '../model/Post.model.php';

session_start();

class MainController
{

    public function render()
    {
        if (!isset($_POST['title'])) {
            $_POST['title'] = "";
        }

        if (!isset($_POST['date'])) {
            $_POST['date'] = "";
        }
        if (!isset($_POST['name'])) {
            $_POST['name'] = "";
        }
        if (!isset($_POST['guestText'])) {
            $_POST['guestText'] = "";
        }
        $guestBookEntry = new Post($_POST['title'], $_POST['date'], $_POST['name'], $_POST['guestText']);

        $message = $guestBookEntry->getContent();
        $name = $guestBookEntry->getAuthorName();
        $date = date("Y/m/d h:i:sa");
        $title = $guestBookEntry->getTitle();
        $file = 'guestbook.json';
        $entryarray = ['message' => $message, 'name' => $name, 'date' => $date, 'title' => $title];


        $guestbook = new Guestbook();
        if (!isset($_SESSION['guestbook'])) {
            $_SESSION['guestbook'] = $guestbook;
        } else {
            $guestbook = $_SESSION['guestbook'];
        }

        if ($_POST['name'] != "") {
            $guestbook->pushtoBigArray($entryarray);
        }
        $bigarray = $guestbook->getAllPosts();
        $encodedArray = $guestbook->encodeArray($bigarray);
        $guestbook->putContents($file, $encodedArray);
        $jsonArray = $guestBookEntry->fetchPosts();

        while (count($jsonArray) > 20) {
            array_shift($jsonArray);
        }
        require_once '../view/GuestBook.view.php';
    }
}