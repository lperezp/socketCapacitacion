<?php
$host = "localhost";
$port = 20216;
set_time_limit(0);

$sock = socket_create(AF_INET,SOCK_STREAM,0);
socket_bind($sock,$host,$port);
socket_listen($sock);
echo "Esperando una conexión";

class Chat{

    function readline(){
        return rtrim(fgets(STDIN));
    }
}

do{
    $accept = socket_accept($sock);
    $msg = socket_read($accept,1024);

    $msg = trim($msg);
    echo "Cliente says:\t" . $msg . "\n\n";

    $line = new Chat();
    echo "Enter reply:\t";
    $reply = $line->readline();
    socket_write($accept,$reply,strlen($reply));

}while (true);
socket_close($accept);
socket_close($sock);

?>