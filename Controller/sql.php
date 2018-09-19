<?php
/* esta função fica responsavel em realizar a conexão no banco de dados*/
	function conectar(){
		/* os parametros correspiondentes ao conect do banco de dados*/
		$host="127.0.0.1";

		//user do DB
		$user="root";
		
		//
		$password="";
		
		//
		$database="";

/*o con fica responsavel por aramzenar o host o nome do usuario sua senha do banco de dados e o nome do banco de dados*/
		$con = mysqli_connect($host,$user,$password,$dattabase);
		/*	if(!$con)
				print('erro ao conectar');
			else
				print('connectado');
		*/
			return $con;
		}
/*esta função fica responsavel em executar o que passado como parametro no bancode dados junto dele a conexão estabelecida e o comando que sera feito no banco de dados*/
	function execsql($query,$con){
			$result=mysqli_query($con,$query);
	  		if (!$result) {
	    		$message  = 'Invalid query: ' . mysqli_error($con) . "\n";
	    		$message .= 'Whole query: ' . $query;
	    		die($message);
	    	}
	    	return $result;
		}  	
