<?php
  session_start();
  require 'database.php';
  
  
  if (isset($_SESSION['user_id'])) {
    $records = $conexion->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Galeria de Imagenes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel ='stylesheet' href='./assests/style.css'>
    </head>
    <body>
    <div class="galeria">
        
            <h1>GALERIA DE IMAGENES</h1> 
            <a href="logout.php">Logout</a>
        
        
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.diainternacionalde.com/imagenes/dias/07-02-dia-mundial-de-los-ovnis.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://m.media-amazon.com/images/S/dmp-catalog-images-prod/images/ddf0ae20-19b0-40f8-8a42-1c1317f168ab/ddf0ae20-19b0-40f8-8a42-1c1317f168ab--2100517249._SX576_SY576_BL0_QL100__UXNaN_FMjpg_QL85_.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://imagenes.extra.ec/files/image_full/uploads/2021/12/29/61cce2033dc6c.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="https://wwwhatsnew.com/wp-content/uploads/2016/08/imagen-92-730x389.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.elsoldezacatecas.com.mx/doble-via/6qda0c-doblevia201907151.jpg/ALTERNATES/LANDSCAPE_400/doblevia201907151.jpg" class="d-block w-100" alt="...">
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>