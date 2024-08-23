<?php 
require_once 'DAO.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['studenti'])) {
    $studenti = $_SESSION['studenti'];

    include './partials/header.php'; 
?>
<div class="row" style="margin-left:1rem;">
    <div class="col-12">
        <?php if (!empty($studenti)) { ?>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Prosek</th>
            </tr>
            <?php foreach ($studenti as $student) { ?>
            <tr>
                <td><?= htmlspecialchars($student['id']) ?></td>
                <td><?= htmlspecialchars($student['ime']) ?></td>
                <td><?= htmlspecialchars($student['prezime']) ?></td>
                <td><?= htmlspecialchars($student['prosek']) ?></td>
            </tr>
            <?php } ?>
        </table>
        <?php } else { ?>
        <p>Nema studenata sa boljim prosekom.</p>
        <?php } ?>
        <a href="controller.php?action=logout">LOGOUT</a>
        <a href="./index.php">Index</a>
    </div>
</div>
<?php 
    include './partials/footer.php'; 
} else {
    header('Location:index.php'); 
}
?>
