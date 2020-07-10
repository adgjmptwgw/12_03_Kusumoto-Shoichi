<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todoリストユーザ登録画面</title>

  <style>
    body {
      background-color: #75A9FF;
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
</head>

<body>
  <form action="todo_register_act.php" method="POST" autocomplete="off">
    <h1>新規会員登録画面</h1>
    <div>
      ユーザーID: <input type="text" name="user_id">
    </div>
    <div>
      パスワード: <input type="text" name="password">
    </div>
    <div>
      <button>会員登録完了</button>
    </div>
    <a href="todo_login.php">ログインの方はこちらへ</a>
  </form>
</body>

</html>