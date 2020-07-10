<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>○○○</title>
  <style>
    body {
      margin: 0;
    }

    header {
      /* TOPページのheader画像 */
      background-image: url(https://static.retrip.jp/article/85049/images/850490e59aced-93ad-432b-9ec8-e25d2c0326d6_m.jpg);
      background-size: cover;
      height: 850px;
      width: auto;
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

    h2,
    h3 {
      text-align: center;
    }

    .services {
      /* サービス一覧の全てを囲むdiv */
      display: flex;
    }

    .service_content {
      /* 各サービスを囲むfieldset */
      width: 500px;
    }

    .service_img {
      /* 各サービスの画像 */
      width: 320px;
      height: auto;
      display: flex;
    }

    h1 {
      color: white;
      position: absolute;
      top: 100px;
      left: 400px;
      font-size: 80px;
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <p><a href="">トップページ</a></p>
      <p><a href="">弁管理サービスとは</a></p>
      <p><a href="">事例紹介</a></p>
      <p><a href="http://localhost/12_03_KusumotoShoichi/PHP/todo_input2.php">問い合わせ</a></p>
      <p><a href="http://localhost/12_03_KusumotoShoichi/PHP/todo_register.php">新規会員登録</a></p>
      <p><a href="http://localhost/12_03_KusumotoShoichi/PHP/todo_logout.php">ログアウト</a></p>
      <p><a href="../HTML/account.html"><?php echo $_SESSION["user_id"] ?>さん</a></p>
      <p>

      </p>
    </nav>
  </header>

  <main>
    <h1>弁管理サービス</h1>

    <h2>サービス一覧</h2>

    <div class="services">
      <fieldset class="service_content">
        <a href="../HTML/valve_management.html">
          <h3>系統線図管理システム</h3>
          <img src="https://astamuse.com/ja/drawing/JP/2018/031/328/A/000005.png" alt="系統線図" class="service_img">
        </a>
      </fieldset>
      <fieldset class="service_content">
        <a href="">
          <h3>電源管理システム</h3>
          <img src="https://ecdtejun.work/wp-content/uploads/2017/10/tanketu_tenkai_sht1.png" alt="電気回路図" class="service_img">
        </a>
      </fieldset>
      <fieldset class="service_content">
        <a href="">
          <h3>作業管理システム</h3>
          <img src="https://lh3.googleusercontent.com/proxy/OjCBs92-j2_6YjfBpnGcl1wecg4vDLtH6tCkI3hDV3732CWTdN1p068M03vLJHXFwo_jISyakYYquWdjZ4KWqqx3f1tY1A" alt="作業スケジュール表" class="service_content">
        </a>
      </fieldset>
    </div>
  </main>

  <footer>

  </footer>
</body>

</html>