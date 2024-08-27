<?php
session_start();
$title = 'Oops';
ob_start(); /*start buffering the output*/

?>
<div class="div404">
    <h1 class="h1404">404</h1>
    <p class="p404">Sorry, the page you are looking for does not exist.</p>
    <p class="p404"><a  class="a404" href="Home">Go back to the homepage</a></p>
</div>
<?php
$content = ob_get_clean(); /*captured in the buffer and the buffer is cleared.*/
include '../app/view/layouts/master.php';
?>