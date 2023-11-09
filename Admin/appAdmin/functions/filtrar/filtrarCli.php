<?php
include_once "../../../../lib/conn.php";

$valorInput = filter_input(INPUT_GET, "value", FILTER_DEFAULT);

if (!empty($valorInput)) {
    $pesquisarValor = $valorInput . "%";

    $sqlQuerry = 'SELECT * FROM Cliente INNER JOIN ENDERECO ON cod_endereco = fkcod_endereco WHERE nome LIKE :nome';
    $sqlResult= $conn->prepare($sqlQuerry);
    $sqlResult->bindValue(":nome", $pesquisarValor);
    $sqlResult->execute();

    if ($sqlResult->rowCount() > 0) {
        while ($linha_produto= $sqlResult->fetch(PDO::FETCH_ASSOC)) {
            $dados[] = $linha_produto;
        }
        $response = ['status'=>true, 'dados'=>$dados];
    }else {
        $response = ['status'=>false, 'msg'=>"Nada encontrado!"];
    }
}
else {
    $response = ['status'=>false, 'msg'=>"Nada encontrado!"];
}

echo json_encode($response)
?>