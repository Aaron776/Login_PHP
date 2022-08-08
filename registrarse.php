<?php  
 require 'database.php';
 $message = '';

 if (!empty($_POST['email']) && !empty($_POST['password'])) {
   $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
   $stmt = $conexion->prepare($sql);
   $stmt->bindParam(':email', $_POST['email']);
   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  //esto solo es para encriptar o cifrar la contraseña cuando el usuario se registra
   $stmt->bindParam(':password', $password);

   if ($stmt->execute()) {
     $message = 'Usuario registrado con exito!';
   } else {
     $message = 'Hubo un problema';
   }
 }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registrarse</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel ='stylesheet' href='./assests/style.css'>
    </head>
    <body class="cuerpo_registrarse">
       <div class="container_registrarse">
            <?php require './partials/header.php'?>
            <div class="container">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h1 class="titulo_login">Registrarse</h1>
                    
                <?php if(!empty($message)): ?>
                    <p> <?= $message ?></p>
                <?php endif; ?>

                <span class="cuenta"><a href="login.php">¿Ya tienes cuenta?</a></span>
                <form action="registrarse.php" method="POST">
                    
                <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    
                    <div class="mb-3">
                        <label  class="form-label">Contraseña: </label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Confirmar Contraseña: </label>
                        <input type="password" class="form-control" name="password_confirm">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" value="Submit">Registrarse</button>
                </form>
                </div>
            </div> 
        </div>

        </div> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>