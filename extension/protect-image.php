<?
###############################################################################################
#  IMPORTA A CONEXÃO DA BASE DE DADOS
###############################################################################################
	include('./functions.php');
###############################################################################################
#  PATH RELATIVO AS IMAGENS
###############################################################################################
	$CODE_IMG	=	str_replace(".protect","",basename($_SERVER['REQUEST_URI']));

###############################################################################################
#  PESQUISA REGISTROS COM O TOKEN DA URL E CRIADO EM MENOS DE 3 SEGUNDOS 
###############################################################################################
	$consulta	=	mysqli_query($mysqli,'SELECT * FROM arquivos WHERE chave_de_acesso="'.$CODE_IMG.'" AND (now < expire )') or trigger_error(mysqli_error($mysqli));
	$resutlado	=	mysqli_fetch_assoc($consulta);
	$_num_rows 	=	mysqli_num_rows($consulta);

###############################################################################################
#  PESQUISA REGISTROS COM O TOKEN DA URL E CRIADO EM MENOS DE 3 SEGUNDOS 
###############################################################################################
	if($_num_rows==1){
		$consulta=mysqli_query($mysqli,'DELETE FROM arquivos WHERE chave_de_acesso="'.$CODE_IMG.'" OR (now > expire)') or trigger_error(mysqli_error($mysqli));
		header('Content-type:image/jpg');
		readfile($resutlado['link_arquivo']);
	}else{
		mysqli_query($mysqli,'DELETE FROM arquivos WHERE chave_de_acesso="'.$CODE_IMG.'" OR (now > expire)') or trigger_error(mysqli_error($mysqli));
		echo "Invalid access";

	}
	exit;
?>