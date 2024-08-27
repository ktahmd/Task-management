<?php
session_start();
$title = 'Access Denied';
ob_start(); /*start buffering the output*/

?>

<div class="div404">
    <h1 class="h1404">403</h1>
    <p class="p404">Sorry, you do not have permission to access this page.</p>
    <p class="p404"><a class="a404" href="Home">Go back to the homepage</a></p>
</div>

<?php
$content = ob_get_clean(); /*captured in the buffer and the buffer is cleared.*/
include '../app/view/layouts/master.php';
?>