<?php
// Connecion a la base de datos
include('db.php');
// Archivo de configuracion
include('includes/config.php');

$error_msg = 'ERROR: Elemento no guardado';
$success_msg = 'Elemento guardado satisfactoriamente';
$color = 'danger';

if (isset($_POST['save'])) {

    $bolsa_type = $_POST['bolsa_type'];
    $bolsa_size = $_POST['bolsa_size'];
    (int)$units = $_POST['units'];
    (int)$price = $_POST['price'];

    if($bolsa_type == "plastico"){
        $bolsa_type = 1;
    }
    if($bolsa_type == "papel"){
        $bolsa_type = 2;
    }

  $query = "INSERT INTO $table(bolsa_type, bolsa_size, units, price) VALUES ('$bolsa_type', '$bolsa_size', '$units', '$price')";
  $result = mysqli_query($conn, $query);
  // Algo fallo
  if(!$result) {
    // Mensajes de alerta 
    $_SESSION['message'] = $error_msg;
    $_SESSION['message_type'] = $color;
    // // Redireccion a inicio
    // echo 'fallo';
    header('Location: index.php');
  }
//   // Mensajes de alerta 
  // $_SESSION['message'] = $success_msg;
  // $_SESSION['message_type'] = 'success';
//   // Redireccion a inicio
  header('Location: index.php');

}

?>
