<?
###############################################################################################
#  CONECTA AO BANCO
###############################################################################################
	$mysqli		=	mysqli_connect("db_server", "db_name", "db_pass", "db_user");
	mysqli_query($mysqli,'SET NAMES "utf8"'); 
	mysqli_query($mysqli,'SET character_set_connection=utf8'); 
	mysqli_query($mysqli,'SET character_set_client=utf8'); 
	mysqli_query($mysqli,'SET character_set_results=utf8');  
	mysqli_query($mysqli,'NO_ENGINE_SUBSTITUTION,STRICT_TRANS_TABLES');  
	if (mysqli_connect_errno()) {printf("FALHA DE CONEXÃO: %s\n", mysqli_connect_error());exit();}

###############################################################################################
#  FUNÇÃO QUE CRIA O TOKEN
###############################################################################################
	function _crypt(){	
		$CodeCru = @crypt(md5(rand(0,50)));
		$vowels = array("$","/", ".",'=');
		$onlyconsonants = str_replace($vowels, "", $CodeCru);
		return substr($onlyconsonants,1);
	}
###############################################################################################
#  FUNÇÃO QUE VERIFICA  O TOKEN DE ACESSO NA TABELA
###############################################################################################
	function _token(){
		global $mysqli;
		$tk 					=	_crypt();
		$consulta	=	mysqli_query($mysqli,'SELECT * FROM arquivos WHERE chave_de_acesso="'.$tk.'"') or trigger_error(mysqli_error($mysqli));
		$_num_rows 	=	mysqli_num_rows($consulta);
		if($_num_rows!=0){
			$tk = _crypt();
			_token();
		}else{
			return $tk;
		}
	}
###############################################################################################
#  FUNÇÃO QUE CRIA E RETORNA TOKEN DE ACESSO
###############################################################################################
	function img($FileURL=null, $timeout = "2 seconds") {
		global $mysqli;
		$Formats = array("seconds", "minutes", "hours", "days", "months", "years");
		if (is_string($timeout)) {
			if (strpos(trim($timeout), " ")) {
				$timeout = explode(' ', $timeout);
				if ((is_numeric($timeout[0]) || is_int($timeout[0])) && in_array($timeout[1], $Formats)) {
					$timeout = $timeout[0] . ' ' . $timeout[1];
				} else {
					die("Formatos aceitaveis: seconds, minutes, hours, days, months, years");
				}
			} else {
				if (is_numeric($timeout)) {
					$timeout = $timeout . ' seconds';
				} else {
					die("Formato de tempo não permitido");
				}
			}
		} else {
			die("Formato de tempo não permitido");
		}
		
		$now     		= date("Y-m-d H:i:s");
		$expire 		= date("Y-m-d H:i:s", strtotime('+' . $timeout, strtotime(date("Y-m-d H:i:s"))));
		$setTokenRest 	= _token();
		$consulta		=	mysqli_query($mysqli,'INSERT INTO arquivos (chave_de_acesso,link_arquivo,now,expire) VALUES ("'.$setTokenRest.'","'.$FileURL.'","'.$now.'","'.$expire.'")') or trigger_error(mysqli_error($mysqli));
		if ($consulta) {
			return 'protect-image.php?'.$setTokenRest;
		} else {
			return null;
		}
	}
