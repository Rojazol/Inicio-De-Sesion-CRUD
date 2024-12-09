
<?php
session_start();

// Configuración de la conexión
$servername = "localhost"; // Cambia esto por el nombre de tu servidor
$username = "root"; // Cambia esto por tu usuario de la BD
$password = ""; // Cambia esto por tu contraseña de la BD
$dbname = "instituto_db"; // Cambia esto por el nombre de tu BD

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$user = $_POST['root'];
$pass = $_POST[''];

// Consulta a la base de datos
$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificar contraseña
    if (password_verify($pass, $row['password'])) {
        // Login exitoso, almacenar datos en sesión
        $_SESSION['username'] = $user;
        header("Location: dashboard.php"); // Redirige a la página principal
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
