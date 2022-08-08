<?php 

    require 'database.php';
    if (isset($_SESSION['user_id'])) {
        header('Location: galeria.php');
      }

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql="SELECT id, email, password FROM usuarios WHERE email = :email";
        $records = $conexion->prepare($sql);
        $records->bindParam(':email',$_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) { // en este if estoy verificando si los caracteres de la contraseña ingresada son mayores a cero(o sea que no este vacia) y tambien comparo la contraseña ingresada con la contraseña de la base de datos para ver si son iguales
            $_SESSION['user_id'] = $results['id'];
            header('Location: galeria.php'); // si el usuario ingreso correctamente le mando a la pagina de galeria.php
          } else {
            $message = 'Las credenciales no coinciden';
          }
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel ='stylesheet' href='./assests/style.css'>
    </head>
    <body>
        <?php require './partials/header.php'?>
        <div class="container">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h1 class="titulo_login">LOGIN</h1>
                
                <?php if(!empty($message)): ?>
                    <p> <?= $message ?></p>
                <?php endif; ?>

                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Contraseña: </label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                    <span class="cuenta"><a href="registrarse.php">Si no tienes cuenta registrate aqui!</a></span>
                </form>
                </div>
            </div> 
        </div>

        
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
