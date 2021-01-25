<?php
// Conneccion a la base de datos
include("db.php");
// Archivo de configuracion
include('includes/config.php');

// Variables de ayuda
$bolsa_type = '';
$bolsa_size= '';
$units= '';
$price= '';
$success_msg = 'Elemento actualizado satisfactoriamente';


if  (isset($_GET['id'])) {
  // Consulta a la tabla task
  $id = $_GET['id'];
  $query = "SELECT * FROM $table WHERE id=$id";
  $result = mysqli_query($conn, $query);
  // La consulta fue existosa
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    // Actualiza los valores de las variables de ayuda 
    $bolsa_type = $row['bolsa_type']; 
    $bolsa_size = $row['bolsa_size'];
    $units = $row['units'];
    $price = $row['price'];
  }
}

if (isset($_POST['update'])) {
  // Actualiza variables de ayuda con valores nuevos
  $id = $_GET['id'];
  $bolsa_type = $_POST['bolsa_type'];
  $bolsa_size = $_POST['bolsa_size']; 
  $units = $_POST['units'];
  $price = $_POST['price'];
  // Consulta para actualizar
  $query = "UPDATE $table set bolsa_type = '$bolsa_type', bolsa_size = '$bolsa_size', units = '$units', price = '$price' WHERE id=$id";
  mysqli_query($conn, $query);
  // Mensajes de alerta
  // $_SESSION['message'] = $success_msg;
  // $_SESSION['message_type'] = 'warning';
  // Redireccion al inicio
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>

<!-- FORMULARIO DE ACTUALIZACION -->
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        
            

            <div class="mb-3">
                <label for="size" class="form-label">
                  Tamaño de Bolsa:
                </label>
                <input type="number" name="bolsa_size" id="size" class="form-control"  placeholder="Solo numeros enteros" value="<?php echo $bolsa_size?>">
            </div>
            <div class="mb-3">
                <label for="unit"class="form-label">Cantidad Entrante (unidad):</label>
                <input type="number" name="units" id="unit" class="form-control"  placeholder="Solo numeros enteros" value="<?php echo $units ?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio:</label>
                <input type="number" name="price" id="price" class="form-control"  placeholder="Precio por docena" step="any" value="<?php echo $price ?>">
            </div>
                <?php if($bolsa_type == "plastico") { ?>
                  <div>
                    <label class="form-label">
                      Tipo de Bolsa:
                    </label>
                  </div>
                  <div class="form-check mb-3">
              
                    <input class="form-check-input" type="radio" name="bolsa_type" id="plastico" value="plastico" checked>
                    <label class="form-check-label" for="plastico">
                      Plastico
                    </label>
            
                  </div>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="bolsa_type" id="papel" value="papel">
                    <label class="form-check-label" for="papel">
                      Papel
                    </label>
                  </div>
                <?php }; ?>
                <?php if($bolsa_type == "papel") { ?>
                  <div>
                    <label class="form-label">
                      Tipo de Bolsa:
                    </label>
                  </div>
                  <div class="form-check mb-3">
              
                    <input class="form-check-input" type="radio" name="bolsa_type" id="plastico" value="plastico">
                    <label class="form-check-label" for="plastico">
                      Plastico
                    </label>
            
                  </div>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="bolsa_type" id="papel" value="papel" checked>
                    <label class="form-check-label" for="papel">
                      Papel
                    </label>
                  </div>
                <?php }; ?>
                <div class="form-group">
                  <input type="submit" name="update" class="btn btn-success btn-block" value="Actualizar">
                </div>
            <!-- </div> -->
            <!-- <div class="form-group">
                <br>Tamaño de Bolsa: <br>
                <input type="number" name="bolsa_size" class="form-control"  placeholder="Solo numeros enteros" value="<?php //echo $bolsa_size?>">
            </div>
            <div class="form-group">
                <br>Cantidad Entrante (unidad):<br>
                <input type="number" name="units" class="form-control"  placeholder="Solo numeros enteros" value="<?php //echo $units ?>">
            </div>
            <div class="form-group">
                <br>Precio:<br>
                <input type="number" name="price" class="form-control"  placeholder="Precio Por Docena" step="any" value="<?php //echo $price ?>">
            </div>
            <div class="form-group">
                <br>
                <button class="btn-success" name="update">
                Actualizar
                </button>
                <br>
            </div> -->
        
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>
