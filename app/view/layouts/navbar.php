
<div id="navbar">
    <a href="javascript:void(0);" class="icon" onclick="OpenNav()">
        <i class="fa fa-bars"></i>
    </a>
    <a href="Home" class="active"><img alt="TaskyLogo" src="public/assets/img/logotaskywhite.png" width="80px" align="left" ></a>
    <div id="myLinks">
    <!-- <img src="public/assets/img/avatar.png" alt="Avatar" class="avatar" " align="right"> -->
    <a href="Dashbord">Dashbord</a>
    <a href="MyProject">My Project</a>
    </div>
    <div class="dropdown" >
    
    <button  class="dropbtn" ><div class="avatar" onclick="droping()"><?php echo substr($_SESSION['email'], 0, 2);?></div></button>
    <div id="myDropdown" class="dropdown-content">
        <div class="email" ><?php echo $_SESSION['email'];?> </div>
        
        <a href="app/controllers/logout.php">Log out</a>
    </div>
    </div>
    
</div>



