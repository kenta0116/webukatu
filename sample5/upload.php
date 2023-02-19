<?php

//画像アップロードプログラム

//1.ファイルが送られてきている場合
if(!empty($file)) {

  //A.サーバーに画像を保存する
  $upload_path = 'images/'.$file['name'];
  $rst = move_uploaded_file($file['tmp_name'],$upload_path); // 移動元のファイルパスと移動さきのファイルパスを指定

  //B.アップロード結果によって表示するメッセージを変数へ入れる
  if($rst) {
    $msg = '画像をアップロードしました。アップした画像ファイル名：'.$file['name'];
    $img_path = $upload_path; //表示用画像パスの変数へ画像パスを入れる
  }else{
    $msg = '画像はアップ出来ませんでした。エラー内容：'.$file['error'];
  }

}else{
  $msg = '画像を選択してください';
}
?>