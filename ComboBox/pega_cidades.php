<?php 
	$conexao = new PDO("mysql:host=localhost;dbname=bd","root","");
	$conexao->exec('SET CHARACTER SET utf8');

$pegaCidades = $conexao->prepare("SELECT * FROM cidades WHERE estados_id='".$_POST['id']."'");
$pegaCidades->execute();

		$fetchAll = $pegaCidades->fetchAll();
		
		foreach($fetchAll as $cidades)
		{
			echo '<option>'.$cidades['nome'].'</option>';
			
		}