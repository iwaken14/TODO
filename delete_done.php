<?php

try {
$id= $_POST["id"];

$title=htmlspecialchars($title,ENT_QUOTES,'UTF-8');
$content=htmlspecialchars($content,ENT_QUOTES,'UTF-8');

$dsn='mysql:dbname=TodoList;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='DELETE FROM todo WHERE id=?';
$stmt=$dbh->prepare($sql);
$data[]= $id;
$stmt->execute($data);

$dbh=null;

echo "TODOを削除しました";
}catch (Exception $e)
{
   // print'ただいま障害により大変ご迷惑をお掛けしております。 ';
    echo $e->getFile(), '/', $e->getLine(), ':', $e->getMessage();
	exit();
}4

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>削除完了</title>
  </head>
  <body>          
  <p>
      <a href="index.php">投稿一覧へ</a>
  </p> 
  </body>
</html>