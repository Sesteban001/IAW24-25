<!DOCTYPE html>
<html>
<head>
    <h1>Formularios</h1>
</head>
    <body>
        <!-- ej1
            <form name="formulario" method="post" action="./parte5.php">
                Pon un numero romano: <input type="text" name="NR" >
                <input type="submit" />
            </form>
        -->
        <?php
           /* $numero = $_REQUEST['NR'];
            $N=strtoupper($numero);
            $romano=array("I" => 1, "V" => 5, "X" => 10, "L" => 50, "C" => 100, "D" => 500, "M" => 1000);
            $CON=strlen($N);
            if (!empty($numero)){
                for($i=0;$i < $CON; $i++){
                        if (array_key_exists( $N[$i], $romano ) ) {
                            echo "es un numero romano ".$N[$i]."<br>";
                            foreach ($romano as  $NR => $num){ //NR es un numero romano y num es el numero en decimal
                               // if ( $N[$i] == $num ){
                                    if ( $N[$i] < $NR ){
                                        $resta = $NR - $N[$i];
                                        $resultado = $resta += $resultado;
                                    } else {
                                        $suma = $NR + $N[$i];
                                        $resultado = $suma += $resultado;
                                    }
                                    print($resultado);
                                    echo "<br>".$N[$i]."<br>";
                                //}
                            }
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
            echo "<br>".$N."<br>";
            print_r($CON);
            */
        ?>
        <!-- ej2
        <form name="formulario" method="post" >
                Piedra, papel tijera: <input type="text" name="PPT" >
                <input type="submit" />
                 -->
        <?php
           
           /*$ppt=$_REQUEST['PPT'];
            $U=strtoupper($ppt);
            $op=array( 1 => "PIEDRA", 2=> "TIJERA", 3 => "PAPEL");
            $randomizador=rand(1,3);
           // $VO=$opcion[$randomizador];

            if(!empty($ppt)){
                $VO=$op[$randomizador]; echo "<br> opcion maquina "; print_r($VO); echo "<p> opcion usuario "; print_r($U); echo "<p>";
                    //echo "<br> el valor random es $VO";
                if (($U == "PIEDRA" && $VO == "TIJERA") ||  ($U == "TIJERA" && $VO == "PAPEL") ||  ($U == "PAPEL" && $VO == "PIEDRA")) {
                    echo "¡Ganaste! Elegiste $U y la máquina eligió $VO.";
                } elseif ($U == $VO ) {
                    echo "Empataste. Elegiste $U y la máquina eligió $VO.";
                }else {
                    echo "¡Perdiste!. Elegiste $U y la máquina eligió $VO.";
                }                            
            }else{
                echo " <br>no has introducido un valor";
            }
        */
        ?>
    </body>
</html>