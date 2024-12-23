<?php
class User {
    private static $pdo;

    // Conexión a la base de datos
    private static function connect() {
        if (!self::$pdo) {
            self::$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    // Crear un nuevo usuario
    public static function create($username, $password) {
        self::connect();
        $stmt = self::$pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); // Encriptar la contraseña
        $stmt->execute();
    }

    // Obtener todos los usuarios
    public static function getAll() {
        self::connect();
        $stmt = self::$pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un usuario por su ID
    public static function getById($id) {
        self::connect();
        $stmt = self::$pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un usuario
    public static function update($id, $username, $password) {
        self::connect();
        $stmt = self::$pdo->prepare("UPDATE users SET username = :username, password = :password WHERE id = :id");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); // Encriptar la contraseña
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Eliminar un usuario
    public static function delete($id) {
        self::connect();
        $stmt = self::$pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>
