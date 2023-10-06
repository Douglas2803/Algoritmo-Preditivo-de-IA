<?php
class Matriz {
    private $linhas, $colunas;
    private $data = [];
    //criaçao da matriz
    public function __construct($linhas, $colunas)
    {
        $this->linhas = $linhas;
        $this->colunas = $colunas;

        for ($i = 0; $i < $linhas; $i++) {
            $array = [];
            for ($j = 0; $j < $colunas; $j++) {
                // teste com numero randômico
                $array[] = rand(0, 10000) / 10000;
            }
            $this->data[] = $array;
        }
    }

}
?>