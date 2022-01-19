<?php
session_start();
session_destroy();
header("Location: /vg/FORUM/index.php");
?>