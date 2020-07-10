<?php

// 送信データのチェック
// var_dump($_POST);
// exit();

// 関数ファイルの読み込み
session_start();
include("functions.php");
check_session_id();

// 送信データ受け取り
$question = $_POST["question"];
$name = $_POST["name"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$id = $_POST["id"];

// DB接続
$pdo = connect_to_db();

// UPDATE文を作成&実行
$sql = "UPDATE inquiry_table SET question=:question, name=:name, email=:email,tel=:tel,created_at=sysdate() WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':question', $question, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
  header("Location:todo_read.php");
  exit();
}
