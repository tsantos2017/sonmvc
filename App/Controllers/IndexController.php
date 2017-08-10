<?php
namespace App\Controllers;
use SON\Controller\Action;
use SON\DI\Container;

class IndexController extends Action {


    public function index(){
        $cliente = Container::getModel("Cliente");
        $this->views->cliente = $cliente->listar_clientes();
        $this->render("index");
    }
    public function contatos($id)
    {
        $cliente = Container::getModel("Cliente");
        $this->views->cliente = $cliente->busca_cliente($id);
        $this->render("contatos");
    }

    public function contato(){
        $pai = Container::getModel("Pai");
        $this->views->pai = $pai->listar_clientes();

        $filho = Container::getModel("Filho");
        $this->views->filho = function($id) use($filho){
            return $filho->busca_cliente($id);
        };
        $this->render("contato");
    }
}