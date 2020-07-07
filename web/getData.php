<?php

require __DIR__.'/../config/database_config.php';
require_once __DIR__.'/redbean/rb.php';

$limit = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page -1) * $limit;
//$comments_count = $mysql->query("SELECT count(id) AS id from comments");
//$page_array = mysqli_fetch_assoc($comments_count);
$total_page_count = R::count('comments');   //$page_array['id'];
$pages = ceil($total_page_count / $limit); 
$Previous = $page -1;
if($Previous == 0){$Previous = 1;}
$Next = $page +1;
if($Next>$pages){$Next=$page;}

$result = R::getAll("SELECT comments.id, comments.date_time, comments.usertext, users.nickname, 
users.email FROM users INNER JOIN comments ON users.id = comments.user_id ORDER BY comments.date_time LIMIT $start, $limit");
echo "<div id=NewComment class=wrapper style=margin-bottom:30px>";
foreach($result as $data)
{
    echo "<div id=".$data['id']."><p>".$data['date_time']."</p><p>".$data['nickname']." [".$data['email']."] </p><p>".$data['usertext']."</p>
    <button class=btn-danger data-button-id=".$data['id'].">Delete</button></div>";
}
R::close();
//$mysql->close();
?>
