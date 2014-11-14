<?php
    //Funções para facilitar a manutenção e despoluir o código das páginas
	
	// Função Para Gravar um registro. ###########################################
	
	function GravaRegistro($table, array $data) { // Recebe como parâmetros o nome da tabela($table), e um array($data) contendo os dados a serem gravados.
	    $data = Limpa($data); // função que tira todos os ' e espaços indesejados, a fim de proteger contra sql injection.
	    $campos = implode(', ', array_keys($data)); // Colocando os índices do array separados por vírgulas (nome, email, etc);	
		$valores = "'".implode("', '", $data)."'"; // colocando os valores do array com '' e separados por vírgula ('thiago' , 'thiago@b.com' , 'etc')
		$query = "INSERT INTO {$table} ( {$campos} ) VALUES ( {$valores} )"; // Ficará parecido com: INSERT INTO user (nome , email , etc) VALUES ('thiago' , 'thiago@b.com' , 'etc');
		Return ExecutaQuery($query); // retorna 
	}
	
	// ######################################################################
   
	// Função Para Ler registros. ###########################################

	function LerRegistro($table, $parametros, $campos = "*") { // por default ele lê todos os campos "*";

	}

?>
