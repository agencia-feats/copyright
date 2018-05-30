<noscript>
	<!-- 
		podemos utilizar a tag http-equiv="refresh" e redirecionar o usuário para outra página  
		porém essa função pode ser cancelada no IE 
		<meta http-equiv="refresh" content="0.0;url=/arquivo_sem_javascript.html">
		Então caso realmente seja cancelada no IE, criamos uma DIV tapando tudo, isso dificultará mais ainda o usuário    
	-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">
	<style type="text/css">
		#tapatudo{
			font-family: 'Open Sans Condensed', sans-serif;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: #FF0;
			z-index: 9999;
		}
		#tapatudo .content{
			vertical-align: middle;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			font-size: 40px;
			font-weight: 700;
			text-align: center;
		}
	</style> 
	<div id="tapatudo">
		<div class="content">
			ATENÇÃO!<br> ATIVE O JAVASCRIPT DO SEU BROWSER PARA NAVEGAR
		</div>
	</div>
</noscript>


<? include('./functions.php'); ?>
<script src="./extension/protect-code.js"></script>

<img src="<?=img("./images/images.jpg")?>">
