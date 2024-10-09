<!DOCTYPE html>
<html>
<head>
    <h1>Formularios</h1>
</head>
    <body>
        <!-- -->
            <form name="formulario" method="post" action="./parte5.php">
                Pon un numero romano: <input type="text" name="NR" >
                <input type="submit" />
            </form>
        <?php
            $numero = $_REQUEST['NR'];
            $N=strtoupper($numero);
            $romano=array("I" => 1, "V" => 5, "X" => 10, "L" => 50, "C" => 100, "D" => 500, "M" => 1000);
            $CON=strlen($N);
            if (!empty($numero)){
                for($i=0;$i <$CON; $i++){
                        if (in_array($N[$i], $romano) ) {
                        foreach ( $romano as $num){}
                        echo "es un numero romano ".$N[$i]."<br>";    
                            /*if ($num < $N[$i]){

                            }
                            
                         */ 
                           // echo $resultado;
                        } else{
                        echo "no es un numero romano ".$N[$i]."<br>";
                        }
                }
            } else {
                echo "no hay nada ";
            }
            echo "<br>";
            print_r($romano);
            //var_dump($romano);
            echo $N."<br>";
            print_r($CON);
        ?>
    </body>
</html>