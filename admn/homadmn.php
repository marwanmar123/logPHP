<?php
session_start();
include 'functions.php';

?>


<?=template_header('homadmn')?>

<div class="homadmn">
<a class="retour">bonjour <?=$_SESSION["username"]?></a> 
<a class="retour" href="read.php">account employe</a>
<a class="retour" href="messagerie.php">messagerie</a>
</div>



<?=template_footer()?>