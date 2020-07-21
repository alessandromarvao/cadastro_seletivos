<?php
session_start();

include_once $_SERVER['HTTP_HOST']. "/bootstrap.php";

use Controller\Classes\SessionController;

switch($_SERVER['REQUEST_URI']){
    case '/cadastro_seletivos/form.php':
        if (empty(SessionController::get('user'))){
            exit(header("Location: /cadastro_seletivos/index.php"));
        }
    break;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de fiscais - Seletivo IFMA 2019</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://barreirinhas.ifma.edu.br/wp-content/themes/portalgov/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://barreirinhas.ifma.edu.br/wp-content/themes/portalgov/css/template-verde.css?v=1569005042">
    <link rel="stylesheet" href="https://barreirinhas.ifma.edu.br/wp-content/themes/portalgov/css/font-awesome.min.css" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,800,700" rel="stylesheet" type="text/css">

    <link href="https://barreirinhas.ifma.edu.br/wp-content/themes/portalgov/img/icons/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
</head>
<body>
<header class="">			
    <div class="container">				
        <div class="row-fluid accessibility-language-actions-container"> 					
            <div class="span5 accessibility-container"> 						
            <ul id="accessibility"> 							
                <li>
                    <a accesskey="1" href="#content" id="link-conteudo"> Ir para 									o conte&uacute;do <span>1</span> </a>
                </li>
                <li>
                    <a accesskey="2" href="#navigation" id="link-navegacao"> Ir 									para o menu <span>2</span> </a>
                </li>
                <li>
                    <a accesskey="3" href="#portal-searchbox" id="link-buscar"> Ir para a busca <span>3</span> </a>
                </li>
                <li>
                    <a accesskey="4" href="#footer" id="link-rodape"> Ir para o 									rodap&eacute; <span>4</span> </a>
                </li>
            </ul>
        </div> <!-- fim div.span6 -->
        <div class="span7 language-and-actions-container">
                    <!-- Descomente para inserir menu de exemplo de idiomas no topo -->
                    
                    <ul id="portal-siteactions" class="pull-right">
                        <li>
                            <a accesskey="5" href="/acessibilidade">Acessibilidade</a>
                        </li>
                        <li>
                            <a accesskey="7" href="/mapa-do-site">Mapa do Site</a>
                        </li>
                    </ul>

<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'pt',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
function GTranslateGetCurrentLang() {var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');return keyValue ? keyValue[2].split('/')[2] : null;}
function GTranslateFireEvent(element,event){try{if(document.createEventObject){var evt=document.createEventObject();element.fireEvent('on'+event,evt)}else{var evt=document.createEvent('HTMLEvents');evt.initEvent(event,true,true);element.dispatchEvent(evt)}}catch(e){}}
function doGTranslate(lang_pair){if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])return;var teCombo;var sel=document.getElementsByTagName('select');for(var i=0;i<sel.length;i++)if(/goog-te-combo/.test(sel[i].className)){teCombo=sel[i];break;}if(document.getElementById('google_translate_element2')==null||document.getElementById('google_translate_element2').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0){setTimeout(function(){doGTranslate(lang_pair)},500)}else{teCombo.value=lang;GTranslateFireEvent(teCombo,'change');GTranslateFireEvent(teCombo,'change')}}
</script>

															
															
																		
									 					
									 			</li>
									</ul>
								</div>
								<!-- fim div.span6 -->
								</div> <!-- fim .row-fluid -->
								<div class="row-fluid"> 					<div id="logo" class="span8"> 						<!-- <div id="logo" class="span8 big"> <div id="logo" class="span8 small"> --> 						<a href="https://barreirinhas.ifma.edu.br" title="Descrição do Portal Padrão"> <span class="portal-title-1">IFMA</span> 							<h1 class="portal-title corto">Instituto Federal do Maranhão </h1> 																							<span class="portal-description" style="text-transform: none;">Campus Barreirinhas</span> 						</a> 					</div> 					<!-- fim .span8 --> 					<div class="span4"> 						<div id="portal-searchbox" class="row"> 								<!-- search -->
<form action="https://barreirinhas.ifma.edu.br" method="get" class="search pull-right" role="search">
	<fieldset>
		<legend class="hide">Busca</legend>
		<h2 class="hidden">Buscar no portal</h2>
	</fieldset>
</form>
<!-- /search -->
</div> 						<!-- fim div#portal-searchbox.row -->
</div><!-- fim .span4 -->
</div><!-- fim .row-fluid -->
</div><!-- fim div.container -->
<div class="sobre">
    <div class="container">
        <nav class="menu-servicos pull-right">
            <ul class="pull-right">
                <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23970" style="border-left: 1px solid #1c5d27;  padding: 0 10px; line-height: 1em;   margin-left: 10px;">
                    <span></span>
                </li>
            </ul>
        </nav>
        <nav class="menu-servicos pull-right">
            <h2 class="hide">Serviços</h2>
            <ul class="pull-right">
                <li id="menu-item-55634" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-55634"><span><a href="https://portal.ifma.edu.br/seletivo-unificado/">Seletivo Unificado</a></span></li>
                <li id="menu-item-44385" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44385"><span><a target="_blank" rel="noopener noreferrer" href="https://portal.ifma.edu.br/concursos-e-seletivos/?id=13742">Sisu</a></span></li>
                <li id="menu-item-41082" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-41082"><span><a href="https://portal.ifma.edu.br/contatos/">Contatos</a></span></li>
                <li id="menu-item-44451" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44451"><span><a href="https://portal.ifma.edu.br/comunicacao/">Imprensa</a></span></li>
                <li id="menu-item-24168" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24168"><span><a target="_blank" rel="noopener noreferrer" href="https://portal.ifma.edu.br/ouvidoria/">Ouvidoria</a></span></li>
                <li id="menu-item-24467" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-24467"><span><a target="_blank" rel="noopener noreferrer" href="https://portal.ifma.edu.br/perguntas-frequentes/">Perguntas frequentes</a></span></li>
            </ul>
            <span class="hide">Fim do menu de serviços</span>
        </nav><!-- fim #menu-servicos.pull-right -->
    </div><!-- .container -->
</div><!-- fim .sobre -->
</header>
<br>
