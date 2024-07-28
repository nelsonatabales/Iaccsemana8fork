<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Reservas</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Consulta de Reservas</h2>

        <h3>Hoteles con más de dos reservas asignadas:</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Hotel</th>
                    <th>Número de Reservas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../includes/db.php';

                // Consulta avanzada para obtener hoteles con más de dos reservas
                $sql = "SELECT h.nombre AS hotel, COUNT(r.id_hotel) AS num_reservas
                        FROM HOTEL h
                        LEFT JOIN RESERVA r ON h.id_hotel = r.id_hotel
                        GROUP BY h.id_hotel
                        HAVING COUNT(r.id_hotel) > 2";

                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['hotel']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['num_reservas']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
