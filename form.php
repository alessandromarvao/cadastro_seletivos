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
        <form method="POST" action="controller/Acessos/login.php" class="form-left">
            <div class="form-group">
                <label for="inputUsuario"><h2>Matrícula:</h2></label>
                <?php
                echo "<input type='text' name='inputUsuario' class='form-control' id='inputUsuario' autocomplete='off' placeholder='Digite sua matrícula do SUAP' value='" . SessionController::get('user') . "'>";
                ?>
                
            </div>
            <div class="form-group">
                <label for="inputNome"><h2>Nome Completo:</h2></label>
                <input type="text" name="inputNome" class="form-control" id="inputNome" placeholder="Digite sua senha de acesso ao SUAP">
            </div>
            <div class="form-group">
                <label for="inputCPF"><h2>CPF:</h2></label>
                <input type="text" name="inputCPF" class="form-control" id="inputCPF" placeholder="Digite sua senha de acesso ao SUAP">
            </div>
            <div class="form-group">
                <label for="inputData"><h2>Data de Nascimento:</h2></label>
                <input type="date" name="inputData" class="form-control" id="inputData" placeholder="Digite sua senha de acesso ao SUAP">
            </div>
            <div class="form-group">
                <label for="inputEmail"><h2>E-mail:</h2></label>
                <input type="text" name="inputEmail" class="form-control" id="inputEmail" placeholder="Digite sua senha de acesso ao SUAP">
            </div>
            <div class="form-group">
                <label for="inputNome"><h2>Nome Completo:</h2></label>
                <input type="text" name="inputNome" class="form-control" id="inputNome" placeholder="Digite sua senha de acesso ao SUAP">
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