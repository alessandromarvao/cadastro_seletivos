<?php
include_once "views/default/header.php";

use Controller\Classes\SessionController;
use Model\Bancos;
use Model\Escolas;

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
        <form method="POST" action="/cadastro_seletivos/controller/Cadastro/fiscal.php">
            <div class="form-group">
                <label for="inputUsuario"><h2>Matrícula:</h2></label>
                <input type='text' name='inputUsuario' class='form-control' id='inputUsuario' autocomplete='off' value="<?php echo SessionController::get('user') ?>" autocomplete="off">
                
            </div>
            <div class="form-group">
                <label for="inputNome"><h2>Nome Completo:</h2></label>
                <input type="text" name="inputNome" class="form-control" id="inputNome"value="<?php echo SessionController::get('nome')?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputCPF"><h2>CPF:</h2></label>
                <input type="text" name="inputCPF" class="form-control" id="inputCPF" value="<?php echo SessionController::get('cpf')?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputRG"><h2>R.G.(somente números):</h2></label>
                <input type="text" name="inputRG" class="form-control" id="inputRG" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputOrgao"><h2>Órgão expeditor:</h2></label>
                <input type="text" name="inputOrgao" class="form-control" id="inputOrgao" placeholder="Ex.: SSP-MA" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputDataExpedicao"><h2>Data de expedição:</h2></label>
                <input type="date" name="inputDataExpedicao" class="form-control" id="inputDataExpedicao" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputSexo"><h2>Sexo:</h2></label>
                <select name="inputSexo" id="inputSexo">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputData"><h2>Data de Nascimento:</h2></label>
                <input type="date" name="inputData" class="form-control" id="inputData" placeholder="Digite sua senha de acesso ao SUAP" value="<?php echo SessionController::get('nascimento')?>" autocomplete="off">
            </div>
            <hr>
            <h3>Dados Bancários <small>(você não pode utilizar contas bancárias de terceiros) </small></h3>
            <div class="form-group">
                <label for="inputBanco">Banco:</label>
                <select name="inputBanco" id="inputBanco">
                <?php
                foreach(SessionController::get('bancos') as $row){
                    echo "<option value='" . $row['id'] . "'>" . $row['banco'] . "</option>\n";
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="inputAg"><h2>Agência:</h2></label>
                <input type="text" name="inputAg" class="form-control" id="inputAg" placeholder="Ex.: 1027-8" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputConta"><h2>Conta:</h2></label>
                <input type="text" name="inputConta" class="form-control" id="inputConta" placeholder="Ex.: 23123-X" autocomplete="off">
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
                <input type="text" name="inputOperacao" id="inputOperacao" class="form-control" placeholder="Ex.: 003" autocomplete="off">
            </div>
            <hr>
            <h3>Informações sobre localização</h3>
            <div class="form-group">
                <label for="inputPreferencia">Escola de Preferência:</label>
                <select name="inputPreferencia" id="inputPreferencia">
                    <?php
                    foreach(SessionController::get('escolas') as $row){
                        echo "<option value='" . $row['id'] . "'>" . $row['escola'] . "</option>\n";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="inputCEP">CEP:</label>
                <input type="text" name="inputCEP" id="inputCEP" class="form-control" value="65590-000" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputEndereco">Endereço:</label>
                <input type="text" name="inputEndereco" id="inputEndereco" class="form-control" placeholder="Ex.: Rua 03, S/N" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputBairro">Bairro:</label>
                <input type="text" name="inputBairro" id="inputBairro" class="form-control" placeholder="Ex.: Povoado Mandacaru" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputUF">UF:</label>
                <input type="text" name="inputUF" id="inputUF" class="form-control" placeholder="Ex.: MA" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputMunicipio">Município:</label>
                <input type="text" name="inputMunicipio" id="inputMunicipio" class="form-control" value="Barreirinhas" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputEmail">E-mail:</label>
                <input type="text" name="inputEmail" id="inputEmail" class="form-control" placeholder="Digite aqui o seu e-mail corretamente" value="<?php echo SessionController::get('email'); ?>" autocomplete="off">
            </div>
            <hr>
            <div class="alert">
                <label class="checkbox">
                    <input type="checkbox" required> Declaro estar de acordo com as informações contidas no seletivo de ficais, assim como declaro serem corretas todas as informações por mim fornecidas no ato da inscrição.
                </label>
            </div>
            <div class="alert alert-error">
                <h3>Atenção!</h3>
                <p>Qualquer divergência nas informações inseridas poderá resultar no cancelamento de sua inscrição. Verifique se preencheu todos os campos corretamente.</p>
            </div>
            <br>
            <button type="submit" class="btn btn-success btn-large">Enviar</button>
            <a href="/cadastro_seletivos/index.php" class="btn btn-warning btn-large">Cancelar</a>
            
        </form>
    </div>
</div>

<?php
/*
*   Rodapé da página
*/
include_once "views/default/footer.php";
?>