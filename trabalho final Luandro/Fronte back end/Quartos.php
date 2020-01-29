<?php 
require_once ("BD.php");
class Quartos
{
	private $conexao;

	function __construct() {
        $this->conexao = new BD();
    }

    function Mostra() {
        $sql = "SELECT * FROM quartos";
        $result = $this->conexao->select($sql);
        return $result;
    }
    function Mostra1($identificador){
    	$sql = "SELECT * FROM quartos where Identificador = Identificador";
    	$result = $this->conexao->select($sql);
        return $result;
    } 
}