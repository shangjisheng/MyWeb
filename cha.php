<?php

header("Content-Type:text/html;charset=utf8");


$message = file_get_contents("data.txt");

echo str_replace("\n","<br>",$message);

echo '<p><a href="index.html">返回登录</a></p>';





?>
