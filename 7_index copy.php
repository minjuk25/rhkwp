<?php
session_start();
if(!isset($_SESSION['id'])) {
    echo "<script>location.replace('7_login.php');</script>";            
}

else {
    $id = $_SESSION['id'];
    $nicname = $_SESSION['nicname'];
} 
?>
<body>
    <div class="base">
        <h2><?php echo "Hi, $id($nicname)";?></h2>
        <button type="button" class="btn" onclick="location.href='7_logout.php'">
            LOGOUT
        </button>
    </div>
</body>