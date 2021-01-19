<?php
    //データベースへ接続
    $dsn = "mysql:dbname=[接続するDB名];host=localhost;charset=utf8mb4";
    $username = "[DBに接続するユーザ名]";
    $password = "[パスワード]";
    $options = [];
    $pdo = new PDO($dsn, $username, $password, $options);
        if(@$_POST["id"] != "" OR @$_POST["user_name"] != ""){ //IDおよびユーザー名の入力有無を確認
            $stmt = $pdo->query("SELECT * FROM user_list WHERE ID='".$_POST["id"] ."' OR Name LIKE  '%".$_POST["user_name"]."%')"); //SQL文を実行して、結果を$stmtに代入する。
        }
?>
<html>
