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
		<link rel="stylesheet" href="css/bootstrap.css">                                      <!-- Bootstrap style -->
		<link rel="stylesheet" href="css/templatemo-style.css">                                   <!-- Templatemo style -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> <!-- Font Awesome -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
		<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
	    
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
			<div class="container tm-container">
				
				<div class="row navbar-row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 navbar-container">
						
						<a href="javascript:void(0)" class="navbar-brand" id="go-to-top">Dispensa Guard</a>
						
						<nav class="navbar navbar-full">
							
							<div class="collapse navbar-toggleable-md" id="tmNavbar">                            

								<ul class="nav navbar-nav">
									<li class="nav-item">
										<a class="nav-link" href="#tm-section-1">Home</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tm-section-2">Produtos</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tm-section-3">Editar</a>
									</li>
									
								</ul>

							</div>

						</nav>    
						
						<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
							&#9776;
						</button>
						
					</div>
				</div>
				
				
				<div class="tm-page-content">                
					
					<!-- #home -->
					<section id="tm-section-1" class="row tm-section">

						<div class="tm-white-curve-left col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-6">
							<div class="tm-white-curve-left-rec"></div>
							<div class="tm-white-curve-left-circle"></div>
							<div class="tm-white-curve-text">
								<h2 class="tm-section-header blue-text">Bem vindo a sua Dispensa</h2>
								<p>
									Você tem <?php echo $teste['count']; ?> Produtos na dispensa.
								</p>
								
									   
							</div>                        
						</div>

						<div class="tm-home-right col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-6">
							<h2 class="tm-section-header">Produtos com vencimento próximo</h2>
							<p class="thin-font"><div class="table-responsive"><table class="table">
		<thead>
				<tr>
				<th>Tag ID</th>
				<th>Nome</th>
				<th>Data de Vencimento</th>
				
				</tr>
				</thead>
			<?php while($row1 = mysqli_fetch_array($result1)):;?>
										<tr>
											<td align="center"><?php echo $row1[0];?></td>
											<td><?php echo $row1[1];?></td>
											<td><?php echo $row1[3];?></td>
											
										</tr>
										<?php endwhile;?>
		</table>
		</div>
		</div>
		</div>
	</p>
						</div>
						
					</section> <!-- #home -->

					<!-- #services -->
					<section id="tm-section-2" class="row tm-section">
						<div class="tm-flex-center col-xs-12 col-sm-6 col-md-6 col-lg-5 col-xl-6">
						    <p class="thin-font"><div id="table"><table class="table-stripped">
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
								</table></p>
								</div>
				
						</div>
						

						<div class="tm-white-curve-right col-xs-12 col-sm-6 col-md-6 col-lg-7 col-xl-6">
							
							<div class="tm-white-curve-right-circle"></div>
							<div class="tm-white-curve-right-rec"></div>
							
							<div class="tm-white-curve-text">
								<h2 class="tm-section-header red-text">Produtos</h2>
								<p>Na tabela ao lado você acompanha todos os produtos presentes na sua dispensa, para atualizar a lista basta clicar no botão Verificar.</p>
								<p><button type="submit" class="btn submit-btn">Verificar</button></p>    
							</div>
							
						</div>
					</section> <!-- #services -->

					<!-- #about -->
					<section id="tm-section-3" class="row tm-section">
						<div class="tm-white-curve-left col-xs-12 col-sm-6 col-md-6 col-lg-7 col-xl-6">
							<div class="tm-white-curve-left-rec">
								
							</div>
							<div class="tm-white-curve-left-circle">
								
							</div>
							<div class="tm-white-curve-text">
								<h2 class="tm-section-header gray-text">Editar</h2>
								<p class="thin-font">Aqui é possivel fazer a edição de todas as características dos produtos.</p>
								<p>Escolha a etiqueta referente ao produto que deseja editar.</p>    
							</div>
							
						</div>
						<div class="tm-flex-center col-xs-12 col-sm-6 col-md-6 col-lg-5 col-xl-6">
							<form action="index.html" method="post" class="contact-form">

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 col-xl-6 tm-contact-form-left">
									<div class="form-group">
										<input type="text" id="tag_id" name="tag_id" class="form-control" placeholder="Numero da Tag"  required/>
									</div>
									<div class="form-group">
										<input type="text" id="nome_produto" name="nome_produto" class="form-control" placeholder="Nome"  required/>
									</div>
									<div class="form-group">
										<input type="text" id="data_entrada" name="data_entrada" class="form-control" placeholder="Data de entrada"  required/>
									</div>
									
									<div class="form-group">
										<input type="text" id="data_validade" name="data_validade" class="form-control" placeholder="Data de validade"  required/>
									</div>
									
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 col-xl-6 tm-contact-form-right">
									<div class="form-group">
										<textarea id="informacao_nutricional" name="informacao_nutricional" class="form-control" rows="6" placeholder="Informação Nutricional"></textarea>
									</div>
									
									<button type="submit" class="btn submit-btn">Salvar</button>
								</div>

							</form>   
						</div>
					</section> <!-- #about -->

				   

					<!-- footer -->
					<footer class="row tm-footer">
						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

							<p class="text-xs-center tm-footer-text">Copyright &copy; 2016 Hugo Cardoso</p>
							
						</div>
						
					</footer>                      

				</div>
				 
			</div> <!-- .container -->
			
			<!-- load JS files -->
			
			<script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
			<script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script><!-- Tether for Bootstrap, http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h --> 
			<script src="js/bootstrap.min.js"></script>                 <!-- Bootstrap (http://v4-alpha.getbootstrap.com/) -->
			<script src="js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
			
			<!-- Templatemo scripts -->
			<script>     

			var bigNavbarHeight = 90;
			var smallNavbarHeight = 68;
			var navbarHeight = bigNavbarHeight;                 
		
			$(document).ready(function(){

				var topOffset = 180;

				$(window).scroll(function(){
				   
					if($(this).scrollTop() > topOffset) {
						$(".navbar-container").addClass("sticky");
					}
					else {
						$(".navbar-container").removeClass("sticky");
					}

				});

				/* Single page nav
				-----------------------------------------*/

				if($(window).width() < 992) {
					navbarHeight = smallNavbarHeight;
				}

				$('#tmNavbar').singlePageNav({
				   'currentClass' : "active",
					offset : navbarHeight
				});


				/* Collapse menu after click 
				   http://stackoverflow.com/questions/14203279/bootstrap-close-responsive-menu-on-click
				----------------------------------------------------------------------------------------*/

				$('#tmNavbar').on("click", "a", null, function () {
					$('#tmNavbar').collapse('hide');               
				});

				// Handle nav offset upon window resize
				$(window).resize(function(){
					if($(window).width() < 992) {
						navbarHeight = smallNavbarHeight;
					} else {
						navbarHeight = bigNavbarHeight;
					}

					$('#tmNavbar').singlePageNav({
						'currentClass' : "active",
						offset : navbarHeight
					});
				});
				

				/*  Scroll to top
					http://stackoverflow.com/questions/5580350/jquery-cross-browser-scroll-to-top-with-animation
				--------------------------------------------------------------------------------------------------*/
				$('#go-to-top').each(function(){
					$(this).click(function(){ 
						$('html,body').animate({ scrollTop: 0 }, 'slow');
						return false; 
					});
				});
				
			});
		
			</script>             

		</body>
		</html>