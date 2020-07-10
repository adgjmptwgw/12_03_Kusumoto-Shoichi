<?php
session_start();
include("functions.php");

// 送信確認
// var_dump($_POST);
// exit();

// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
if (
  !isset($_POST['message']) || $_POST['message'] == ''
) {
  // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

// 受け取ったデータを変数に入れる
$message = $_POST['message'];

// DB接続
$pdo = connect_to_db();

// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO chat_manager_table(id, message, created_at) VALUES(NULL, :message, sysdate())';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':message', $message, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // $sql = 'SELECT created_at FROM chat_manager_table';

  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // $_SESSION["created_at"] = $sql;
  $_SESSION["message"] = $_POST["message"];
  header("Location:chat_manager.php");
  exit();
}
