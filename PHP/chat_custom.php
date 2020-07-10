<?php
session_start();
include("functions.php");
check_session_id();

// DB接続
$pdo = connect_to_db();

// データ取得SQL作成
// *はテーブルの全てのフィールドという意味
$sql = 'SELECT * FROM chat_table ORDER by created_at desc';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  $out = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    // $output .= "<td>質問担当者</td>";
    $output .= "<td>{$record["created_at"]}</td>";
    $output .= "<td class='output1'>{$record["message"]}</td>";
    // edit deleteリンクを追加
    $output .= "</tr>";
  }

  // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($value);
}

?>

<?php

// データ取得SQL作成
$sql = 'SELECT * FROM chat_manager_table ORDER by created_at desc';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output_02 = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$output_02へデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output_02 .= "<tr>";
    // $output_02 .= "<td>{$_SESSION["user_id"]}</td>";
    $output_02 .= "<td>{$record["created_at"]}</td>";
    $output_02 .= "<td class='output_02'>{$record["message"]}</td>";
    // edit deleteリンクを追加
    $output_02 .= "</tr>";
  }

  // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($value);
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
  <style>
    fieldset {
      width: 650px;
      border: none;
    }

    .p_manager {
      margin-left: 150px;
    }

    .p_user {
      margin-bottom: 50px;
    }

    p {
      font-size: 150%;
      margin-bottom: 100px;
      margin-top: 200px;
    }

    .chat {
      display: flex;
    }

    td {
      /* border: solid; */
      display: flex;
    }

    .table2 {
      margin-left: 150px;
    }

    .chat_user {
      margin-left: 80px;
    }

    /* 左側の吹き出し */
    .output1 {
      position: relative;
      display: inline-block;
      margin: 1.5em 0 1.5em 15px;
      padding: 7px 10px;
      min-width: 400px;
      max-width: 100%;
      color: #555;
      font-size: 16px;
      background: #e0edff;
      border-radius: 10px;
      margin: 0px auto 50px auto;
      z-index: 0;
    }

    .output1:before {
      content: "";
      position: absolute;
      top: 50%;
      left: -90px;
      margin-top: -15px;
      border: 15px solid transparent;
      border-right: 80px solid #e0edff;
    }

    /* 右側の吹き出し */
    .output_02 {
      position: relative;
      display: inline-block;
      margin: 1.5em 15px 1.5em 0;
      padding: 7px 10px;
      min-width: 400px;
      max-width: 100%;
      color: #555;
      font-size: 16px;
      background: #e0edff;
      border-radius: 10px;
      margin: 0px auto 50px auto;
    }

    .output_02:before {
      content: "";
      position: absolute;
      top: 50%;
      left: 95%;
      margin-top: -15px;
      border: 15px solid transparent;
      border-left: 80px solid #e0edff;
    }

    .send {
      position: fixed;
      left: 100px;
      top: 0px;
      z-index: 1;
      background-color: white;
    }

    .message {
      width: 1000px;
      height: 50px;
    }

    button{
      width: 100px;
      height: 55px;
      position: fixed;
      right: 215px;
      top: 30px;
    }
  </style>
</head>

<body>
  <form action="chat_create.php" method="POST">
    <fieldset class="send">
      <div>
        メッセージ <input type="text" name="message" class="message" autocomplete="off">
      </div>
      <div>
        <button>送信</button>
      </div>
    </fieldset>
  </form>

  <div class="chat">
    <fieldset class="chat_user">
      <p class="p_user"><?php echo $_SESSION["user_id"] ?>様</p>
      <table class="table1">
        <thead>
          <tr>
            <!-- <th>ユーザーID</th> -->
            <!-- <th>送信時間</th>
            <th>メッセージ</th> -->
            <th></th>
          </tr>
        </thead>
        <tbody class="output">
          <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
          <?= $output ?>
        </tbody>
      </table>
    </fieldset>

    <fieldset>
      <table class="table2">
        <p class="p_manager">管理ユーザー</p>
        <thead>
          <tr>
            <!-- <th>ユーザーID</th> -->
            <!-- <th>送信時間</th>
            <th>メッセージ</th> -->
            <th></th>
          </tr>
        </thead>
        <tbody class="out">
          <?= $output_02 ?>
        </tbody>
      </table>
    </fieldset>
  </div>
</body>

</html>