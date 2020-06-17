<?php
  session_start();
  include 'functions.php';
  $pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != '' ? $_POST['id'] : NULL;
    $dmndtype = isset($_POST['dmndtype']) ? $_POST['dmndtype'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $stmt = $pdo->prepare('INSERT INTO demande VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $dmndtype, $name, $email, $created, $description, $_SESSION['user']['id'], 'waiting']);
    $msg = 'Created Successfully!';
    header('Location: homemplye.php');
}


?>


<?=template_header('')?>
<div class="content update">
	<h2>Create Contact</h2>
    <form action="demande.php" method="post">
    <label for="id">ID</label>
    <input type="text" name="id" placeholder="" value="auto" id="id">
        <select name="dmndtype" id="demande">
            <option value="">conge1</option>
            <option value="">conge2</option>
            <option value="">conge3</option>
        </select>
        
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="full name" id="name">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="email" id="email">
        <label for="created">Created</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <textarea id="textarea" name="description" length="500">message</textarea>
        <input type="submit" value="submit">
        <a href="homemplye.php" class="retour">retour</a>
    </form>
</div>
<?=template_footer()?>