<?php session_start(); ?>
<div>

<div class="grid"> 
    <div class="whole">
        <nav>
            <ul>
                <?php if($_SESSION['loggedin'] == false){
                    echo '<li><a href="/user/index.php?action=gotoLogin">
                    <span class="icon-login">H</span><span class="caption" id="caption-login"></span></a>
                <li><a href="/user/index.php?action=gotoRegister">
                    <span class="icon-register">H</span><span class="caption" id="caption-register"></span></a>';
                }else{
                    echo'<li><a href="/user/index.php?action=gotoLogin">
                    <span class="icon-logout">B</span><span class="caption" id="caption-logout"></span></a>';
                    echo '<li><h1>Welcome ' . $_SESSION['firstName'] . '</h1>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>
    
<div class="grid"> 
    <div class="one-quarter">
        <a href="index.php" title="Go to home page"><img src='/photo/logo.png' alt='Ammon-dbs'></a>
    </div>
</div>
                    
 <nav>
    <div class="grid"> 
    <ul>
        <li><a href="/index.php"><span class="icon-home">H</span><span class="caption" id="caption-home"></span></a>
        <li><a href="/about/index.php"><span class="icon-about">I</span><span class="caption" id="caption-about"></span></a>   
        <li><a href="/vision/index.php"><span class="icon-vision">E</span><span class="caption" id="caption-vision"></span></a>   
        <li><a href="/database/index.php"><span class="icon-database">D</span><span class="caption" id="caption-database"></span></a>   
        <li><a href="/technology/index.php"><span class="icon-technology">B</span><span class="caption" id="caption-technology"></span></a>
        <li><a href="/contact/index.php"><span class="icon-contact">P</span><span class="caption" id="caption-contact"></span></a>    
    </ul>
    </div>    
 </nav>
</div>
