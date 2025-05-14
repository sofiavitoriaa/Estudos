<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Jogo da Velha</title>
    <link rel="stylesheet" href="game.css">
</head>
<body>
<div class="game-container">
    <h1>Jogo da Velha </h1>
    <?php
    // Inicializa o tabuleiro
    $board = isset($_POST['board']) ? $_POST['board'] : array_fill(0, 9, '');
    $currentPlayer = isset($_POST['currentPlayer']) ? $_POST['currentPlayer'] : 'X';
    $winner = checkWinner($board);

    // Função para verificar o vencedor
    function checkWinner($b) {
        $combinations = [
            [0,1,2], [3,4,5], [6,7,8], // linhas
            [0,3,6], [1,4,7], [2,5,8], // colunas
            [0,4,8], [2,4,6]           // diagonais
        ];

        foreach ($combinations as $combo) {
            if ($b[$combo[0]] && $b[$combo[0]] === $b[$combo[1]] && $b[$combo[1]] === $b[$combo[2]]) {
                return $b[$combo[0]];
            }
        }

        return in_array('', $b) ? null : 'Empate';
    }

    // Atualiza o tabuleiro após o clique
    if (isset($_POST['move']) && !$winner) {
        $move = $_POST['move'];
        if ($board[$move] === '') {
            $board[$move] = $currentPlayer;
            $winner = checkWinner($board);
            $currentPlayer = $currentPlayer === 'X' ? 'O' : 'X';
        }
    }
    ?>

    <form method="post">
        <div class="board">
            <?php foreach ($board as $i => $value): ?>
                <button type="submit" name="move" value="<?= $i ?>" <?= $value || $winner ? 'disabled' : '' ?>>
                    <?= htmlspecialchars($value) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <?php if ($winner): ?>
            <div class="status">
                <?= $winner === 'Empate' ? "Empate!" : "Vencedor: $winner!" ?>
            </div>
            <button class="reset" type="submit">Reiniciar</button>
        <?php else: ?>
            <input type="hidden" name="currentPlayer" value="<?= $currentPlayer ?>">
        <?php endif; ?>

        <?php foreach ($board as $cell): ?>
            <input type="hidden" name="board[]" value="<?= htmlspecialchars($cell) ?>">
        <?php endforeach; ?>
    </form>
</div>
</body>
</html>