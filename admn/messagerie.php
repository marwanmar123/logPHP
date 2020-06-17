<?php 
include 'functions.php';
$pdo = pdo_connect_mysql();
$query = "SELECT * FROM demande INNER JOIN contacts ON demande.id_user = contacts.id";
$d = $pdo->query($query);





?>
<?=template_header('')?>
<table>
    <tr>
        <th>id</th>
        <th>demande type</th>
        <th>name</th>
        <th>email</th>
        <th>created</th>
        <th>decription</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach($d as $data)
    {
    ?>
    <form action="functions.php" method = "POST">
    <tr>
        
        <td><label for=""> <?= $data['id_demande'] ?></label><input hidden type="text" name="acceid"
            value="<?= $data['id_demande'] ?>" id=""></td>
        <td><?php echo $data['dmndtype'] ?></td>
        <td><?php echo $data['name'] ?></td>
        <td><?php echo $data['email'] ?></td>
        <td><?php echo $data['created'] ?></td>
        <td><?php echo $data['description'] ?></td>
        <td><input type="submit" value="accept" name ="accepter"></td>
        <td><input type="submit" value="refuse" name ="refuser"></td>
    </form>
        <?php
}
?>
</table>
<br>
<a href="homadmn.php" class="retour">retour</a>