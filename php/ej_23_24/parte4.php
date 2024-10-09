<!DOCTYPE html>
<html>
<head>
    <h1>ARRAY</h1>
</head>
    <body>
        <?php
        /*  
        //echo "<br>ej1 y 2 <br>";

            $pep=array();
                for($i=1;$i<=10;$i++){
                    $valor=rand(1,30);
                    $pep[] = $valor;
                }
            //var_dump($pep);   
            echo "este es el primer num ".print_r($pep[1])."<br>";
            echo "<br>";
            echo "este es el ultimo num ". print_r($pep[9])."<br>";
            //echo count($pep);
        
        //echo "<br>ej3<br>";

            $valores=array("Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");

            foreach($valores as $pais => $ciudad){
                $CM=strtoupper($ciudad);
                $PM=strtoupper($pais);
                echo $CM." es la capital de ".$PM.".";
                echo "<br>";
            }
        */
         
        ?> 
        <!-- --> 
            <form name="formulario" method="get" action="./parte4.php">
                Nombre: <input type="text" name="nombre" value="">
                <input type="submit" />
            </form>
        
        <?php
        //echo "<br>ej4<br>";
            $nombre = $_REQUEST['nombre'];
            $AN=[]; //array del nombre
            $AN[]=$nombre; //poner la frase en un array
            $cade=[]; //array de la cadena de caracteres
            $total=strrev($nombre);//poner la frase al reves
            $M=strtoupper($nombre);//Poner en mayusculas toda la frase
            $CON=strlen($nombre);//contar los caracteres de cada frase entera
            for ($i=0; $i < strlen($nombre); $i++ ){
                //$letra=substr($nombre,$i,1);
                echo "<p>".$nombre[$i]."</p>";
            }
            echo "<br>"; 
            for ( $j=strlen($nombre) -1; $j >= 0 ; $j-- ){
                echo "<p>".$nombre[$j]."</p>";
            }
            echo "<br>"; 

            //var_dump($AN); echo "<br>"; 
            var_dump($total); echo "<br>";
            echo $CON; echo "<br>";
            echo $M;       

        ?>
    </body>
</html>