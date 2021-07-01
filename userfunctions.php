<?php

function connect_to_db()
{
    // DBにアプリケーションサーバーをつなげる文
    // 毎回使うやつ
    $dbn = 'mysql:dbname=d08_sotsusei;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // DB接続
    // ＃＃＃＃毎回使うやつここから
    try {
        return new PDO($dbn, $user, $pwd);
        // DBと接続された時にnew PDO が出力されて欲しい
        // returnに変えて出力
    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
    // データベースに接続しましたってのが$pdoに入っている
}
