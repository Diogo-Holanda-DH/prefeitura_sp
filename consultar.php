<?php
include "conexao.php";
$cod = $_POST['cod'];
$sql = "SELECT * FROM tb_protocolo
        WHERE numero_protocolo LIKE '%$cod%'";

$consultar = $pdo->prepare($sql);
try{
    $consultar->execute();
    if($consultar->rowCount()>=1){
        $resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $item){
            $num = $item['numero_protocolo'];
            $nome = $item['nome_completo'];
            $cpf = $item['cpf'];
            $email = $item['email'];
            $telefone = $item['telefone'];
            $setor = $item['setor_responsavel'];
            $detalhes = $item['detalhes'];
    
            echo "
                    <div class='atualizacao'>           
                        <span class='numero_protocolo'>Nº: $num</span> <br>           
                        <span class='nome_completo'>Nome: $nome</span> <br>           
                        <span class='cpf'>CPF: $cpf</span> <br>           
                        <span class='email'>E-mail: $email</span> <br>           
                        <span class='telefone'>Telefone: $telefone</span> <br>           
                        <span class='setor_resp'>Setor: $setor</span> <br>           
                        <span class='detalhes'>Detalhes: $detalhes</span> <br>           
                    </div>
            ";
        }
    }else{
        echo "Nada encontrado";
    }
}catch(PDOException $erro){
    echo "Falha ao consutar!";

}




?>