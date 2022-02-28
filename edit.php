<?php

try
{

$dsn='mysql:dbname=TodoList;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//SQLの準備
$sql='SELECT * FROM todo'; 
//SQLの実行
$stmt=$dbh->prepare('SELECT * FROM todo WHERE id = :id');
//SQLの結果を受け取る
$stmt->execute(array(':id' => $_GET["id"]));
$result = 0;

$result = $stmt->fetch(PDO::FETCH_ASSOC);

}catch (Exception $e)
{
   // print'ただいま障害により大変ご迷惑をお掛けしております。 ';
    echo $e->getFile(), '/', $e->getLine(), ':', $e->getMessage();
	exit();
}
$date = date('Y-m-d H:i:s', strtotime('+9hour'));
?>


<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Page</title>
</head>
<body>
<h1>
    編集ページ
</h1>
<form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php if (!empty($result['ID'])) echo(htmlspecialchars($result['ID'], ENT_QUOTES, 'UTF-8'));?>">
            <p>
                <label>タイトル：</label>
                <input type="text" name="title" value="<?php if (!empty($result['title'])) echo(htmlspecialchars($result['title'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <p>
                <label>内容：</label>
                <input type="text" name="content" value="<?php if (!empty($result['content'])) echo(htmlspecialchars($result['content'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <input type="submit" value="編集する">


</form>

<form action="index.php">
    <button type="submit" name="back">戻る</button>
</form>
</body>
</html>