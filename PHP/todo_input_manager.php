<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
  <!-- 6/14更新 -->
  <style>
    body {
      margin: 0;
    }

    nav {
      /* 各ナビ */
      background-color: white;
      display: flex;
      justify-content: space-around;
    }

    a {
      /* aタグの下線を全て消去 */
      text-decoration: none;
    }

    .main_content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }

    form {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    li {
      display: flex;
      flex-direction: column;
    }

    input {
      width: 500px;
      height: 30px;
    }

    #question {
      height: 200px;
    }

    .buttons {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    button {
      margin: auto 20px;
    }
  </style>

</head>

<body>
  <header>
    <nav>
      <p><a href="../HTML/product_manager.html">トップページ</a></p>
      <p><a href="">○○とは</a></p>
      <p><a href="">事例紹介</a></p>
      <p><a href="">問い合わせ</a></p>
      <p><a href="http://localhost/12_03_KusumotoShoichi/PHP/todo_register.php">新規会員登録</a></p>
      <p><a href="http://localhost/12_03_KusumotoShoichi/PHP/todo_logout.php">ログアウト</a></p>
    </nav>
  </header>

  <main>
    <div class="main_content">
      <h1>お問い合わせ</h1>
      <p>お問い合わせの内容は問いません。お気軽にご連絡下さい</p>
    </div>

    <form action="todo_create.php" method="POST" autocomplete="off">
      <ul>
        <li>
          <label for="question">お問い合わせ内容</label>
          <input type="text" id="question" name="question">
        </li>
        <li>
          <label for="name">名前</label>
          <input type="text" id="name" name="name">
        </li>
        <li>
          <label for="email">メールアドレス</label>
          <input type="email" id="email" name="email">
        </li>
        <li>
          <label for="tel">電話番号</label>
          <input type="tel" id="tel" name="tel">
        </li>
      </ul>

      <div class="buttons">
        <button>送信</button>
        <button>リセット</button>
      </div>
    </form>

    <a href="todo_read.php">一覧画面</a>

  </main>

  <!-- <form action="todo_create.php" method="POST">
    <fieldset>
      <legend>DB連携型todoリスト（入力画面）</legend>
      <a href="todo_read.php">一覧画面</a>
      <a href="todo_logout.php">logout</a>
      <div>
        todo: <input type="text" name="todo">
      </div>
      <div>
        deadline: <input type="date" name="deadline">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form> -->

</body>

</html>