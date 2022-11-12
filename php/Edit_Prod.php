<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['usersesion'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=../index.html");
    exit();
}
$username = $_SESSION['usersesion'];
$sql_fetch_todos = "SELECT * FROM productos ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html>

<head>
    <title>Editar Producto</title>
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
            <h1>Editar Producto</h1>
        </div>
        <div class="List">  
            <form method="POST" action="edit.php">
                <div class="form-group">
                    <label for="Id">Id</label>
                    <br>
                    <input type="text" value="<?php echo $_GET['Id'] ?>" class="form-edit" name="Id" readonly>
                </div>
                <div class="form-group">
                    <label for="NomPro">Nombre del Producto</label>
                    <br>
                    <input type="text" class="form-edit" name="NomPro" value="<?php echo $_GET['NomPro']; ?>" required>
                </div>          
                <div class="form-group">
                    <label for="Ref">Referencia</label>
                    <br>
                    <input type="text" value="<?php echo $_GET['Ref'] ?>" class="form-edit" name="Ref" />
                </div>
                <div class="form-group">
                    <label for="Pre">Precio</label>
                    <br>
                    <input type="number" class="form-edit" name="Pre" value="<?php echo $_GET['Pre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Peso">Peso</label>
                    <br>
                    <input type="number" class="form-edit" name="Peso" value="<?php echo $_GET['Peso']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Catg">Categoria</label>
                    <br>
                    <input type="text" class="form-edit" name="Catg" value="<?php echo $_GET['Catg']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Can">Cantidad</label>
                    <br>
                    <input type="number" class="form-edit" name="Can" value="<?php echo $_GET['Can']; ?>" required>
                </div>
                <br><br><br>
                <div class="form-button">
                    <button type="submit" class="modify" style="float:right">Editar</button>
                    <a name="" id="" class="return" href="home.php" role="button" style="float:left">Cancelar</a>
                </div>
                
            </form>
        </div>
        <div class="table-product">
            <table>
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
            <br>
        </div>  
        
    </div>    
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>