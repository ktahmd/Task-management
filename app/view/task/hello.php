
<?php
$title = 'Nom Project';
ob_start(); /*start buffering the output*/
?> 
<span style="font-size:30px;cursor:pointer" onclick="openModa()">&#9776; open</span>
<button class="btn default" onclick="openModa()">New Project</button>

<div id="moda" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeModa()">&times;</a>
    <div class="overlay-content">
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>
</div>



    <?php
$content = ob_get_clean(); /*captured in the buffer and the buffer is cleared.*/
include '../layouts/master.php';
?>

