<?php
function limpiarNombre($nom) {
    $nom = trim($nom);
    if (strlen($nom) === 0) return "";
    return str_replace(" ", "", $nom);
}

function convertirMinusculas($txt) {
    return strtolower(trim($txt));
}

function obtenerInstitucion($inst) {
    return substr(convertirMinusculas($inst), 0, 2);
}

function obtenerAnio($anioIng) {
    $anioIng = trim((string)$anioIng);
    if (strlen($anioIng) < 2) return $anioIng;
    return substr($anioIng, -2);
}

function generarUsuario($nom, $inst, $anioIng) {
    $nom = convertirMinusculas(limpiarNombre($nom));
    $inst = obtenerInstitucion($inst);
    $anio = obtenerAnio($anioIng);
    return $nom . $inst . $anio;
}

$user = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"] ?? "";
    $inst = $_POST["inst"] ?? "";
    $anioIng = $_POST["anio"] ?? "";
    $user = generarUsuario($nom, $inst, $anioIng);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Generador de Usuario</h2>
    <form method="POST">
        <label>Nombre completo:</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Institución:</label><br>
        <input type="text" name="inst" required><br><br>

        <label>Año de ingreso:</label><br>
        <input type="number" name="anio" min="1900" max="2099" required><br><br>

        <button type="submit">Generar usuario</button>
    </form>

    <?php if ($user !== ""): ?>
        <h3>Usuario: <?= htmlspecialchars($user) ?></h3>
    <?php endif; ?>
</body>
</html>