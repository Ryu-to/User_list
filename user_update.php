<?php
// var_dump($_POST);
// exit();

include('userfunctions.php');
$pdo = connect_to_db();

$id = $_POST['id'];

// 各値をpostで受け取る
$username = $_POST['username'];
$area = $_POST['area'];
$likes = $_POST['likes'];

// idを指定して更新するSQLを作成(UPDATE文)
// $sql = "UPDATE user_table SET username=:username, area=:area, likes=:likes, updated_at=sysdate() WHERE id=:id";
$sql = 'UPDATE `user_table` SET `username`=:username,`area`=:area,`likes`=:likes WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':area', $area, PDO::PARAM_STR);
$stmt->bindValue(':likes', $likes, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:user_read.php");
    exit();
    // var_dump($result);
    // exit();
}
