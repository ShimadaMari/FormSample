<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FormSample</title>
  </head>
  <body>
    <?php
    ini_set('log_errors','on');
    ini_set('error_log','php.log');

    $debug_flg = true;
//デバッグログ関数
function debug($str){
  global $debug_flg;
  if(!empty($debug_flg)){
    error_log('デバッグ：'.$str);
  }
}
     ?>
    <style media="screen">
      .style-width{
        width: 400px;
        margin: 20px auto;
        margin-top: 50px;
      }
      .pic-area{
        position: relative;
        height: 300px;
        width: 100%px;
        margin: 0 auto;
        background:#FFDDFF;
        text-align: center;
        line-height: 300px;
        color: #FFFFFF;
        font-size: 20px;
      }
      .pictuer{
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
      }
      .print-area{
        height: 100px;
        width: 100%;
        margin: 0 auto;
        line-height: 50px;
        border-style: solid;
        border-color: #808080;
        box-sizing: border-box;
        margin-bottom: 15px;
        padding-left: 5px;
        font-size: 20px;
      }
      .form-container{
        width: 100%
      }
      .form-area{
        overflow: hidden;
        margin-top: 15px;
        width: 100%px;

      }
      .tytle{
        font-size: 20px;
        float: left;
        line-height: 50px;
        width: 80px;
      }
      .form{
        float:left;
        width: 70%;
        height: 50px;
        border-style: solid;
        border-color: #808080;
        box-sizing: border-box;
        margin-left: 5px;

      }
      input[type="text"]{
        width: 100%;
        height: 100%;
        border-style: solid;
        box-sizing: border-box;
        border: none;
        font-size: 18px;
      }
      input[type="file"]{

        width: 100%;
        height: 100%;
        border-style: solid;
        box-sizing: border-box;
        border: none;
        font-size: 15px;
        padding-top: 10px;
      }
      .input-file{
        float:left;
        width: 70%;
        height: 50px;
        border-style: solid;
        border: none;
        box-sizing: border-box;
        margin-left: 5px;
      }


    </style>


    <div class="style-width">


      <div class="print-area">
        <?php
        if(!empty($_POST['post'])){
          $post = $_POST['post'];
          echo "$post";
        }elseif (!empty($_GET['get'])) {
          $get = $_GET['get'];
          echo "$get";
        }
        //debug('取得したデータ：'.print_r($post,true));

         ?>

      </div>
      <div class="pic-area">
        PICTURE
      <?php
       $img = file_get_contents($_FILES["pic"]["tmp_name"]);
       $base64 = base64_encode($img);
       print"<img src=\"data:image/jpeg;base64,${base64}\" class=pictuer >";


       ?>



      </div>
      <div class="form-container">
        <form class="" action="" method="post"  enctype="multipart/form-data">
          <div class="form-area">
            <span class="tytle">FILE</span>
            <div class="input-file" >
              <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
              <input type="file" name="pic" >
            </div>

          </div>


          <div class="form-area">

            <span class="tytle">POST</span>
            <label class="form" >
              <input type="text" name="post" value="">
            </legal>

          </div>

          <div class="btn-container">
            <input type="submit" class="btn" value="送信">
          </div>
        </form>
        <form class="" action="" method="get">
          <div class="form-area">
            <span class="tytle">GET</span>
            <div class="form" >
              <input type="text" name="get" value="">
            </div>

          </div>
          <div class="btn-container">
            <input type="submit" class="btn" value="送信">
          </div>

        </form>
      </div>
    </div>

  </body>
</html>
