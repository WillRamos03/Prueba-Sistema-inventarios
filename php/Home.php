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
<!Doctype html>
<html>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h3>Usuario conectado: <?php echo $str = strtoupper($username) ?></h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <?php require '../Segmentos/menu.php'?>
    <div class='main-container'>
        <div class="container">
            <h1>Lista de Productos</h1>

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
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
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
                            <td class="Edit"><a name="edit" id="" class="bfix" 
                            href="Edit_Prod.php?Id=<?php echo $row['Id']?>&NomPro=<?php echo $row['Nom_Producto']?>&Ref=<?php echo $row['Referencia']?>&Pre=<?php echo $row['Precio'] ?>&Peso=<?php echo $row['Peso'] ?>&Catg=<?php echo $row['Categoría'] ?>&Can=<?php echo $row['Stock'] ?> " role="button">
                                    Editar
                                </a></td>
                            <td class="delete"><a name="delete" id="" class="bdelete" href="delete.php?Id=<?php echo $row['Id']?>" role="button">
                                    Eliminar
                                </a></td>
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