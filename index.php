<?php
declare(strict_types=1);

require_once 'code/Post.php';
require_once 'code/PostLoader.php';

?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guestbook</title>
</head>
<body>
<section>
    <h1 style="text-align: center; font-size: 2rem">Guestbook</h1>
    <form style="text-align: center; display: flex; flex-direction: column;justify-content: center; align-items: center"
          method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label>Title</label>
        <input type="text" name="title" placeholder="Title"/> <br>
        <label>Full name</label>
        <input type="text" name="fullname" placeholder="Full name"/> <br>
        <label>Date</label>
        <input type="date" name="date"/> <br>
        <label>Message</label>
        <textarea name="message" placeholder="Your message" rows="10" cols="30">
        </textarea> <br>
        <input type="submit" value="submit">
    </form>
</section>
</body>
</html>