<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todoリストログイン画面</title>
  <style>
    body {
      background-color: #2C7CFF;
      color: white;
    }

    form {
      display: flex;
      align-items: center;
      flex-direction: column;
      line-height: 50px;
      margin-top: 200px;
    }
  </style>

  <style></style>
</head>

<body>
  <!-- autocomplete="off" をformに後で付ける-->
  <form action="todo_login_act.php" method="POST" autocomplete="off">
    <h1>会員ログイン画面</h1>
    <div>
      ユーザーID: <input type="text" name="user_id">
    </div>
    <div>
      パスワード: <input type="text" name="password">
    </div>
    <div>
      <button>ログイン</button>
    </div>
    <a href="todo_register.php">新規会員登録の方はこちら</a>
  </form>

</body>

</html>