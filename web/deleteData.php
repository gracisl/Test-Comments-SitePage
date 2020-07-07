<?php

require __DIR__.'/../config/database_config.php';
require_once __DIR__.'/redbean/rb.php';

$comment_id = $_POST['number'];
$item = R::load('comments', $comment_id);//$mysql->query("DELETE FROM `comments` WHERE `id` = '$comment_id'");
R::trash($item);
R::close();//$mysql->close();
echo $comment_id;
?>