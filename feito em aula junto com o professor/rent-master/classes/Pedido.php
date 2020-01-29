<?php 
require_once ("BD.php");
class Pedido
{
    private $conexao;

    function __construct() {
        $this->conexao = new BD();
    }    
    
    function cadastrar() {
    	$tipo = ($_SESSION['frete'] == 0) ? 1 : 2;
    	$data = date("Y-m-d H:i:s");
    	$this->conexao->query("start transaction");
    	$insere = $this->conexao->query("insert into pedido (idCliente, taxaEntrega, tipoEntrega, dataPedido, status) 
    		values ({$_SESSION['id']}, {$_SESSION['frete']}, $tipo,
    		'$data', 0)");
    	if($insere){
    		$this->conexao->query("set @numPedido = last_insert_id()");
    		foreach ($_SESSION['carrinho'] as $idProduto => $item){
    			$insereItem = $this->conexao->query("insert into itemPedido (numPedido, idProduto, quantidade, valorLocacao) values (@numPedido, $idProduto, {$item['quantidade']}, {$item['valorFinal']})");
    			if(!$insereItem)
    				break;
    		}
    	}
    	if($insere && $insereItem)
    		$this->conexao->query("commit");
    	else
    		$this->conexao->query("rollback");

    	return ($insere && $insereItem);
    }
}
?>