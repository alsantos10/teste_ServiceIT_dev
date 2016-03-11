<?php

class Teste
{
    public function __construct($action) {
        echo 'Chegou Classe Teste';
        
        $this->$action();
    }


    public function acao(){
        echo 'chegou acao';
    }
}