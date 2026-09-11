<?php

$trabajadores = [
    "T001" => [
        "nombre" => "Ana Torres",
        "cargo"  => "Administrador",
        "sueldo" => 2500
    ],
    "T002" => [
        "nombre" => "Luis Pérez",
        "cargo"  => "Programador",
        "sueldo" => 3200
    ],
    "T003" => [
        "nombre" => "María Díaz",
        "cargo"  => "Diseñador",
        "sueldo" => 2800
    ]
];

$codigoBuscado = isset($_GET["codigo"]) ? $_GET["codigo"] : "";
$encontrado = null;

if ($codigoBuscado !== "") {
    if (array_key_exists($codigoBuscado, $trabajadores)) {
        $encontrado = $trabajadores[$codigoBuscado];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de trabajadores</title>
</head>
<body>
    <h1>Buscador de trabajadores</h1>

    <form action="trabajadores.php" method="GET">
        <label for="codigo">Código del trabajador:</label>
        <input type="text" name="codigo" id="codigo" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($codigoBuscado !== ""): ?>
        <?php if ($encontrado !== null): ?>
            <h2>Datos del trabajador</h2>
            <p><strong>Nombre:</strong> <?php echo $encontrado["nombre"] ?></p>
            <p><strong>Cargo:</strong> <?php echo $encontrado["cargo"] ?></p>
            <p><strong>Sueldo:</strong> S/ <?php echo number_format($encontrado["sueldo"], 2) ?></p>
        <?php else: ?>
            <p>No se encontró al trabajador con código "<?php echo $codigoBuscado ?>".</p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>