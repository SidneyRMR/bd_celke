<?php

include_once "conexao.php";

$query_produtos = "SELECT prod.id_produto, prod.desc_produto, saldo.qtd_disponivel, saldo.qtd_a_retirar,saldo.id_produto
        FROM tb_produtos AS prod
        -- WHERE prod.id_produto = 100
        LEFT JOIN tb_saldo_est AS saldo ON saldo.id_produto=prod.id_produto
        ORDER BY prod.id_produto DESC";

$result_produtos = $conn->prepare($query_produtos);
$result_produtos->execute();

if(($result_produtos) and ($result_produtos->rowCount() !=0)){
    $dados = "<table>";
    $dados .= "<thead>";
    $dados .= "</thead>";
    $dados .= "<tbody>";
    while($row_produto = $result_produtos->fetch(PDO::FETCH_ASSOC)){
        extract($row_produto);
        $dados .= "<tr>";
        $dados .= "<td>$id_produto</td>";
        $dados .= "<td>$desc_produto</td>";
        $dados .= "<td>$qtd_disponivel</td>";
        $dados .= "<td>$qtd_a_retirar</td>";
        $dados .= "</tr>";
    }
    $dados .= "</tbody>";
    $dados .= "</table>";
    $retorna = ['status' => true, 'dados' => $dados];
}else{
    $retorna = ['status' => false, 'msg' => "<p style='color: #fff;'>Erro: nenhum produto encontrado!</p>"];
}
echo json_encode($retorna);