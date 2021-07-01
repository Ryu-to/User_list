<?php
// var_dump($_GET);
// exit();
include('userfunctions.php');
$id = $_GET['id'];

$pdo = connect_to_db();

// 該当するデータを一件だけ持ってきたい
$sql = 'SELECT * FROM user_table WHERE id = :id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetch(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  // 一件なのでfetch,全部の時はfetchall
  // var_dump($result);
  // exit();
}

?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>DB連携型userリスト（編集）</title>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <br>
  <h2>ユーザー登録</h2>
  <br>
  <div class="row">
    <div class="col-md">

      <form action="user_update.php" method="POST">
        <fieldset>
          <a href="user_read.php">ユーザー一覧</a>
          <div class="form-group">
            <label>お名前</label>
            <input type="text" class="form-control" name="username" autocomplete="name" value="<?= $result['name'] ?>">
          </div>

          <div class="form-group">
            <label>活動エリア</label>
            <input type="text" class="form-control" name="area" autocomplete="address-level1" value="<?= $result['area'] ?>">
          </div>
          <div class="mb-3">
            <label>プロフィール</label>
            <input type="text" class="form-control" name="likes" value="<?= $result['likes'] ?>">
          </div>
          <input type="hidden" name="id" value="<?= $result['id'] ?>"><!-- type="hidden"で存在するけど隠せる-->
    </div>
  </div>
  <div class="row center-block text-center">
    <div class="col-1">
    </div>
    <div class="col-4"><button class="btn btn-outline-primary">登録</button>
    </div>
  </div>
  <div class="col-1">
  </div>
  </fieldset>
  </form>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <script>
    window.addEventListener("beforeunload", function(e) {
      var confirmationMessage = "入力内容を破棄します。";
      e.returnValue = confirmationMessage;
      return confirmationMessage;
    });
  </script>


</body>

</html>