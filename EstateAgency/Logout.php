<?php
$_SESSION["u_email"] = "";
$_SESSION["u_permission"] = "";
$_SESSION["u_content"] = "";
header("Location: index.php?method=message&message=登出成功");
?>