<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Hotel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="../js/validaciones.js"></script>
</head>
<body>
    <div class="container mt-5 ">
        <h2>Agregar Hotel</h2>
        <form action="agregar_hotel.php" method="POST" onsubmit="return validarHotel();">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
            </div>
            <div class="form-group">
                <label for="habitaciones_disponibles">Habitaciones Disponibles:</label>
                <input type="number" class="form-control" id="habitaciones_disponibles" name="habitaciones_disponibles" required>
            </div>
            <div class="form-group">
                <label for="tarifa_noche">Tarifa por Noche:</label>
                <input type="number" class="form-control" id="tarifa_noche" name="tarifa_noche" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Hotel</button>
        </form>
    </div>
    <?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $habitaciones_disponibles = $_POST['habitaciones_disponibles'];
    $tarifa_noche = $_POST['tarifa_noche'];

    $sql = "INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche]);

    echo "Hotel agregado exitosamente.";
}
?>

<hr>

<div class="container">
    <h2>Listado de Hoteles</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Habitaciones Disponibles</th>
                <th>Tarifa por Noche</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/db.php';
    
            // Mostrar los hoteles existentes
            $sql = "SELECT * FROM HOTEL";
            $stmt = $conn->query($sql);
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ubicacion']) . "</td>";
                echo "<td>" . htmlspecialchars($row['habitaciones_disponibles']) . "</td>";
                echo "<td>$" . number_format($row['tarifa_noche'], 2) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>


</body>
</html>
