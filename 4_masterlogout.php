<?php
session_start();
session_destroy();
?>
<script>
    alert("로그아웃하셨습니다.");
    location.replace('4_master.html');
</script>