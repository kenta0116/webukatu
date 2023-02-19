<?php

error_reporting(E_ALL); //E_STRICTレベル以外のエラーを報告する
ini_set('display_errors', 'On'); //画面にエラーを表示させるか

//1.ファイルが送信されていた場合
if(!empty($_FILES)) {

  // A.フォームから送られたファイルを受信
  $file = $_FILES['image'];

  // B.メッセージ表示用の変数を用意
  $msg = '';
  $img_path = '';

  // C.画像アップロードプログラム（外部のPHPファイル）を読み込む
  include('upload.php');
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
      input[type="password"] {
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
      textarea {
        color: #545454;
        height: 200px;
        width: 100%;
        padding: 5px 10px;
        font-size: 16px;
        display: block;
        margin-bottom: 10px;
        box-sizing: border-box;
        border-color: #ddd;
      }
    </style>
  </head>
  <body>

  <p><?php if(!empty($msg)) echo $msg; ?></p>

    <h1>画像アップロード</h1>

    <form method="post" enctype="multipart/form-data">
      
      <input type="file" name="image">

      <input type="submit" value="アップロード">

    </form>

    <?php if(!empty($img_path)) { ?>
    <div class="img_area">
      <p>アップロードした画像</p>
      <img src="<?php echo $img_path; ?>">
    </div>
  <?php } ?>
  </body>
  </html>