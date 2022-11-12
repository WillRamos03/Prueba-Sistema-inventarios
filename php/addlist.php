<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['usersesion'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();
    }

    if($_POST['NomPro'] != null && $_POST['Ref'] != null && $_POST['Pre'] != null && $_POST['Peso'] != null
        && $_POST['Catg'] != null && $_POST['Can']){
        $sql = "INSERT INTO productos (Nom_Producto,Referencia,Precio,Peso,Categoría,Stock) 
        VALUES ('". trim($_POST['NomPro']). "','". trim($_POST['Ref']). "','". trim($_POST['Pre']). "','". trim($_POST['Peso']). "','". trim($_POST['Catg']). "','". trim($_POST['Can'])."')";
        if($conn->query($sql)){
            echo "<script>alert('Registro Completo')</script>";
            header("Refresh:0 , url = formProduct.php");
            exit();

        }
        else{
            echo "<script>alert('Error al registrar producto')</script>";
            header("Refresh:0 , url = formProduct.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Por favor complete la información.')</script>";
        header("Refresh:0 , url = formProduct.php");
        exit();

    }
    mysqli_close($conn);
?>