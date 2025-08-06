<?php
include_once('conexion.php');

// Extracción de datos
$email = $_POST['email'];
$password = $_POST['pass'];

// Validación de datos usando consultas preparadas
$validation = $conection->prepare("SELECT * FROM usuarios WHERE correo = ?");
$validation->bind_param("s", $email);
$validation->execute();
$result = $validation->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Comprobación de password
    if ($row['pass'] == $password) {
        header('Location:../public/validado.html');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Error de Login</title>
</head>
<body>
    <div class="error-message">
        <h1>El usuario y la contraseña son incorrectos</h1>
    </div>
</body>
</html>


