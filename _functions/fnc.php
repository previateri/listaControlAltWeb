<?php
function getNumbers(){
    for ($i = 0; $i <= 24; $i++):
        $arrNumbers[] = $i + 1;
    endfor;

    shuffle($arrNumbers);

    $sNumbers = array_rand($arrNumbers, 15);

    foreach ($sNumbers as $value):
        $numberSorter[] = $arrNumbers[$value];
    endforeach;

    sort($numberSorter);

    return $numberSorter;
}