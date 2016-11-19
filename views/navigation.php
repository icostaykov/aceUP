<?php
include 'functions/navigation_func.php';
session_start();

?> 
<nav class="navbar navbar-default navbar-fixed-top" role="menu">
  <div class="container">
    <a href="index.php" class="navbar-brand logo" title="logo"><img src="images/layout/aceupLogo-02.png" alt="logo"/></a>
    <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-1" id="nav-icon" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>        
            </div>
         <div class="collapse navbar-collapse" id="collapse-1">
            <ul class="nav navbar-nav navbar-left top-nav">
               <li><a href="challenges.php">Challenges</a></li>
                <li><a href="rivals.php"></a>Rivals</li>
                <li><a href="rates.php">Rates</a></li>
                <li><a href="accessories.php">Accessories</a></li>
                <li><a href="help.php">Help</a></li>
            </ul>
           <!-- END of top-nav-->
            <ul class="nav navbar-nav navbar-right">
               <?php if (isset($_SESSION['usr_id'])) { ?>
                          <li><p class="navbar-text">Welcome <?php echo $_SESSION['usr_name']; ?></p></li>
                          <li><a href="logout.php">Log Out</a></li>
                  <?php 
                          } 
                          else { ?>
                          <li ><a href="login.php" >Login</a></li>
                          <li ><a href="register.php" >Sign Up</a></li>
                            
                  <?php } 
                  ?>
            </ul>
          <!-- END of navbar-right-->
      </div>
    </div>
  </div>
</nav>