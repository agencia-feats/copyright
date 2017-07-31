<?
###############################################################################################
#  IMPORTA A CONEXÃO DA BASE DE DADOS
###############################################################################################
	include('./../functions.php');
###############################################################################################
#  PATH RELATIVO AS IMAGENS
###############################################################################################
	$PATH_IMAGES = './..';
	$CODE_IMG	=	basename($_SERVER['REQUEST_URI']);

###############################################################################################
#  PESQUISA REGISTROS COM O TOKEN DA URL E CRIADO EM MENOS DE 3 SEGUNDOS 
###############################################################################################
	$consulta	=	mysqli_query($mysqli,'SELECT * FROM arquivos WHERE chave_de_acesso="'.$CODE_IMG.'" AND (expire IS NULL OR expire="0000-00-00" OR expire > now)') or trigger_error(mysqli_error($mysqli));
	$resutlado	=	mysqli_fetch_assoc($consulta);
	$_num_rows 	=	mysqli_num_rows($consulta);

###############################################################################################
#  PESQUISA REGISTROS COM O TOKEN DA URL E CRIADO EM MENOS DE 3 SEGUNDOS 
###############################################################################################
	if($_num_rows==1){
		$consulta=mysqli_query($mysqli,'DELETE FROM arquivos WHERE chave_de_acesso="'.$CODE_IMG.'" OR (expire > now)') or trigger_error(mysqli_error($mysqli));
		header('Content-type:image/jpg');
		readfile($PATH_IMAGES.'/'.$resutlado['link_arquivo']);
		exit;
	}else{
		mysqli_query($mysqli,'DELETE FROM arquivos WHERE chave_de_acesso="'.$CODE_IMG.'" OR (expire > now)') or trigger_error(mysqli_error($mysqli));
		echo "Acesso inválido!";

	}
	exit;
?>