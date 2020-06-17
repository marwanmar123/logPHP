<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM contacts WHERE id = ?');
            $stmtemploye = $pdo->prepare('DELETE FROM accounts WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $stmtemploye->execute([$_GET['id']]);
            $msg = 'You have deleted the contact! <br /><br /><a class="retour" href="read.php">retour</a>';
            
        } else {
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>
<?=template_header('Delete')?>
<div class="content delete">
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure #<?=$contact['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$contact['id']?>&confirm=yes">oui</a>
        <a href="delete.php?id=<?=$contact['id']?>&confirm=no">Non</a>
    </div>
    <?php endif; ?>
</div>
<?=template_footer()?>