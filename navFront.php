<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");

?>

<section id="sidebar"> 
    <div class="white-label">
    </div> 
    <div id="sidebar-nav">   
        <ul>
            <li<?php if ($activePage == 'frontPage'){ echo ' class="active"'; }?>><a href="frontPage.php"><i class="fa fa-home"></i>Search school by attribute</a></li>
            <li<?php if ($activePage == 'zoneFrontPage'){ echo ' class="active"'; }?>><a href="zoneFrontPage.php"><i class="fa fa-theater-masks"></i>Search school by area</a></li>
            <li<?php if ($activePage == 'nameFrontPage'){ echo ' class="active"'; }?>><a href="nameFrontPage.php"><i class="fas fa-school"></i> Search school by name</a></li>
            <li<?php if ($activePage == 'Login'){ echo ' class="active"'; }?>><a href="login.php"><i class="fa fa-sign-in-alt"></i> Login</a></li>
        </ul>
    </div>
</section>