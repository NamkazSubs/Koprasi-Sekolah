<?php
session_start();
unset($_SESSION['username']);
$loginUrl = 'login.php';
print('<script> top.location.href=\'' . $loginUrl . '\'</script>');
?>
