<?php
include 'header.php';

if (!isset($_SESSION["user"])){
    header("Location: login.php");
    exit;
  }

if(isset($_POST["color"])){
  include "conexion.php";
  $color=$_POST["color"];
  $user=$_SESSION["user"];
  $_SESSION["color"]=$color;
  mysqli_query($con, "UPDATE personas SET color ='$color' WHERE id_persona='$user'");
}

?>
<link href="css/checkout.css" rel="stylesheet">
<div class="container">
<main>
    <div class="py-5 text-center">
            <h2>Panel de configuracion</h2>
      <p class="lead">Aqui podra configurar su cuenta.</p>
    </div>
    <form action="panel.php" method="POST">
           <div class="col-md-5">
              <label for="country" class="form-label">Personalizar color</label>
              <select class="form-select" id="country" name="color" required>
                <option value="">escoga un color:</option>
                <option value="red">ROJO</option>
                <option value="green">VERDE</option>
                <option value="yellow">AMARILLO</option>
                <option value="brown">CAFE</option>
                <option value="orange">NARANJA</option>
                <option value="pink">ROSA</option>
                <option value="#800080">LILA</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Guardar configuracion</button>
          
        </form>
        <a class="w-100 btn btn-danger btn-lg" href="salir.php" type="submit">Salir</a>
    <div>
      <?php
      if($_SESSION["rol"]=="docente")
      echo "docente";
      ?>
    </div>
  </main>
</div>
<?php 
include 'footer.php';
?>