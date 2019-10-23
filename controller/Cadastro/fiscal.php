<?php

use Model\Conexao;
Use Model\Bancos;
Use Model\Contas;
Use Model\Enderecos;
Use Model\Escolas;
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

try {
    Contas::create($banco, $ag, $conta, $tipo_conta, $op);
    Enderecos::create($endereco, $bairro, $cep, $uf, $municipio);
} catch(Exception $e){
    $conexao->rollback();
}