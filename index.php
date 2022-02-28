 <!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
</head>
<body>
<h1>
    ToDoリスト一覧
</h1>
<form action="create.php">
    <button type="submit" style="padding: 10px;font-size: 16px;margin-bottom: 10px">新規投稿</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>投稿時間</th>
    </tr>
</table>

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
$stmt=$dbh->prepare($sql);
//SQLの結果を受け取る
$stmt->execute();

while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo htmlspecialchars($result['ID']."　", ENT_QUOTES, 'UTF-8');
    echo htmlspecialchars($result['title']."　", ENT_QUOTES, 'UTF-8');
    echo htmlspecialchars($result['content']."　", ENT_QUOTES, 'UTF-8');
    echo htmlspecialchars($result['created_at']."　", ENT_QUOTES, 'UTF-8');
    echo "<a href=edit.php?id=" . $result["ID"] . ">編集</a>\n";
    echo "<a href=delete.php?id=" . $result["ID"] . ">削除</a>\n";
    print '<br/>';
    print '<hr>';
    print("<br>");
}
$dbh=null;
}catch (Exception $e)
{
   // print'ただいま障害により大変ご迷惑をお掛けしております。 ';
    echo $e->getFile(), '/', $e->getLine(), ':', $e->getMessage();
	exit();
}

?>

</body>
</html>


