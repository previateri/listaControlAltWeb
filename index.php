<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>THIAGO H PREVIATERI - CONTROL ALT WEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-panel w3-teal">Exercícios 1 e 2</div>
<div class="w3-container w3-center w3-padding">
    <?php
    $sorteio = [1,4,5,6,9,10,11,12,19,20,21,22,23,24,25];
    require_once '_functions/fnc.php';
    echo "<div class='w3-panel'>Numeros Sorteados: <br><p>".implode(" - ", $sorteio)."</p></div>";
    for ($j = 1; $j <= 3; $j++):
        ?>
        <table class="w3-table w3-content w3-gray" style="max-width: 50%">
            <div class="w3-panel w3-leftbar w3-border-blue w3-pale-blue">
                <p>N. Jogo - <?= $j ?></p>
            </div>
            <?php
            $numbers = getNumbers();
            echo "<p>" . implode(' - ', $numbers) . "</p>";
            echo "<tr>";
            for ($i = 1; $i <= 25; $i++):
                $n = ($i < 10 ? "0$i" : $i);
                $class = (in_array($i, $numbers) ? 'w3-blue' : 'w3-yellow');
                $class2 = (in_array($i, $sorteio) ? ' w3-green' : '');
                echo "<td><span class='w3-tag w3-padding {$class}{$class2}'>{$n}</span></td>";
                echo($i % 5 == 0 ? '</tr><tr>' : '');
            endfor;
            echo "<tr>";
            ?>
        </table>
    <?php endfor ?>
</div>
<hr>
<hr>
<hr>
<div class="w3-panel w3-teal">Exercícios 3 e 4</div>
<div class="w3-container w3-padding" id="sendTXT" style="max-width: 45%; margin: 0 auto;">
    <?php
    $res = false;
    $newCsv = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (isset($newCsv) && ($newCsv['submitTXT'])):
        unset($newCsv['submitTXT']);
        $newCsv['txt'] = (($_FILES['txtFile']['tmp_name'] ? $_FILES['txtFile'] : null));

        require_once '_class/Csv.php';
        $csv = new Csv();
        if ($csv->lerTxt($newCsv['txt']['tmp_name'])):
            $res =  '<p class="w3-green w3-padding w3-center">Sucesso o arquivo foi enviado, convertido e salvo!</p>';
        else:
            $res = '<p class="w3-red w3-padding w3-center">Falha, houve algum problema com o seu arquivo, por favor, tente novamente.</p>';
        endif;
    endif;
    if (!$res):
        ?>
        <form class="w3-content" action="#sendTXT" method="post" enctype="multipart/form-data">
            <p>
                <label>Selecione o arquivo TXT</label>
                <input class="w3-input" type="file" accept=".txt" name="txtFile">
            </p>
            <p>
                <input class="w3-input w3-right w3-green" type="submit" value="Enviar" name="submitTXT">
            </p>
            <p>
        </form>
        <?php
    endif;
    echo "<div class='w3-container w3-border w3-center'>{$res}</div>";
    ?>
</div>
<div class="w3-panel w3-center">
    <p>Thiago Henrique Previateri <br> 16.99195-1876 <br> thiago.previateri@outlook.com</p>
</div>
</body>
</html>
