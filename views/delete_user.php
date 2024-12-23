<?php
// Conexión a la base de datos
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Eliminar el usuario por ID
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: list_users.php');
exit();
?>
