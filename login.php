<!DOCTYPE html>
<html>
  <head>
    <tiele>
      登入中
    </tiele> 
  </head>
  <body>
    <div>
      <p>
      下面顯示 php 的執行過程
      </p>
        <?php
        ob_start();
        echo "開始登入伺服器<br>";
        echo "登入伺服器位址 ";
        echo $_POST['dataBaseIp'];
        echo "<br>";
        echo "登入伺服庫 ";
        echo $_POST['databaseName'];
        echo "<br>";
        echo "嘗試登入中...<br>";
        flush();
        ob_flush();

        ?>
    </div>
  </body>
</html>

