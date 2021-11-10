<?php 

	if (isset($_GET["content"])) {
		$seccion = $_GET["content"];
	} else {
		$seccion = "pruebas";
	}	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Grid</title>

	<style>

		/** {
			margin: 0;
			padding: 0;
		}
		*/
		#contenedor > * {
			padding: 20px;			
			border-radius: 5px;
			box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
		}

		#contenedor > *:not(#contenido) {
			font-size: 24px;
		}

		#contenedor {
			width: 95%;
			min-height: 100vh;
			max-width: 1000px;
			margin: 10px auto;
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			grid-template-rows: 100px 70px 1fr 100px 100px;
			grid-template-areas: "header    header    header"
								 "nav       nav       nav"
								 "contenido contenido sidebar"								 
								 "widget-1  widget-2  sidebar"
								 "footer    footer    footer";
			grid-gap: 10px;
		}		

		#header {
			grid-area: header;
			color: white;
			background: purple;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		#menu-navegacion {
			grid-area: nav;
			background: gray;
			color: white;
			display: flex;
			align-items: center;
		}

		#contenedor #menu-navegacion ul {
			list-style: none;
			display: flex;
			justify-content: space-evenly;
			flex: 1;	
		}

		a {
			color: white;
			text-decoration: none;
		}

		.active {
			background: #595959;
			border-radius: 5px;
			padding: 5px;
		}
		
		#sidebar {
			grid-area: sidebar;
			color: white;
			background: orange;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		#contenido {
			grid-area: contenido;
		}

		#contenido p {
			text-align: justify;
		}

		#widget-1 {
			grid-area: widget-1;
			background: skyblue;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		#widget-2 {
			grid-area: widget-2;
			background: skyblue;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		#footer {
			grid-area: footer;
			background: purple;
			color: white;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		@media screen and (max-width: 900px) {

			 #contenedor {
			  	grid-template-columns: repeat(2, 1fr);
			  	grid-template-rows: 100px 70px 1fr 100px 100px 100px;
				grid-template-areas: "header    header"
									 "nav       nav"
									 "contenido contenido"									 
									 "sidebar   sidebar"
									 "widget-1  widget-2"
									 "footer    footer";
			}			
		}

		@media screen and (max-width: 600px) {

			 #contenedor {
			 	grid-template-rows: 100px 70px 1fr 100px 100px 100px;
				grid-template-areas: "header    header"
									 "nav       nav"
									 "contenido contenido"									 
									 "sidebar   sidebar"
									 "widget-1  widget-1"
									 "widget-2  widget-2"
									 "footer    footer";
			}
		}

		h2 {
			text-align: center;
		}

		form {
			width: 350px;
			margin: 0 auto;
		}

		form .campos{
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		form .campos:last-child {
			justify-content: right;
		}

		.campos {
			width: 100%;
			margin: 0 auto;
			padding: 10px 0;
		}

		span {
			width: 100px;
		}

		input[type=text], .form {
			padding: 5px;
			width: 65%;
		}

		input[type=submit] {
			padding: 5px;
		}

		#calculo-tiempo {
			width: 80%;
		}

		#calculo-tiempo div{
			display: flex;
			align-items: center;
			padding: 10px;
		}

		#calculo-tiempo div span{
			width: 170px;
		}

	</style>

</head>
<body>

<div id="contenedor">
	<header id="header">
		Nombre de la página
	</header>
	<nav id="menu-navegacion">
		<ul>
			<li>
				<a href="?content=pruebas" 
					<?php if ($seccion == "pruebas") { echo "class='active'"; } ?> 
				>Home</a>
			</li>
			<li>
				<a href="#">Item 2</a>
			</li>
			<li>
				<a href="?content=form" 
					<?php if ($seccion == "form") { echo "class='active'"; } ?> 
				>Regístrese aquí</a>
			</li>
		</ul>
	</nav>
	<aside id="sidebar">
		Sidebar
	</aside>
	<main id="contenido">

	<?php			
			
		switch ($seccion) {
			case "form":
				include("contenidos/formulario.php");
				break;			
			case "pruebas": 
				include("contenidos/pruebas.php");
				break;
			case "tiempito": 
				include("contenidos/tiempito.php");
				break;
			default:
				include("contenidos/pruebas.php");
		}	
	?>

	</main>
	<div id="widget-1">
		Widget 1
	</div>
	<div id="widget-2">
		Widget 2
	</div>
	<footer id="footer">
		Contacto
	</footer>
</div>

</body>
</html>