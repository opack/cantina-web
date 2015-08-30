<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
		<!-- Optional theme <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">-->
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Styles supplémentaires -->
		<link href="cantina.css" rel="stylesheet" />
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
		<title>Cantina Web</title>
	</head>
	<body>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!-- Latest compiled and minified Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" ></script>
		<!-- Fonctions utilisées pour les calculs -->
		<script src="cantina.js"></script>
		<!-- Initialisation de la page -->
		<script lang="javascript">
			$(document).ready(function(){		
				// Au chargement de la page, on lit le solde actuel
				if (localStorageAvailable) {
					$("#txt-current-balance").val(localStorage.getItem("balance"));
				}
				$("#txt-current-balance").disabled = !localStorageAvailable;
				
				// Boutons de saisie du prix
				for (var price = 0; price < 10; price ++) {
					$("#btn-price-" + price).click(function(){
						addDigit(parseInt($(this).text()));
					});
				}
				$("#btn-price-dot").click(function(){
					addDigit(".");
				});
				
				// Bouton de validation ou annulation du prix saisi
				$("#btn-add-price").click(function(){
					addPrice();
				});
				$("#btn-clear-price").click(function(){
					clearPrice();
				});
				
				// Attachement du code permettant de simuler et payer
				$("#btn-pay").click(pay);
				
				// Activation des popovers, notamment pour les résultats
				$('[data-toggle="popover"]').popover();
				
				// Mise à jour de l'IHM
				updateDisabledStates();
			});
		</script>
		
		<div class="container">
			<!-- Barre de navigation-->
			<!--<nav class="nav navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Cantina</a>
					</div>
					<ul class="nav navbar-nav">
						<li role="presentation" class="active"><a data-toggle="tab" href="#div-bill">Ticket</a> </li>
						<li role="presentation"><a  data-toggle="tab" href="#div-parameters">Paramètres</a> </li>
					</ul>
				</div>
			</nav>-->
			<!--<nav class="nav navbar-default navbar-fixed-top">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<i class="fa fa-bars"></i> Menu
				</button>
				<div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						
					</ul>
				</div>
			</nav>-->
			
			<nav class="nav navbar-default">
				<div class="container-fluid">
					<span class="navbar-brand" >Cantina</span>
					<ul class="nav nav-pills">
						<li role="presentation" class="active"><a data-toggle="tab" href="#div-bill">Ticket</a> </li>
						<li role="presentation"><a data-toggle="tab" href="#div-parameters">Paramètres</a> </li>
					</ul>
				</div>
			</nav>
					
			<!--<ul class="nav nav-pills">
				<li role="presentation" class="active"><a data-toggle="tab" href="#div-bill">Ticket</a> </li>
				<li role="presentation"><a  data-toggle="tab" href="#div-parameters">Paramètres</a> </li>
			</ul>-->
		
			<div class="tab-content">
				<div style="height: 1em">
					<!-- Permet d'écarter le contenu des onglets -->
				</div>
				
				<div id="div-bill" class="tab-pane fade in active">
					<?php include("bill.php"); ?>
				</div>

				<div id="div-parameters" class="tab-pane fade">	
					<?php include("parameters.php"); ?>
				</div>
			</div>
		</div>
	</body>
</html>