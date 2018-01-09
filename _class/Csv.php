<?php

class Csv
{
    private $data = [];
    private $result;

    public function lerTxt($filename)
    {
        $file = fopen($filename, 'r');

        while (!feof($file)):
            $lines[] = fgets($file);
        endwhile;
        fclose($file);

        array_shift($lines);
        array_pop($lines);
        //Um elemento a mais com o valor false?
        array_pop($lines);

        foreach ($lines as $line):
            $data['nomes'][] = trim(substr($line, 234, 39));
            $data['enderecos'][] = trim(substr($line, 274, 49));
        endforeach;

        $this->arrayToCsv($data);

        return $this->getResult();
    }

    public function getResult()
    {
        return $this->result;
    }

    protected function setResult($result)   {
        $this->result = $result;
    }

    private function arrayToCsv($arrayData){
        for($i = 0; $i < count($arrayData['nomes']); $i++):
            $this->data[] = trim($arrayData['nomes'][$i] . ";" . $arrayData['enderecos'][$i]);
        endfor;

        $this->saveCsv();
    }

    private function saveCsv(){
        $csv['name'] = 'nomes_enderecos.csv';
        $csv['content'] = implode("\n", $this->data);

        $file = fopen($csv['name'], 'a');
        fwrite($file, $csv['content']);
        fclose($file);

        $newName = '_data'.DIRECTORY_SEPARATOR.'nomes_enderecos-' . time() . '.csv' ;

        rename('nomes_enderecos.csv',$newName);

        if(file_exists($newName)){
            $this->setResult(true);
        }else{
            $this->setResult(false);
        }
    }
}