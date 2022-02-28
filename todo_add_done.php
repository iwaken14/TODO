<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Page</title>
</head>
<body>

<?php
try
{

$todo_titles=$_POST['titles'];
$todo_contents=$_POST['contents'];
$date=$_POST['date'];

$todo_titles=htmlspecialchars($todo_titles,ENT_QUOTES,'UTF-8');
$todo_contents=htmlspecialchars($todo_contents,ENT_QUOTES,'UTF-8');
$date=htmlspecialchars($date,ENT_QUOTES,'UTF-8');

$dsn='mysql:dbname=TodoList;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO todo(title,content,created_at,updated_at)VALUES (?,?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$todo_titles;
$data[]=$todo_contents;
$data[]=$date;
$data[]=$date;
$stmt->execute($data);

$dbh=null;

echo "<h3>新規ToDoの</h3>";
print "タイトル　".$todo_titles."<br/>";
print "内容　".$todo_contents."<br/>";
print 'を追加しました！！';


}
catch (Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしております。 ';
    echo $e->getFile(), '/', $e->getLine(), ':', $e->getMessage();
	exit();
}

?>

<a href="index.php"> 戻る</a>


</body>
</html>