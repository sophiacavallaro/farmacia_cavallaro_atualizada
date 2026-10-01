<?php

//obter os dados
$nome = $_POST['nome'];
$total = (float) $_POST['total'];
$idade = (int) $_POST['idade'];

if (isset($_POST['cartao']))
{
    $cartao = "sim";
}
else
{
    $cartao = "nao";
}

//processamento
$descontoCartao = 0;

if ($idade == 0)
{
    $descontoIdade = 0;
}
else if ($idade == 1)
{
    $descontoIdade = 5;
}
else
{
    $descontoIdade = 7;
}

if ($cartao == "sim")
{
    $descontoCartao = 5;
}

$valorDescontoIdade = $total * ($descontoIdade / 100);
$valorDescontoCartao = $total * ($descontoCartao / 100);

$valorFinal = $total - $valorDescontoIdade - $valorDescontoCartao;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container resultado">

        <h1>Resultado da compra</h1>
        <p class="subtitulo">Farmácia Cavallaro</p>

        <div class="dados">
            <p><strong>Nome</strong> <span><?php echo htmlspecialchars($nome); ?></span></p>

            <p><strong>Total</strong> <span>R$ <?php echo number_format($total, 2, ',', '.'); ?></span></p>

            <p><strong>Desconto por idade</strong> <span>R$ <?php echo number_format($valorDescontoIdade, 2, ',', '.'); ?></span></p>

            <p><strong>Desconto do cartão</strong> <span>R$ <?php echo number_format($valorDescontoCartao, 2, ',', '.'); ?></span></p>
        </div>

        <div class="total-final">
            <span>Valor final</span>
            <strong>R$ <?php echo number_format($valorFinal, 2, ',', '.'); ?></strong>
        </div>

        <h2>Opções de parcelamento</h2>

        <ul class="parcelas">
            <?php

            // ===== VERSÃO 1: usando FOR (ativa) =====
            for ($parcelas = 1; $parcelas <= 6; $parcelas++)
            {
                $valorParcela = $valorFinal / $parcelas;

                echo '<li>';
                echo '<span class="qtd">' . $parcelas . 'x</span>';
                echo '<span class="pontilhado"></span>';
                echo '<span class="valor">R$ ' . number_format($valorParcela, 2, ',', '.') . '</span>';
                echo '</li>';
            }

            // ===== VERSÃO 2: usando WHILE (comentada) =====
            // Para usar: comente o bloco FOR acima e remova os comentários abaixo.
            /*
            $parcelas = 1;

            while ($parcelas <= 6)
            {
                $valorParcela = $valorFinal / $parcelas;

                echo '<li>';
                echo '<span class="qtd">' . $parcelas . 'x</span>';
                echo '<span class="pontilhado"></span>';
                echo '<span class="valor">R$ ' . number_format($valorParcela, 2, ',', '.') . '</span>';
                echo '</li>';

                $parcelas++;
            }
            */

            ?>
        </ul>

        <a href="index.html" class="voltar">Voltar</a>

    </div>

</body>

</html>