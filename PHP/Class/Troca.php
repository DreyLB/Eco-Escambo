<?php

namespace Andrey\PHP\Class;

use Andrey\PHP\DAO\TrocaDAO;


// Classe Troca
Class Troca
{
    private $trocaID;
    private $data;
    private $status;
    use TrocaDAO;

    public function __construct()
    {
        $dataHoje = date('Y-m-d');
        $this->data = $dataHoje;
        $this->status = 'Pendente';
    }

    // Getters e Setters
    public function getTrocaID()
    {
        return $this->trocaID;
    }

    public function setTrocaID($trocaID)
    {
        $this->trocaID = $trocaID;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        
    }
}
