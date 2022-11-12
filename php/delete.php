<?php
    session_start();
    require_once "../Database/Database.php";
    if ($_SESSION['usersesion'] == null){
        echo "<script>alert('Favor ingresar con tus credenciales')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();

    }
    $delete_num = $_GET['Id'];
    $sql_delete =  "DELETE FROM productos WHERE id = '$delete_num'";
    $query_delete = mysqli_query($conn,$sql_delete);
    if($query_delete){
        echo "<script>alert('Eliminación de Producto Exitosa')</script>";        
        header("Refresh: 0 , url = Home.php");
        exit();

    }
    else{
        echo "<script>alert('No se pudo eliminar producto')</script>";
        header("Refresh: 0 , url = Home.php");
        exit();

    }
    mysqli_close($conn);
?>