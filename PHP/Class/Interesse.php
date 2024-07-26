<?php

namespace Andrey\PHP\Class;

use Andrey\PHP\DAO\InteresseDAO;



class Interesse
{
    private $interesseID;
    private $produtoID;
    private $interessadoID;
    private $dataInteresse;
    use InteresseDAO;

    // Construtor
    public function __construct($produtoID, $interessadoID)
    {
        // Obtendo a data de hoje
        $this->produtoID = $produtoID;
        $this->interessadoID = $interessadoID;
    }

    // Getters e Setters
    public function getInteresseID()
    {
        return $this->interesseID;
    }

    public function getProdutoID()
    {
        return $this->produtoID;
    }

    public function setProdutoID($produtoID)
    {
        $this->produtoID = $produtoID;
    }

    public function getInteressadoID()
    {
        return $this->interessadoID;
    }

    public function setInteressadoID($interessadoID)
    {
        $this->interessadoID = $interessadoID;
    }

    public function getDataInteresse()
    {
        return $this->dataInteresse;
    }

    public function setDataInteresse($dataInteresse)
    {
        $this->dataInteresse = $dataInteresse;
    }
}
