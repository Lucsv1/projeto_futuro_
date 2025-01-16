<?php

namespace Admin\Project\Models;

use Admin\Project\Config\Database;

class OrdersProducts
{
    public function saveDatasOrdersPorducts($data)
    {
        $db = new Database();
        $pdo = $db->auth_db();  

        $stmt = $pdo->prepare("INSERT INTO Pedidos_Produtos (ID_Pedido,ID_Produto, Quantidade) VALUES (:idPedido,:idProduto, :quantidade)");

        $stmt->bindParam(":idPedido", $data['idPedido']);
        $stmt->bindParam(":idProduto", $data['idProdutos']);
        $stmt->bindParam(":quantidade", $data['quantidade']);
        
        $stmt->execute();
    }

}

