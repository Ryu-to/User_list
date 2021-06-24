<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>プロフィール入力</title>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <div class="border col-7">
    <br>
    <h2>ユーザー登録</h2>
    <br>
    <div class="row">
      <div class="col-md">

        <form action="user_create.php" method="POST">
          <fieldset>
            <div class="form-group">
              <label>お名前</label>
              <input type="text" class="form-control" name="name" autocomplete="name" placeholder="山田太郎" />
            </div>

            <div class="form-group">
              <label>活動エリア</label>
              <input type="text" class="form-control" name="area" placeholder="福岡県" autocomplete=" address-level1" />
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" name="likes" class="form-label">プロフィール</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
            </div>
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

    <br>
    <br>
    <hr>
    <br>
    <a href="user_read.php">ユーザー一覧</a>
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
    <!-- action_method_nameの３点セット -->
    <!-- <form action="user_create.php" method="POST">
      <fieldset>
        <legend>プロフィール</legend>
        <a href="user_read.php">ユーザー一覧</a>
        <div>
          名前: <input type="text" name="name" autocomplete="name" />
        </div>
        <div>
          エリア: <input type="text" name="area" autocomplete="address-level1" />
        </div>
        <div>
          年齢: <input type=" number" name="age">
        </div>
        <div>
          好きなこと: <input type="text" name="likes">
        </div>
        <div>
          体験してみたいこと: <input type="text" name="want">
        </div>
        <div>
          <button>送信</button>
        </div>
      </fieldset>
    </form>
  
</body>

</html>