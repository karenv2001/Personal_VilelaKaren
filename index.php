<?php
// Variables de la calculadora
$num1 = "";
$num2 = "";
$operacion = "suma";
$resultado = "";
$error = "";

// Solo se calcula cuando se envia el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"] ?? "";
    $num2 = $_POST["num2"] ?? "";
    $operacion = $_POST["operacion"] ?? "suma";

    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Debes ingresar dos números válidos.";
    } else {
        switch ($operacion) {
            case "suma":
                $resultado = $num1 + $num2;
                break;
            case "resta":
                $resultado = $num1 - $num2;
                break;
            case "multiplicacion":
                $resultado = $num1 * $num2;
                break;
            case "division":
                if ($num2 == 0) {
                    $error = "No se puede dividir para cero.";
                } else {
                    $resultado = $num1 / $num2;
                }
                break;
            default:
                $error = "Operación no válida.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karen Vilela | Página personal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        <h1 id="titulo">Karen Jacqueline Vilela Vásquez</h1>
        <p class="subtitulo">Estudiante de Ingeniería de Software</p>
        <p><strong>Universidad:</strong> UNIANDES (Universidad Regional Autónoma de los Andes)</p>
        <p><strong>Ubicación:</strong> Santo Domingo, Ecuador</p>

        <h2>Perfil</h2>
        <p>Soy estudiante de sexto semestre de Ingeniería de Software y trabajo mientras
            estudio, así que he aprendido a organizar bien mi tiempo. Me gusta programar y
            aprender cosas nuevas, y en la carrera he practicado sobre todo desarrollo web y
            aplicaciones con base de datos. Mi meta es seguir mejorando como desarrolladora.</p>

        <h2>Estudios</h2>
        <ul>
            <li>Ingeniería de Software, UNIANDES (sexto semestre)</li>
        </ul>

        <h2>Experiencia</h2>
        <ul>
            <li>Trabajo y estudio al mismo tiempo</li>
            <li>Sistemas de pedidos y donaciones en PHP con patrón MVC (trabajos de la carrera)</li>
            <li>Backend con ASP.NET Core y frontend con Angular (trabajos de la carrera)</li>
        </ul>

        <h2>Conocimientos técnicos</h2>
        <ul>
            <li>HTML, CSS y PHP</li>
            <li>C# y ASP.NET Core</li>
            <li>Angular</li>
            <li>MySQL</li>
            <li>Git y GitHub</li>
        </ul>

        <h2>Idiomas</h2>
        <ul>
            <li>Español: nativo</li>
            <li>Inglés: nivel B1</li>
        </ul>

        <h2>Intereses</h2>
        <ul>
            <li>Administración</li>
            <li>Gestión empresarial</li>
            <li>Atención al cliente</li>
            <li>Desarrollo organizacional</li>
            <li>Trabajo en equipo</li>
            <li>Aprendizaje continuo</li>
            <li>Crecimiento profesional</li>
        </ul>

        <h2>Contacto</h2>
        <ul>
            <li><strong>LinkedIn:</strong>
                <a class="enlace" href="https://www.linkedin.com/in/karen-vilela-a27746448/" target="_blank">Karen Vilela</a>
            </li>
        </ul>
    </div>

    <div class="contenedor">
        <h2>Calculadora</h2>
        <form method="post">
            <label for="num1">Primer número</label>
            <input type="text" id="num1" name="num1" value="<?= htmlspecialchars($num1) ?>" required>

            <label for="num2">Segundo número</label>
            <input type="text" id="num2" name="num2" value="<?= htmlspecialchars($num2) ?>" required>

            <label for="operacion">Operación</label>
            <select id="operacion" name="operacion">
                <option value="suma" <?= $operacion == "suma" ? "selected" : "" ?>>Suma (+)</option>
                <option value="resta" <?= $operacion == "resta" ? "selected" : "" ?>>Resta (-)</option>
                <option value="multiplicacion" <?= $operacion == "multiplicacion" ? "selected" : "" ?>>Multiplicación (×)</option>
                <option value="division" <?= $operacion == "division" ? "selected" : "" ?>>División (÷)</option>
            </select>

            <button type="submit">Calcular</button>
        </form>

        <?php if ($error != "") { ?>
            <p class="mensaje error"><?= $error ?></p>
        <?php } elseif ($resultado !== "") { ?>
            <p class="mensaje resultado"><strong>Resultado:</strong> <?= $resultado ?></p>
        <?php } ?>
    </div>
</body>
</html>
