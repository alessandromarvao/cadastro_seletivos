<?php
include_once "../../bootstrap.php";

use Controller\Classes\SessionController; 
use Model\Conexao;
Use Model\Contas;
Use Model\Enderecos;
Use Model\Fiscais;

$matricula = $_REQUEST['inputUsuario'];
$nome = $_REQUEST['inputNome'];
$cpf = $_REQUEST['inputCPF'];
$rg = $_REQUEST['inputRG'];
$orgao = $_REQUEST['inputOrgao'];
$data_exp = $_REQUEST['inputDataExpedicao'];
$sexo = $_REQUEST['inputSexo'];
$data = $_REQUEST['inputData'];
$banco = $_REQUEST['inputBanco'];
$ag = $_REQUEST['inputAg'];
$conta = $_REQUEST['inputConta'];
$tipo_conta = $_REQUEST['inputTipoConta'];
$op = $_REQUEST['inputOperacao'];
$escola = $_REQUEST['inputPreferencia'];
$cep = $_REQUEST['inputCEP'];
$endereco = $_REQUEST['inputEndereco'];
$bairro = $_REQUEST['inputBairro'];
$uf = $_REQUEST['inputUF'];
$municipio = $_REQUEST['inputMunicipio'];
$email = $_REQUEST['inputEmail'];
$pis = "";
if(isset($_REQUEST['inputPIS'])){
    $pis = $_REQUEST['inputPIS'];
}

try {
    $conexao = new Conexao();
    $conexao->beginTransaction();

    //Cadastra a conta do usuário
    Contas::create($banco, $ag, $conta, $tipo_conta, $op);
    //Cadastra o endereço do usuário
    Enderecos::create($endereco, $bairro, $cep, $uf, $municipio);
    
    //Recupera o ID da conta
    $conta = Contas::getLastId();
    //Recupera o ID do endereço
    $endereco = Enderecos::getLastId();

    // echo "$escola, $conta, $endereco, $cpf, $matricula, $nome, $rg, $sexo, $orgao, $data_exp, $email";
    if(Fiscais::create($escola, $conta, $endereco, $cpf, $matricula, $nome, $rg, $sexo, $orgao, $data_exp, $email, $pis)){
        SessionController::close();
        header('Location:/cadastro_seletivos/index.php?m=success');
    }
    
    $conexao->commit();

} catch(Exception $e){
    $conexao->rollback();
}
