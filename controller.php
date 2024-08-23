<?php
require_once 'DAO.php';
session_start();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($action === 'doPost') {
        $prosek = isset($_POST['prosek']) ? test_input($_POST['prosek']) : 0;
        if (!empty($prosek)) {
            $dao = new DAO();
            $studenti = $dao->boljiOD($prosek);
            $_SESSION['studenti'] = $studenti;
            include 'prikaz.php';
        } else {
            $msg = "Unesite prosek.";
            include 'index.php';
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
    if ($action === 'logout') {
        session_unset();
        session_destroy();
        include 'index.php';
    } else {
        header("Location: index.php");
        die();
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
