<?php
include "conexao.php";

// O código entre cochete deve ser passado para o $.ajax ex: cod_rastreio:...

$nome = $_POST['nome_completo'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$setor = $_POST['setor_responsavel'];
$detalhes = $_POST['detalhes'];
// 1º Passo - Comando SQL
$sql = "INSERT INTO tb_protocolo
        (nome_completo, cpf, email, telefone, setor_responsavel, detalhes) VALUES
        ('$nome', '$cpf','$email', '$telefone', '$setor', '$detalhes')";
// 2º Passo- Preparar a conexão
$inserir = $pdo->prepare($sql);
// 3º Passo - Tentar executar
try{
    $inserir->execute();
    echo "Cadastrado com sucesso";
} catch(PDOException $erro){
    echo "Falha ao inserir!".$erro->getMessage();
}
?>