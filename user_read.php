<?php


include('userfunctions.php');

$pdo = connect_to_db();

$sql = 'SELECT * FROM user_table';

// ここを書き換えて並べ替えたり条件つけたり
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["username"]}</td>";
    $output .= "<td>{$record["area"]}</td>";
    $output .= "<td>{$record["likes"]}</td>";
    // edit deleteリンクを追加
    $output .= "<td><a href='user_edit.php?id={$record["id"]}'>更新</a></td>";
    // GETはURLの後ろにデータくっつけて送る、これがそう→POSTと違い簡単に送れる
    // どのデータに対してeditのページを開くか
    $output .= "<td><a href='user_delete.php?id={$record["id"]}'>削除</a></td>";
    $output .= "</tr>";
  }
  $output .= "</tr>";
}
unset($record);
  // echo '<pre>';
  //   var_dump($result);
  //   echo'</pre>';
  //   exit();
// fetchAllで全部データを取れる
// $resultにデータが全部入っている
// preタグ http://www.htmq.com/html/pre.shtml
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta username="viewport" content="width=device-width, initial-scale=1.0">
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
          <th>username</th>
          <th>area</th>
          <th>likes</th>
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