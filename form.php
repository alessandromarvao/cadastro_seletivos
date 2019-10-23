<?php
include_once "bootstrap.php";
include_once "views/default/header.php";

use Controller\Classes\SessionController;

SessionController::close();
/*
*   Cabeçalho da página
*/
?>

<div class="container">
    <div class="page-title">
        <h1>Formulário de Cadastro de Fiscais - Seletivo IFMA 2019</h1>
    </div>
    <hr />
    <div class="page">
        <form method="POST" action="controller/Acessos/login.php">
            <div class="form-group">
                <label for="inputUsuario"><h2>Matrícula:</h2></label>
                <input type='text' name='inputUsuario' class='form-control' id='inputUsuario' autocomplete='off' value="<?php echo SessionController::get('user') ?>">
                
            </div>
            <div class="form-group">
                <label for="inputNome"><h2>Nome Completo:</h2></label>
                <input type="text" name="inputNome" class="form-control" id="inputNome"value="<?php echo SessionController::get('nome')?>">
            </div>
            <div class="form-group">
                <label for="inputCPF"><h2>CPF:</h2></label>
                <input type="text" name="inputCPF" class="form-control" id="inputCPF" value="<?php echo SessionController::get('cpf')?>">
            </div>
            <div class="form-group">
                <label for="inputRG"><h2>R.G.(somente números):</h2></label>
                <input type="text" name="inputRG" class="form-control" id="inputRG">
            </div>
            <div class="form-group">
                <label for="inputOrgao"><h2>Órgão expeditor:</h2></label>
                <input type="text" name="inputOrgao" class="form-control" id="inputOrgao" placeholder="Ex.: SSP-MA">
            </div>
            <div class="form-group">
                <label for="inputDataExpedicao"><h2>Data de expedição:</h2></label>
                <input type="date" name="inputDataExpedicao" class="form-control" id="inputDataExpedicao">
            </div>
            <div class="form-group">
                <label for="inputSexo"><h2>Sexo:</h2></label>
                <select name="innputSexo" id="inputSexo">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputData"><h2>Data de Nascimento:</h2></label>
                <input type="date" name="inputData" class="form-control" id="inputData" placeholder="Digite sua senha de acesso ao SUAP" value="<?php echo SessionController::get('nascimento')?>">
            </div>
            <hr>
            <h3>Dados Bancários <small>(você não pode utilizar contas bancárias de terceiros) </small></h3>
            <div class="form-group">
                <label for="inputBanco">Banco:</label>
                <input type="text" name="inputBanco" id="inputBanco" class="form-control" placeholder="Ex.: Banco do Brasil">
            </div>
            <div class="form-group">
                <label for="inputAg"><h2>Agência:</h2></label>
                <input type="text" name="inputAg" class="form-control" id="inputAg" placeholder="Ex.: 1027-8">
            </div>
            <div class="form-group">
                <label for="inputConta"><h2>Conta:</h2></label>
                <input type="text" name="inputConta" class="form-control" id="inputConta" placeholder="Ex.: 23123-X">
            </div>
            <div class="form-group">
                <label for="inputTipoConta">Tipo de Conta:</label>
                <select name="inputTipoConta" id="inputTipoConta">
                    <option value="corrente">Conta Corrente</option>
                    <option value="poupança">Conta Poupança</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputOperacao">Tipo de Operação (somente para poupança):</label>
                <input type="text" name="inputOperacao" id="inputOperacao" class="form-control" placeholder="Ex.: 003">
            </div>
            <hr>
            <h3>Informações sobre localização</h3>
            <div class="form-group">
                <label for="inputPreferencia">Escola de Preferência:</label>
                <select name="inputPreferencia" id="inputPreferencia">
                    <option value="IFMA">IFMA - Campus Barreirinhas</option>
                    <option value="Joaquim">U.I. Joaquim Soeiro de Carvalho</option>
                    <option value="Rebelo">Escola Benedito Rebelo dos Reis</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputCEP">CEP:</label>
                <input type="text" name="inputCEP" id="inputCEP" class="form-control" value="65590-000">
            </div>
            <div class="form-group">
                <label for="inputEndereco">Endereço:</label>
                <input type="text" name="inputEndereco" id="inputEndereco" class="form-control" placeholder="Ex.: Rua 03, S/N">
            </div>
            <div class="form-group">
                <label for="inputBairro">Bairro:</label>
                <input type="text" name="inputBairro" id="inputBairro" class="form-control" placeholder="Ex.: Povoado Mandacaru">
            </div>
            <div class="form-group">
                <label for="inputUF">UF:</label>
                <input type="text" name="inputUF" id="inputUF" class="form-control" placeholder="Ex.: MA">
            </div>
            <div class="form-group">
                <label for="inputMunicipio">Município:</label>
                <input type="text" name="inputMunicipio" id="inputMunicipio" class="form-control" value="Barreirinhas">
            </div>
            <div class="form-group">
                <label for="inputEmail">E-mail:</label>
                <input type="text" name="inputEmail" id="inputEmail" class="form-control" placeholder="Digite aqui o seu e-mail corretamente" value="<?php echo SessionController::get('email'); ?>">
            </div>
            <hr>
            <div class="alert">
            <label class="checkbox">
                <input type="checkbox" required> Declaro estar de acordo com as informações contidas no seletivo de ficais, assim como declaro serem corretas todas as informações por mim fornecidas no ato da inscrição.
            </label>
            </div>
            <button type="submit" class="btn btn-success btn-large">Enviar</button>
            
        </form>
    </div>
</div>

<?php
/*
*   Rodapé da página
*/
include_once "views/default/footer.php";
?>