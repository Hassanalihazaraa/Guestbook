<?php
declare(strict_types=1);

require_once 'controller/GuestBook.controller.php';

session_start();

$controller = new MainController();
$controller->render();
