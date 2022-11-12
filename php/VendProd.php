<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['usersesion'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=../index.html");
    exit();
}
$username = $_SESSION['usersesion'];
$sql_fetch_todos = "SELECT * FROM productos where stock > 0 ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);
?>

<!DOCTYPE html>
<html >
<head>
  <title>Registrar Venta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/home.css">
</head>
<body>
<div class="header">
        <h3>Usuario conectado: <?php echo $str = strtoupper($username) ?></h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <?php require '../Segmentos/menu.php'?>

    <div class='main-container'>
        <div class="container">
            <h1>Registro de ventas</h1>
        </div>

 
    <div>
          <Label style="margin-right: 40px;">Ingrese Codigo de producto</Label>
          <input type="text" list="items" name="idlist" class="form-control" id="myInput" placeholder="Search.."/>
          <datalist id="items"> 
                <?php
                 $query_list = "Select * from productos";
                    $result_list = mysqli_query($conn,$query_list);
                    while($valores = mysqli_fetch_array($result_list)){
                      echo '<option value="'.$valores['Id'].'">'.$valores['Referencia'].'</option>';
                    }
                  ?>
          </datalist>
    </div>
  <br>
  <table>
    <thead>
    <tr>
        <th scope="col">Orden</th>
        <th scope="col">Id Producto</th>
        <th scope="col">Referencia</th>
        <th scope="col">Precio</th>
        <th scope="col">Categoria</th>
        <th scope="col">Stock</th>
        <th scope="col">Venta</th>
    </tr>
    </thead>
    <tbody id="myTable">
    <?php
        $idpro = 1;
        while ($row = mysqli_fetch_array($query)) { ?>
            <tr>
                <td scope="row"><?php echo $idpro ?>
                <td><?php echo $row['Id'] ?></td>
                <td><?php echo $row['Referencia'] ?></td>
                <td><?php echo $row['Precio'] ?></td>
                <td><?php echo $row['Categoría'] ?></td>
                <td><?php echo $row['Stock'] ?></td>
                <td class="Edit"><a name="edit" id="" class="bfix" 
                href="Newvend.php?Id=<?php echo $row['Id']?>&Ref=<?php echo $row['Referencia']?>&Pre=<?php echo $row['Precio'] ?>" role="button">
                        Realizar venta
                    </a></td>
            </tr>
        <?php
            $idpro++;
        } ?>
    </tbody>
  </table>
  
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>