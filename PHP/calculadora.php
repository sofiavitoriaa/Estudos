<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Calculadora </title>
    <link rel="stylesheet" href="calculadora.css">
</head>
<body>
    <div class="calculator">
        <h2> Calculadora </h2>
        <form method="post">
            <input type="number" name="num1" step="any" required placeholder="Primeiro número">
            <input type="number" name="num2" step="any" required placeholder="Segundo número">
            <select name="operador">
                <option value="+">+</option>
                <option value="-">−</option>
                <option value="*">×</option>
                <option value="/">÷</option>
            </select>
            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operador = $_POST["operador"];
            $resultado = "";

            switch ($operador) {
                case "+":
                    $resultado = $num1 + $num2;
                    break;
                case "-":
                    $resultado = $num1 - $num2;
                    break;
                case "*":
                    $resultado = $num1 * $num2;
                    break;
                case "/":
                    $resultado = $num2 != 0 ? $num1 / $num2 : "Erro: divisão por zero";
                    break;
                default:
                    $resultado = "Operador inválido";
            }

            echo "<div class='result'>Resultado: <strong>$resultado</strong></div>";
        }
        ?>
    </div>
</body>
</html>
