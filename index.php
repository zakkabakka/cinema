<?php 
//afficher les error
error_reporting(E_ALL);
ini_set('display_errors', 1);
// connection a la bese de donnée
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>CinemaTme</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 </head>
 <body>
 	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CinemaTime</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


	<div id="film">
		<?php 
			$req = $bdd->prepare('SELECT id_film, titre, date_film FROM film');
    		$req->execute();
    		$billets = $req->fetchAll();
			//var_dump($billets);

		 ?>
		 <div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Les film d'aujourd'hui</div>

		  <!-- Table -->
		  <table class="table">
		   		<tr>
		   			<td class="td_titre">numer de films</td>
	 	 			<td class="td_titre">titre du film</td>
	 	 			<td class="td_titre">date de sorti</td>
		    	</tr>
		 	
		    <?php
		    	foreach ($billets as $key => $value) {
		    		
		    	echo "<tr><td>".$value['id_film']."</td>";
				echo "<td>".$value['titre']."</td>";
				echo "<td>".$value['date_film']."</td></tr>";
					
		    	}
		     ?>
		  </table>
</div>
	</div>



 </body>
 </html>