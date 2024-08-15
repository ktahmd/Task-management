<?php
$title = 'My Projects';
ob_start(); /*start buffering the output*/
?>




<?php
$content = ob_get_clean(); /*captured in the buffer and the buffer is cleared.*/
include '../layouts/master.php';
?>