<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != '' ? $_POST['id'] : NULL;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?)');
    $stmtemploye = $pdo->prepare('INSERT INTO accounts VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $name, $email, $phone, $password, $created]);
    $stmtemploye->execute([$id, $name, $password, $email]);
    $msg = 'Created Successfully!';
    header('Location: read.php');
}
?>
<?=template_header('Create')?>
<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="name">Name</label>
        <input type="text" name="id" placeholder="" value="auto" id="id">
        <input type="text" name="name" placeholder="full name" id="name">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="email" placeholder="email" id="email">
        <input type="text" name="phone" placeholder="phone" id="phone">
        <label for="password">password</label>
        <label for="created">Created</label>
        <input type="password" name="password" placeholder="password" id="password">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="submit" value="Create">
        <a href="read.php" class="retour">retour</a>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
<?=template_footer()?>