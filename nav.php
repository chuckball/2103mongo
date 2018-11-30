<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");

?>

<section id="sidebar"> 
    <div class="white-label">
    </div> 
    <div id="sidebar-nav">   
        <ul>
            <!--<li<?php if ($activePage == 'dashboard'){ echo ' class="active"'; }?>><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>-->
            <li<?php if ($activePage == 'cca'){ echo ' class="active"'; }?>><a href="cca.php"><i class="fa fa-theater-masks"></i> CCA</a></li>
            <li<?php if ($activePage == 'moe'){ echo ' class="active"'; }?>><a href="moe.php"><i class="fa fa-clipboard-list"></i> MOE Programs</a></li>
            <li<?php if ($activePage == 'school'){ echo ' class="active"'; }?>><a href="school.php"><i class="fa fa-school"></i> School</a></li>
            <li<?php if ($activePage == 'train'){ echo ' class="active"'; }?>><a href="train.php"><i class="fa fa-subway"></i> Train Stations</a></li>
            <li<?php if ($activePage == 'specialNeeds'){ echo ' class="active"'; }?>><a href="specialNeeds.php"><i class="fas fa-wheelchair"></i> Special Needs</a></li>
            <li<?php if ($activePage == 'mongoDB'){ echo ' class="active"'; }?>><a href="#.php"><i class="fas fa-database"></i> MongoDB</a></li>
            <li<?php if ($activePage == 'doLogout'){ echo ' class="active"'; }?>><a href="doLogout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
</section>