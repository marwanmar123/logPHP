<?php
session_start();
include 'functions.php';

?>



<?=template_header('')?>

<div class="homadmn">
<p class="retour">bonjour <?=$_SESSION["username"]?></p>
<a class="retour" href="demande.php">demande congé</a>
<a class="retour" href="message.php">messagerie</a>
</div>

<?=template_footer()?>