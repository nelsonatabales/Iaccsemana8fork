<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Vuelo</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="../js/validaciones.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Agregar Vuelo</h2>
        <form action="agregar_vuelo.php" method="POST" onsubmit="return validarVuelo();">
            <div class="form-group">
                <label for="origen">Origen:</label>
                <input type="text" class="form-control" id="origen" name="origen" required>
            </div>
            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" class="form-control" id="destino" name="destino" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="plazas_disponibles">Plazas Disponibles:</label>
                <input type="number" class="form-control" id="plazas_disponibles" name="plazas_disponibles" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Vuelo</button>
        </form>

        <hr>

        <h2>Listado de Vuelos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Plazas Disponibles</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../includes/db.php';

                // Mostrar los vuelos existentes
                $sql = "SELECT * FROM VUELO";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['origen']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['destino']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['fecha']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['plazas_disponibles']) . "</td>";
                    echo "<td>$" . number_format($row['precio'], 2) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../includes/db.php';

    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $plazas_disponibles = $_POST['plazas_disponibles'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$origen, $destino, $fecha, $plazas_disponibles, $precio]);

    echo "Vuelo agregado exitosamente.";
}
?>
