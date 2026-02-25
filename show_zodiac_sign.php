<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php include('header.php'); ?>

<?php

// Verifica se veio a data
if (isset($_POST['data_nascimento'])) {

    $data_nascimento = $_POST['data_nascimento'];

    // Carrega XML
    $signos = simplexml_load_file("signos.xml");

    // Converte data para dia/mês
    $data = DateTime::createFromFormat('Y-m-d', $data_nascimento);
    $dia_mes = $data->format('d/m');

    $nascimento = DateTime::createFromFormat('d/m', $dia_mes);

    foreach ($signos->signo as $signo) {

        $inicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
        $fim = DateTime::createFromFormat('d/m', $signo->dataFim);

        // Tratamento especial para signos que atravessam o ano
        if ($inicio <= $fim) {
            if ($nascimento >= $inicio && $nascimento <= $fim) {
                $signo_encontrado = $signo;
                break;
            }
        } else {
            if ($nascimento >= $inicio || $nascimento <= $fim) {
                $signo_encontrado = $signo;
                break;
            }
        }
    }

    if (isset($signo_encontrado)) {
        echo "<div class='card p-4 shadow'>";
        echo "<h2>{$signo_encontrado->signoNome}</h2>";
        echo "<p>{$signo_encontrado->descricao}</p>";
        echo "</div>";
    } else {
        echo "<p>Signo não encontrado.</p>";
    }

} else {
    echo "<p>Data inválida.</p>";
}

?>

<a href="index.php" class="btn btn-secondary mt-3">
    Voltar
</a>

</body>
</html>
