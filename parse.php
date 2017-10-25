<?php 


include_once('lib/database.class.php');
include_once('lib/user.class.php');
include_once('lib/tags.class.php');

$db = new Database();
$User = new User($db);
$Tags = new Tags($_POST['tag']);

$UserList = $User->Users(); //retrieves 'users' column in db
$a = $Tags->tag($UserList);
print_r($a);





//$Tags->CheckTags($UserList);

?>