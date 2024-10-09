<!DOCTYPE html>
<html>
<head>
    <h1>ER PEPE</h1>
</head>
    <body>
        <h1>Eesto es una prueba</h1>

        <?php
            $nombre="PEPE";
            $apellido="Jesulin";
            
                echo "Hola mundo tu nombre es ".$nombre."y tu apellido es ".$apellido;
                    /*phpinfo(); 
                        echo "esto es una prueba de otro tema";
                        echo "<br>";
                        echo "esto es una cosa nueva";
                        */
                echo "<br>Esto es un numero random ";
                echo rand(0,10);
                
                echo "ip del servidor ".$_SERVER['SERVER_ADDR']."<br>";
                echo "host del servidor ".$_SERVER['SERVER_NAME']."<br>";
                echo "SW del servidor ".$_SERVER['SERVER_SOFTWARE']."<br>";
                echo "AGENTE USER del servidor ".$_SERVER['HTTP_USER_AGENT']."<br>";
                //echo "ip solicitado ".$_SERVER['HTTP_CLIENT_IP'];
                echo "ip solicitante es ".getenv("REMOTE_ADDR");
            ?>
    </body>
</html>