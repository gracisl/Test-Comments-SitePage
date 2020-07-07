<?php

require __DIR__.'/../config/database_config.php';
require_once __DIR__.'/redbean/rb.php';

function findPerson($myvar){ $check_user = R::findOne('users','email=?', [$myvar]); return $check_user;}

$nickname = $_POST['CommentForm']['nickname'];
$email = $_POST['CommentForm']['email'];
$comment = $_POST['CommentForm']['comment'];



//Добавление записи в БД
$first_attempt = findPerson($email);
if(empty($first_attempt)) 
{
    $users = R::dispense('users');
    $users->nickname = $nickname;
    $users->email = $email;
    R::store($users);
}
$comments = R::dispense('comments');
$comments->usertext = $comment;
$second_attempt = findPerson($email);
$user_id = $second_attempt->id;
$comments->user_id = $user_id;
R::store($comments);


//Получение записи из БД
$result = R::getAll("SELECT comments.id, comments.date_time, comments.usertext, users.nickname, 
users.email FROM users INNER JOIN comments ON users.id = comments.user_id AND 
comments.date_time = (SELECT MAX(date_time) FROM comments)");
foreach($result as $data)
{
    echo $data['id']."+<p>".$data['date_time']."</p><p>".$data['nickname']." [".$data['email']."] </p><p>".$data['usertext']."</p>
    <button class=btn-danger data-button-id=".$data['id'].">Delete</button>";
}
R::close();
//$mysql->close();
?>
