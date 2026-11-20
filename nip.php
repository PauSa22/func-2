<?php
function obtenerIniciales($nom) {
    $nom = trim($nom);
    if (strlen($nom) < 3) return strtoupper($nom);
    return strtoupper(substr($nom, 0, 3));
}

function obtenerAnio($fec) {
    $fec = trim($fec);
    return substr(substr($fec, 0, 4), -2);
}

function obtenerMesDia($fec) {
    $fec = trim($fec);
    return substr($fec, 5, 2) . substr($fec, 8, 2);
}

function generarClave($nom, $fec) {
    return obtenerIniciales($nom) . obtenerAnio($fec) . obtenerMesDia($fec);
}

$clave = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"] ?? "";
    $fec = $_POST["fec"] ?? "";
    $clave = generarClave($nom, $fec);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>
<body>
    <h2>Generador de Clave</h2>
    <form method="POST">
        <label>Nombre completo:</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Fecha de nacimiento:</label><br>
        <input type="date" name="fec" required><br><br>

        <button type="submit">Generar clave</button>
    </form>

    <?php if ($clave !== ""): ?>
        <h3>Clave: <?= htmlspecialchars($clave) ?></h3>
    <?php endif; ?>
</body>
</html>