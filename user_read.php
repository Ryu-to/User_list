<?php



// DBに接続
// 定形
// YOUR_NAMEを変更
$dbn = 'mysql:dbname=d08_sotsusei;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

$sql = 'SELECT * FROM user_table ORDER BY id ASC';
// ここを書き換えて並べ替えたり条件つけたり
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // echo '<pre>';
  //   var_dump($result);
  //   echo'</pre>';
  //   exit();
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["name"]}</td>";
    $output .= "<td>{$record["area"]}</td>";
    $output .= "<td>{$record["age"]}</td>";
    $output .= "<td>{$record["likes"]}</td>";
    $output .= "<td>{$record["want"]}</td>";
    $output .= "</tr>";
  }
}
// fetchAllで全部データを取れる
// $resultにデータが全部入っている
// preタグ http://www.htmq.com/html/pre.shtml
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザーリスト</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
  <fieldset>
    <legend>ユーザーリスト</legend>
    <a href="user_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>name</th>
          <th>area</th>
          <th>age</th>
          <th>likes</th>
          <th>want</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
  <script>
    const result = <?= json_encode($result) ?>;
    console.log(result);
  </script>
</body>

</html>