<?
###############################################################################################
#  IMPORTA A CONEXÃO DA BASE DE DADOS
###############################################################################################
	include('./functions.php');

###############################################################################################
#  CÓDIGO DA IMAGEM
###############################################################################################
	$CODE_IMG	=	array_keys($_GET);

###############################################################################################
#  PESQUISA REGISTROS COM O TOKEN DA URL E CRIADO EM MENOS DE 3 SEGUNDOS 
###############################################################################################
	$consulta	=	mysqli_query($mysqli,'SELECT * FROM arquivos WHERE chave_de_acesso="'.$CODE_IMG[0].'" AND (NOW() < expire )') or trigger_error(mysqli_error($mysqli));
	$resutlado	=	mysqli_fetch_assoc($consulta);
	$_num_rows 	=	mysqli_num_rows($consulta);
	
###############################################################################################
#  CAPTAMOS O HTTP_ACCEPT PRA VERIFICAR SE A REQUISIÇÃO ESTA VINDO DIRETO DA TAG <img> 
###############################################################################################
	$SERVER_INFO = explode('/', $_SERVER['HTTP_ACCEPT']);


	if($_num_rows==1 && $SERVER_INFO[0]=='image'){
			###############################################################################################
			#  AGORA VERIFICA A EXTENSÃO E RETORNA O ARQUIVO 
			###############################################################################################
           $imgpath = $resutlado['link_arquivo'];
           $extencao = substr($imgpath,-3);
			if( $extencao=="jpg" ||  $extencao=="jpeg"){
				header('Content-Type: image/jpeg');
				$img = imagecreatefromjpeg($imgpath);
				imagejpeg($img);
			}
			if( $extencao=="png"){
				header('Content-Type: image/png');
				$img = imagecreatefrompng($imgpath);
				$background = imagecolorallocate($img, 0, 0, 0);
				imagecolortransparent($img, $background);
				imagealphablending($img, false);
				imagesavealpha($img, true);
				imagepng($img);
			}
			if( $extencao=="gif"){
				header('Content-Type: image/gif');
				$img = imagecreatefromgif($imgpath);
				$background = imagecolorallocate($img, 0, 0, 0);
				imagecolortransparent($img, $background);
				imagegif($img);
			}

		    imagedestroy($img);
	}else{
		echo "Invalid access";
	}

###############################################################################################
#  PESQUISA REGISTROS COM O TOKEN DA URL OU EXPIRADOS 
###############################################################################################
	mysqli_query($mysqli,'DELETE FROM arquivos WHERE chave_de_acesso="'.$CODE_IMG[0].'" OR (NOW() > expire) ') or trigger_error(mysqli_error($mysqli));
