<?php

require __DIR__.'/../config/database_config.php';

$comment_id = $_POST['number'];
$mysql->query("DELETE FROM `comments` WHERE `id` = '$comment_id'");
$mysql->close();
echo $comment_id;
?>