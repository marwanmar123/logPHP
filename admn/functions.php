<?php


function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'congé';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	exit('Failed to connect to database!');
    }
}

function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link rel="stylesheet"  href="styl.css"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
			<h1>Congé</h1>
            <a href="logout.php"></i>logout</a>
    	</div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}

if(!empty($_POST['accepter'])){
	$pdo = pdo_connect_mysql();
    $query = "UPDATE demande SET operation = ? WHERE id_demande = ?"; 
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST['accepter'], $_POST['acceid']]);
	header('location: homadmn.php');
}else if(!empty($_POST['refuser'])){
	$pdo = pdo_connect_mysql();
	$query = "UPDATE demande SET operation = ? WHERE id_demande = ?"; 
    $stmt = $pdo->prepare($query);
	$ref = $stmt->execute([$_POST['refuser'], $_POST['acceid']]);
	
	header('location: homadmn.php');
}
?>