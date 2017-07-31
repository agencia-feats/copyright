<?
	###############################################################################################
	#  IMPORTA A CONEXÃO DA BASE DE DADOS
	###############################################################################################
	include('./functions.php');
?>

<script>
	<?
	/* IMPORTAMOS O JAVASCRIPT DO GITHUB DE PROTEÇÃO AS IMAGENS*/
	echo file_get_contents('https://raw.githubusercontent.com/websheep/copyright/master/extension/protectCode.js');
	?>
</script>

<img src="/protect-img/<?=setTokenRest("images/images.jpg")?>">
