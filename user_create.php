<?php


// ! はこれ（それ以降に条件書いて）ないですよね？
if (
  !isset($_POST['username']) || $_POST['username'] == '' ||
  !isset($_POST['area']) || $_POST['area'] == '' ||
  !isset($_POST['likes']) || $_POST['likes'] == '' 
) {
  exit('ParamError');
}


$username = $_POST['username'];
$area = $_POST['area'];
$likes = $_POST['likes'];
include('userfunctions.php'); // 関数を記述したファイルの読み込み

// DB接続の関数
$pdo = connect_to_db();
// var_dump($pdo);
// exit();
// $sql = 'INSERT INTO user_table(id, username, area, likes, created_at, updated_at) VALUES(NULL, :username, :area, :likes, sysdate(), sysdate())';
$sql = 'INSERT INTO `user_table`(`id`, `username`, `area`, `likes`, `created_date`, `updated_date`) VALUES (NULL,:username,:area,:likes,sysdate(),sysdate())';

// 変数をバインド変数に格納
// 毎回使うやつ
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':area', $area, PDO::PARAM_STR);
$stmt->bindValue(':likes', $likes, PDO::PARAM_STR);

$status = $stmt->execute(); // SQLを実行

if ($status == false) {
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:' . $error[2]);
} else {
  // 登録ページへ移動
  header('Location:user_input.php');
}
