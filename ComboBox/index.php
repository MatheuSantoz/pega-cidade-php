<html>
<head>
	<title>Combo</title>
	<meta charset="UTF-8"/>
	<script type="text/javascript" src="jquery.js"></script>
	<?php
		$conexao = new PDO("mysql:host=localhost;dbname=bd","root","");
		$conexao->exec('SET CHARACTER SET utf8');	
	?>
</head>

<body>
	<select name="estados" id="estados">
		<?php
			$select = $conexao->prepare("SELECT * FROM estados ORDER BY nome ASC");
			$select->execute();
			$fetchAll = $select->fetchAll();
			foreach($fetchAll as $estados)
			{
				echo '<option value="'.$estados['id'].'">'.$estados['nome'].'</option>';
			}
		?>
	</select>
	<select id="cidades" style="display:none"></select>
</body>
</html>
<script>
$("#estados").on("change",function(){
		
		$.ajax({
			url: 'pega_cidades.php',
			type: 'POST',
			data:{id:$("#estados").val()},
			beforeSend: function(){
				$("#cidades").css({'display':'block'});
				$("#cidades").html("Carregando...");
			},
			success: function(data)
			{
				$("#cidades").css({'display':'block'});
				$("#cidades").html(data);
			},
			error: function(data)
			{
				$("#cidades").css({'display':'block'});
				$("#cidades").html("Houve um erro ao carregar");
			}
		});
});
</script>





