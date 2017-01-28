<!DOCTYPE html>
	<html lang="pt_BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Dispensa Guard</title>

		<!-- load stylesheets -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400">   <!-- Google web font "Open Sans" -->
		<link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
		<link rel="stylesheet" href="css/templatemo-style.css">                                   <!-- Templatemo style -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> <!-- Font Awesome -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
		<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	    
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			  <![endif]-->

		<link rel="shortcut icon" href="/img/food.ico" >



		 <?php

	// php populate html table from mysql database

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$databaseName = "dispensa_guard";

	// connect to mysql
	$connect = mysqli_connect($hostname, $username, $password, $databaseName);

	// Query de contagem de produtos
	$queryTotal = "select count(*) as count from dispensa";
	$resultTotal = mysqli_query($connect, $queryTotal);
	$teste = mysqli_fetch_assoc($resultTotal);

	// mysql select query vencimento

		$query = "select * from dispensa where data_validade like '%18/10/2095%'";

		// result for method one
		$result1 = mysqli_query($connect, $query);

		// result for method two 
		$result2 = mysqli_query($connect, $query);

		$dataRow = "";

		while($row2 = mysqli_fetch_array($result2))
		{
			$dataRow = $dataRow."<tr><td>$row2[0]</td><td>$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td><td>$row2[4]</td></tr>";
		}


	// mysql select query geral

		$queryGeral = "select * from dispensa";

		// result for method one
		$result1Geral = mysqli_query($connect, $queryGeral);

		// result for method two 
		$result2Geral = mysqli_query($connect, $queryGeral);

		$dataRowGeral = "";

		while($row2Geral = mysqli_fetch_array($result2Geral))
		{
			$dataRowGeral = $dataRowGeral."<tr><td>$row2Geral[0]</td><td>$row2Geral[1]</td><td>$row2Geral[2]</td><td>$row2Geral[3]</td><td>$row2Geral[4]</td></tr>";
		}

	?>

	<script>
		$(document).ready(function(){
    	$('#tabelaTeste').dataTable();
	});
	</script>
	</head>

		<body>
            <div class="table-responsive">  
								<table id="tabelaTeste" class="display table">
								<thead>
										<tr>
										<th>Tag ID</th>
										<th>Nome</th>
										<th>Data de inserção</th>
										<th>Data de Vencimento</th>
										<th>Informação Nutricional</th>
										</tr>
										</thead>
									<?php while($row1 = mysqli_fetch_array($result1Geral)):;?>
																<tr>
																	<td><?php echo $row1[0];?></td>
																	<td><?php echo $row1[1];?></td>
																	<td><?php echo $row1[2];?></td>
																	<td><?php echo $row1[3];?></td>
																	<td><?php echo $row1[4];?></td>
																</tr>
																<?php endwhile;?>
								</table>
								</div>
		</body>
	</html>