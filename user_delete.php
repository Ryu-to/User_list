<?php
// var_dump($_GET);
// exit();


include('userfunctions.php');

$pdo = connect_to_db();

$id = $_POST['id'];

// IDをGETで受け取る
$id = $_GET['id'];

// // idを指定して更新するSQLを作成 -> 実行の処理
// // DELETEすると復旧できないので注意!!
// // WHEREで指定しないとテーブルのデータが全滅する!!
$sql = 'DELETE FROM user_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR); 
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:user_read.php"); // // 一覧画面にリダイレクト
    exit();
    // var_dump($result);
    // exit();
}