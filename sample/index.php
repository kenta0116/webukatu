<?php
$str = 'html内にこの文字が表示されます！ブラウザで表示してみるとphpプログラムはみえません！';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ホームページのタイトル</title>
  </head>
  <body>
    <h1>PHPプログラムを作ってみよう！</h1>
    <p><?php echo $str; ?></p>
  </body>
  </html>