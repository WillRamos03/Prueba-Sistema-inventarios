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
    <title>Nueva venta</title>
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
            <h1>Nueva venta</h1>
        </div>
        <div class="List">  
            <form method="POST" action="vend.php">
                <div class="form-group">
                    <label for="Id">Id Producto</label>
                    <br>
                    <input type="text" value="<?php echo $_GET['Id'] ?>" class="form-edit" name="Id" readonly>
                </div>   
                <div class="form-group">
                    <label for="Ref">Referencia</label>
                    <br>
                    <input type="text" value="<?php echo $_GET['Ref'] ?>" class="form-edit" name="Ref" readonly/>
                </div>
                <div class="form-group">
                    <label for="Pre">Precio</label>
                    <br>
                    <input type="number" class="form-edit" id="Pre" name="Pre" value="<?php echo $_GET['Pre']; ?>" oninput="calcular()" readonly>
                </div>
                
                <div class="form-group">
                    <label for="Can">Ingrese Cantidad</label>
                    <br>
                    <input type="number" class="form-edit" id="Can" name="Can" required>
                </div>

                <br><br><br>
                <div class="form-button">
                    <button type="submit" class="modify" style="float:right">Continuar Venta</button>
                    <a name="" id="" class="return" href="VendProd.php" role="button" style="float:left">Cancelar</a>
                </div>
                
            </form>
        </div>
        
    </div>    
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>