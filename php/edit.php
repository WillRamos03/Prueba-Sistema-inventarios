<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['usersesion'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();
    }
    if($_POST['NomPro'] != null && $_POST['Ref'] != null && $_POST['Pre'] != null && $_POST['Peso'] != null && $_POST['Catg'] != null && $_POST['Can'] != null){
        $sql = "UPDATE productos SET Nom_Producto = '" . trim($_POST['NomPro']) . "' ,Referencia = '" . trim($_POST['Ref']) .  "' ,Precio = '" . trim($_POST['Pre']) . "' ,Peso = '" . trim($_POST['Peso']) . "' ,Categoría = '" . trim($_POST['Catg']) . "' ,Stock = '" . trim($_POST['Can']) . "' WHERE Id = '" . $_POST['Id'] . "'";
        if($conn->query($sql)){
            echo "<script>alert('Proceso completado exitósamente')</script>";
            header("Refresh:0 , url =Home.php");
            exit();

        }
        else{
            echo "<script>alert('Inconvenientes para realizar el proceso')</script>";
            header("Refresh:0 , url =Home.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Por favor diligencia todos los campos')</script>";
        header("Refresh:0 , url = Home.php");
        exit();

    }
    mysqli_close($conn);
?>
