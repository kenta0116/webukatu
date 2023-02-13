<?php

error_reporting(E_ALL); //E_STRICTレベル以外のエラーを報告する
ini_set('display_errors', 'On'); //画面にエラーを表示させるか

//1.post送信されていた場合
if(!empty($_POST)) {

  define('MSG01','入力必須です');
  define('MSG02','Emailの形式で入力してください');
  define('MSG03','パスワード（再入力）が合っていません');
  define('MSG04','半角英数字のみご利用いただけます');
  define('MSG05','6文字以上で入力してください');

  $err_flg = false;
  $err_msg = array();

  //2.フォームが入力されていない場合
  if(empty($_POST['email'])) {
    $err_msg['email'] = MSG01;
  }

  if(empty($_POST['pass'])) {
    $err_msg['pass'] = MSG01;
  }

  if(empty[$_POST['pass_retype']]) {
    $err_msg['pass_retype'] = MSG01;
  }

  if(empty($err_msg)) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_re = $_POST['pass_retype'];

    //3.emailの形式でない場合
    if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
      $err_msg['email'] = MSG02;
    }

    //4.パスワードとパスワード再入力が合っていない場合
    if($pass !== $pass_re) {
      $err_msg['pass'] = MSG03;
    }

    if(empty($err_msg)) {

      //5.パスワードとパスワード再入力が半角英数字でない場合
      if(!preg_match("/^[a-zA-Z0-9]+$/", $pass)) {
        $err_msg['pass'] = MSG04;

      }elseif(mb_strlen($pass) < 6 ) {
        //6.パスワードとパスワード再入力が6文字以上でない場合
        $err_msg['pass'] = MSG05:
      }

      if(empty($err_msg)) header("Location:mypage.php")
    }
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ホームページのタイトル</title>
    <style>
      body {
        margin: 0 auto;
        padding: 150px;
        width: 25%;
        background: #fbfbfa;
      }
      h1 {
        color: #545454;
        font-size: 20px;
      }
      form {
        overflow: hidden;
      }
      input[type="text"] {
        color: #545454;
        height: 60px;
        width: 100%;
        padding: 5px 10px;
        font-size: 16px;
        display: block;
        margin-bottom: 10px;
        box-sizing: border-box;
      }
      input[type="submit"] {
        border: none;
        padding: 15px 30px;
        margin-bottom: 15px;
        background: #3d3938;
        color: white;
        float: right;
      }
      input[type="submit"]:hover {
        background:#111;
        cursor: pointer;
      }
      a {
        color:#545454;
        display: block;
      }
      a:hover {
        text-decoration: none;
      }
      .err_msg {
        color: #ff4d4b;
      }
    </style>
  </head>
  <body>
    <h1>ユーザー登録</h1>
    <form action="" method="post">
      <span class="err_msg"><?php if(!empty($err_msg['email'])) echo $err_msg['email']; ?></span>
      <input type="text" name="email" placeholder="email">
      <span class="err_msg"><?php if(!empty($err_msg['pass'])) echo $err_msg['pass']; ?></span>
      <input type="text" name="pass" placeholder="パスワード">
      <span class="err_msg"><?php if(!empty($err_msg['pass_retype'])) echo $err_msg['pass_retype']; ?></span>
      <input type="text" name="email_retype" placeholder="パスワード（再入力）">
      <input type="submit" value="送信">
    </form>
    <a href="mypage.php">マイページへ</a>
  </body>
  </html>