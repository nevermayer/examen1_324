<?php
include 'header.php';
include "conexion.php";
if (!isset($_SESSION["user"])){
    header("Location: login.php");
    exit;
  }

if(isset($_POST["color"])){
  
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
      if($_SESSION["rol"]=="docente"){
      $resultado=mysqli_query($con, "    SELECT      
      AVG(CASE WHEN  dep='01' THEN nota ELSE NULL   END) CHQ,
      AVG(CASE WHEN  dep='02' THEN nota ELSE NULL   END) LPZ,
      AVG(CASE WHEN  dep='03' THEN nota ELSE NULL   END) CBB,
      AVG(CASE WHEN  dep='04' THEN nota ELSE NULL   END) ORU,
      AVG(CASE WHEN  dep='05' THEN nota ELSE NULL   END) SCZ
  FROM estudiante;");
  $fila = mysqli_fetch_assoc($resultado);
      print_r($fila);
      ?><h2>Media de notas usando case when.</h2>
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">CHQ</th>
              <th scope="col">LPZ</th>
              <th scope="col">CBB</th>
              <th scope="col">ORU</th>
              <th scope="col">SCZ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $fila['CHQ'];?></td>
              <td><?php echo $fila['LPZ'];?></td>
              <td><?php echo $fila['CBB'];?></td>
              <td><?php echo $fila['ORU'];?></td>
              <td><?php echo $fila['SCZ'];?></td>
            </tr>
          </tbody>
        </table>
    </div>
    <div>
    <h2>Usando Arrays.</h2>
    <?php
    $resultado = mysqli_query($con, "SELECT dep, nota FROM estudiante");
    if (!$resultado) {
      die("Error en la consulta: " . mysqli_error($con));
  }
  $mediasPorDepartamento = array();
  while ($fila = mysqli_fetch_assoc($resultado)) {
    $departamento = $fila['dep'];
    $nota = $fila['nota'];

    if (!isset($mediasPorDepartamento[$departamento])) {
        $mediasPorDepartamento[$departamento] = array('total' => 0, 'contador' => 0);
    }

    $mediasPorDepartamento[$departamento]['total'] += $nota;
    $mediasPorDepartamento[$departamento]['contador']++;
}
$dep=$not="";
foreach ($mediasPorDepartamento as $departamento => $datos) {
  $media = $datos['total'] / $datos['contador'];

  $not=$not."<td>".$media."</td>";
  echo "Departamento: $departamento - Media de Notas: $media<br>";
}
    ?>
<table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">CHQ</th>
              <th scope="col">LPZ</th>
              <th scope="col">CBB</th>
              <th scope="col">ORU</th>
              <th scope="col">SCZ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php echo $not;}?>
            </tr>
          </tbody>
        </table>

    </div>
  </main>
</div>
<?php 
include 'footer.php';
?>