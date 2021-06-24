<?php
// ! はこれ（それ以降に条件書いて）ないですよね？
if (
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['area']) || $_POST['area'] == '' ||
  !isset($_POST['age']) || $_POST['age'] == '' ||
  !isset($_POST['likes']) || $_POST['likes'] == '' ||
  !isset($_POST['want']) || $_POST['want'] == ''
) {
  exit('ParamError');
}

$name = $_POST['name'];
$area = $_POST['area'];
$age = $_POST['age'];
$likes = $_POST['likes'];
$want = $_POST['want'];

// DBにアプリケーションサーバーをつなげる文
// 毎回使うやつ
$dbn = 'mysql:dbname=d08_sotsusei;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
// ＃＃＃＃毎回使うやつここから
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
// db error が出たらDB接続が問題あり


$sql = 'INSERT INTO user_table(id, name, area, age, likes, want, created_date, updated_date) VALUES(NULL, :name, :area, :age, :likes, :want, sysdate(), sysdate())';
// 一番間違ってる可能性ある
// バインド変数(：)コロンで書く
// ここまで＃＃＃＃

// 変数をバインド変数に格納
// 毎回使うやつ
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':area', $area, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':likes', $likes, PDO::PARAM_STR);
$stmt->bindValue(':want', $want, PDO::PARAM_STR);

$status = $stmt->execute(); // SQLを実行

if ($status == false) {
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:' . $error[2]);
} else {
  // 登録ページへ移動
  header('Location:user_input.php');
}
