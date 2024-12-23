<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simulando una base de datos de usuarios
    $users = [
        ['username' => 'user1', 'password' => 'password1'],
        ['username' => 'user2', 'password' => 'password2']
    ];

    // Comprobar si el usuario existe en la base de datos
    $userFound = false;
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $userFound = true;
            // Guardar información del usuario en la sesión
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit;
        }
    }

    // Si el usuario no se encuentra o las credenciales son incorrectas
    $error = "Invalid username or password.";
    include 'views/login.php';
} else {
    include 'views/login.php';
}
?>
