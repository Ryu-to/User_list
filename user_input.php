<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Google icon font -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <title>プロフィール入力</title>
</head>

<body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <div class="border col-7">
    <br>
    <br>
    <div class="container">
      <div class="section">
        <p class="grey-text">ユーザー登録</p>
        <div class="divider"></div>
      </div>
      <form action="user_create.php" method="POST">
        <fieldset>
          <div class="row form">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input type="text" name="username" autocomplete="name" placeholder="山田太郎" id="your_name2" class="validate">
                  <label for="your_name2">名前</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input type="text" name="area" id="disabled" class="validate">
                  <label for="are">活動エリア</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name="likes" id="email" class="validate" rows="4">
                  <label for="likes">プロフィール</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">
                  登録
                </button>
              </div>
            </form>
          </div>
        </fieldset>
      </form>
      <div class="section">
        <a href="user_read.php" class="grey-text">
          ユーザー一覧
        </a>
        <div class="divider"></div>
      </div>
    </div>
    <!-- action_method_nameの３点セット -->
    <!-- <form action="user_create.php" method="POST">