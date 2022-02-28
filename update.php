<?php

try {
$title= $_POST["title"];
$content= $_POST["content"];
$id= $_POST["id"];
$date = date('Y-m-d H:i:s', strtotime('+9hour'));
$limit = 8;
$telLength = mb_strlen($title);

$title=htmlspecialchars($title,ENT_QUOTES,'UTF-8');
$content=htmlspecialchars($content,ENT_QUOTES,'UTF-8');

$dsn='mysql:dbname=TodoList;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


if($limit < $telLength ) {
  echo "タイトルは7文字以内で入力してください";
}
elseif(!empty($title) && !empty($content) ){
  $sql='UPDATE todo SET title=?,content=?,created_at=? WHERE id=?';
  $stmt=$dbh->prepare($sql);
  $data[]= $title;
  $data[]= $content;
  $data[]= $date;
  $data[]= $id;
  $stmt->execute($data);
  $dbh=null;

  echo "情報を更新しました。";
}elseif(empty($title)){
   echo "タイトルを入力してください";
}elseif(empty($content)){
  echo "内容を入力してください";
}


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
    <title>更新完了</title>
  </head>
  <body>          
  <p>
      <a href="index.php">投稿一覧へ</a>
  </p> 
  </body>
</html>