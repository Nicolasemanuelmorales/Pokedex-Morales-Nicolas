<?php
        $conn = mysqli_connect("127.0.0.1","root","","Pokemons_Morales_Nicolas");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Nuevo</title>
</head>
<body>
<main>
        <section>
           <article class="cajita2">
           <form name="form" method="post">

                    <div class="box1">
                    <div class="box2">Codigo:</div>
                   <div class="box3"> <input class="inputform" type="text" id="id" name="id" value=""></div>
                    </div>

                    <div class="box1">
                    <div class="box2">Nombre:</div>
                    <div class="box3"><input class="inputform" type="text" id="nombre" name="nombre" value=""></div>
                    </div>

                    <div class="box1">
                    <div class="box2">Ataque:</div>
                    <div class="box3"><input class="inputform" type="text" id="ataque" name="ataque" value=""></div>
                    </div>

                      <div class="box1">
                    <div class="box2">URL Imagen:</div>
                    <div class="box3"><input class="inputform" type="text" id="imagen" name="imagen" value=""></div>
                    </div>
                    <select class="selectform2 inputform" name="tipo" id="tipo">
                        <option >Fuego</option>
                        <option >Electrico</option>
                        <option >Agua</option>
                    </select>
                    
                    <select class="selectform2 inputform" name="sexo" id="sexo">
                    <option  >Femenino</option>
                    <option >Masculino</option>
                    </select><br>

                    <input class="bot2" src="adminindex.php" name="cerrar" type="submit" value="Cancelar">
                    <input class="bot2" type="submit" name="enviar" value="Crear">
                </form>
           </article>
        </section>
    </main>
    <?php
        if(isset($_POST["enviar"])){
            
             $tipo=$_POST['tipo'];
             $sexo=$_POST['sexo'];
            switch ($sexo) 
                {
                case "Femenino":
                    $sexo=2;
                    break;
                case "Masculino":
                    $sexo=1;
                    break;
                 }

            switch ($tipo) 
                {
                case "Fuego":
                    $tipo=1;
                    break;
                case "Electrico":
                    $tipo=2;
                    break;
                case "Planta":
                    $tipo=3;
                    break;
                 }

            $id=$_POST['id'];

            $nombre=$_POST['nombre'];
            $nombre= strtolower($nombre);
            $nombre= ucfirst($nombre);

            $imagen=$_POST['imagen'];

            $ataque=$_POST['ataque'];
            $ataque= strtolower($ataque);
            $ataque= ucfirst($ataque);
            

            $sql1 = "select P.id Id
                    from Pokemon P 
                    where p.id='$id'";
           
            $result=mysqli_query($conn,$sql1);
            $asd=mysqli_fetch_assoc($result);

            
            if(!($asd['Id']==$id)){
                
                $sql2="Insert Into Pokemon (Id, Descripcion, Ataque, Imagen, Id_Genero) values('$id','$nombre','$ataque','$imagen','$sexo')";        
                $result=mysqli_query($conn,$sql2);

                $sql3="Insert Into Poke_Tipo(Id_Tipo, Id_Pokemon) Values('$id','$tipo')";
                $result=mysqli_query($conn,$sql3);

                echo "<p class='labelform editado'>Guardado Correctamente</p>";
                
            }
            else{
                echo "<p class='labelform editado'>Codigo Existente</p>";
            }
        }
        if(isset($_POST["cerrar"])){
            header('location:loginok.php');
        }
    ?>
</body>
</html>