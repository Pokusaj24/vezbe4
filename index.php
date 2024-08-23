<?php 
$msg = isset($msg) ? $msg : ""; 
include 'partials/header.php'; 
?>
<div class="container">
    <form action="controller.php" method="POST">
        <input type="hidden" name="action" value="doPost">    
        Prosek: <br> 
        <input type="number" step="0.01" name="prosek"><br><br>     
        <input type="submit" value="Prikaži Studente">
    </form>
    <?= $msg ?>
</div>
<?php 
include 'partials/footer.php'; 
?>
