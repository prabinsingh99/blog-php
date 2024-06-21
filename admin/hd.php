<?php include('../navbar.php') ?>
<h2>Hello</h2>
<?php
    session_start();
    if (isset($_SESSION['user_data'])){
        echo $_SESSION['user_data']['0'];
        echo $_SESSION['user_data']['1'];
        echo $_SESSION['user_data']['2'];
    }
?>