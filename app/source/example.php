<?php


require_once( 'db.php' );

if($_POST['search'] != null){

    $db  =  new DB;

    $search = $_POST['search'];

    $result =  $db->query("SELECT  * FROM `comments`  WHERE body  LIKE  '%".$search."%' ");
}

?>
//////

<?php



require_once( 'db.php' );

//$file = file_get_contents('https://jsonplaceholder.typicode.com/posts');

$file = file_get_contents('https://jsonplaceholder.typicode.com/comments');

$array = json_decode($file, true);

$count = count($array);

$i = 0;

$db  =  new DB;

for($i; $i <= $count; $i++)
{
    //$db->prepare("INSERT INTO `posts` SET `userId` ='".$array[$i]['userId']."', `title` = '".$array[$i]['title']."', `body` = '".$array[$i]['body']."'");

    $db->prepare("INSERT INTO `comments`
                                    SET
                                     `postId` = '".$array[$i]['postId']."',
                                     `name`   = '".$array[$i]['name']  ."',
                                     `email`  = '".$array[$i]['email'] ."',
                                     `body`   = '".$array[$i]['body']  ."'
                                     ");
}

echo 'загружено '.$count.' записей';


?>
