<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Chat - Naranjito</title>
</head>
<body>
<form method="post">
    <h2>Ingresa a nuestro Chat</h2>
    <div class="form-group">
        <input type="text" name="txtMessage" placeholder="Nombre completo" class="form-control" required>
    </div>
    <button name='btn' type="submit" class="btn btn-primary ">Entrar</button>
    <?php
        $host = "localhost";
        $port = 20216;

        if(isset($_POST['btn'])){

            $msg = $_REQUEST['txtMessage'];

            $sock =socket_create(AF_INET,SOCK_STREAM,0);
            socket_connect($sock,$host,$port);

            socket_write($sock,$msg,strlen($msg));

            $reply = socket_read($sock,1024);
            $reply = trim($reply);
            $reply = "Server says:\t" . $reply;
        }
        ?>
    <br>
    <textarea rows="10" col="30"><?php echo @$reply; ?> </textarea>
</form>
</body>
</html>