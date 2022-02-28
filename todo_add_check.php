<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>check_page</title>
</head>
<body>
<h1>
    以下の内容で登録しますか？
</h1>
<?php
    
$todo_titles=$_POST['titles'];
$todo_content=$_POST['contents'];
$date = date('Y-m-d H:i:s', strtotime('+9hour'));
$limit = 8;
$telLength = mb_strlen($todo_titles);
    
$todo_titles=htmlspecialchars($todo_titles,ENT_QUOTES,'UTF-8');
$todo_content=htmlspecialchars($todo_content,ENT_QUOTES,'UTF-8');
$date=htmlspecialchars($date,ENT_QUOTES,'UTF-8');

if($limit <= $telLength ) {
    echo "タイトルは7文字以内で入力してください";
    echo '<input type="button" onclick="history.back()" value="戻る">';
}elseif(!empty($todo_titles) && !empty($todo_content) ){
    echo "タイトル:" .$todo_titles."<br/>";
    echo "内容:".$todo_content;
    
    echo '<form method="post" action="todo_add_done.php">';
    echo '<input type="hidden" name="titles" value="'.$todo_titles.'">';
    echo '<input type="hidden" name="contents" value="'.$todo_content.'">';
    echo '<input type="hidden" name="date" value="'.$date.'">';
    echo '<br />';
    echo '<input type="button" onclick="history.back()" value="戻る">';
    echo '<input type="submit" value="ＯＫ">';
    echo '</form>';
 }elseif(empty($todo_titles)){
     echo "タイトルを入力してください";
     echo '<input type="button" onclick="history.back()" value="戻る">';
 }elseif(empty($todo_content)){
    echo "内容を入力してください";
    echo '<input type="button" onclick="history.back()" value="戻る">';
}




?>


</form>
</body>
</html>