<?php
session_start();
require_once "../Database/Database.php";
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT Username FROM users WHERE username ='" . $username . "'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
if ($result) {
    echo "<script>alert('Usuario actualmente está en uso')</script>";
    header("Refresh:0 , url = ../registrarse.html");
    exit();
}else{
if ($_POST['username'] != null && $_POST['password'] != null && $_POST['name'] != null && $_POST['cfpassword'] != null && $_POST['cfpassword'] == $_POST['password']) {
    $sql = "INSERT INTO users (Nombre,Username,Clave) VALUES ('" . trim($_POST['name']) . "','" . trim($_POST['username']) . "','" . trim($_POST['password']) . "')";
    if ($conn->query($sql)) {
        echo "<script>alert('Registro completado exitósamente')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();
    } else {
        echo "<script>alert('Registro incompleto')</script>";
        header("Refresh:0 , url = ../registrarse.html");
        exit();
    }
} else {
    echo "<script>alert('Los campos de contraseña no coinciden')</script>";
    header("Refresh:0 , url = ../registrarse.html");
    exit();
}
    mysqli_close($conn);
}
