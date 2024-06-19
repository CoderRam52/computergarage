<?php include "../config/connection.php"; ?>

<?php
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM user_registration WHERE id=$id");




?>

<script type="text/javascript">
    window.location = "all_users.php";
    setTimeout(function() {
        window.location.href = window.location.href;
    }, 3000);
    
</script>

