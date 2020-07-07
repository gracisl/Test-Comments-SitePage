<?php

require __DIR__.'/../config/database_config.php';

$nickname = $_POST['CommentForm']['nickname'];
$email = $_POST['CommentForm']['email'];
$comment = $_POST['CommentForm']['comment'];

$check_user = $mysql->query("SELECT * FROM `users` WHERE `email`='$email'");
$user = $check_user->fetch_assoc();
if($user==NULL)
{
    $mysql->query("INSERT INTO `users`(`nickname`,`email`) VALUES ('$nickname','$email')");
}
$mysql->query("INSERT INTO `comments`(`usertext`,`userID`) VALUES ('$comment',(SELECT id FROM users WHERE `email`='$email'))");

$result = $mysql->query("SELECT comments.id, comments.date_time, comments.usertext, users.nickname, 
users.email FROM users INNER JOIN comments ON users.id = comments.userID AND 
comments.date_time = (SELECT MAX(date_time) FROM comments)");
while($data=mysqli_fetch_array($result))
{
    echo $data['id']."+<p>".$data['date_time']."</p><p>".$data['nickname']." [".$data['email']."] </p><p>".$data['usertext']."</p>
    <button class=btn-danger data-button-id=".$data['id'].">Delete</button>";
}
$mysql->close();
?>
