<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['usersesion'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=../index.html");
}
$username = $_SESSION['usersesion'];
$sql_fetch_todos = "SELECT * FROM productos ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html>

<head>
    <title>Agregar Producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
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
            <h1>Agregar Producto</h1>
        </div>
        <div class="List">
                <form method="POST" action="addlist.php" >
                    <div class="form-group">
                        <label for="NomPro">Nombre de Producto</label>
                        <br>
                        <input type="text" class="form-control" name="NomPro" required>
                    </div>
                    <div class="form-group">
                        <label for="Ref">Referencia</label>
                        <br>
                        <input type="text" class="form-control" name="Ref" required> 
                    </div> 
                    <div class="form-group">
                        <label for="Pre">Precio</label>
                        <br>
                        <input type="number" class="form-control" name="Pre" required> 
                    </div> 
                    <div class="form-group">
                        <label for="Peso">Peso</label>
                        <br>
                        <input type="number" class="form-control" name="Peso" required> 
                    </div> 
                    <div class="form-group">
                        <label for="Catg">Categoria</label>
                        <br>
                        <input type="text" class="form-control" name="Catg" required> 
                    </div> 
                    <div class="form-group">
                        <label for="Can">Cantidad</label>
                        <br>
                        <input type="number" class="form-control" name="Can" required> 
                    </div> 
                    <br><br><br>
                    <div class="form-button">
                        <button type="submit" class="modify" style="float:right">Agregar Producto</button>
                        <a name="" id="" class="return" href="Home.php" role="button" style="float:left">Volver</a>
                    </div>
                </form>
                <br>
            </div>
        <div class="table-product">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Orden</th>
                    <th scope="col">ID Producto</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Referencia</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Fecha Creado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $idpro = 1;
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td scope="row"><?php echo $idpro ?></td>
                            <td><?php echo $row['Id'] ?></td>
                            <td><?php echo $row['Nom_Producto'] ?></td>
                            <td><?php echo $row['Referencia'] ?></td>
                            <td><?php echo $row['Precio'] ?></td>
                            <td><?php echo $row['Peso'] ?></td>
                            <td><?php echo $row['Categoría'] ?></td>
                            <td><?php echo $row['Stock'] ?></td>
                            <td class="timeregis"><?php echo $row['Fecha_Create'] ?></td>
                        </tr>
                    <?php
                        $idpro++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>