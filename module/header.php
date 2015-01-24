<?php
    if (!isset($_SESSION)){
        session_start();
    }
    if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time()) {
        $_SESSION['loggedin'] = FALSE;
        $_SESSION['firstName'] = null;
        $_SESSION['userID'] = null;
        $_SESSION['admin'] = false;
        $_SESSION['EXPIRES'] = null;
}else{
        $_SESSION['EXPIRES'] = time() + 600;
    }
?>
<div>
<div class="grid"> 
    <div class="whole">
        <nav>
            <ul>
                <?php if($_SESSION['loggedin'] == false){
                    echo '<li><a href="/user/index.php?action=gotoLogin" title="Click to Login">
                    <span class="icon-login">e</span><span class="caption" id="caption-login"></span></a>
                <li><a href="/user/index.php?action=gotoRegister" title="Click to Register">
                    <span class="icon-register">F</span><span class="caption" id="caption-register"></span></a>';
                }else{
                    echo'<li><a href="/user/index.php?action=logOut" title="Click to Logout">
                    <span class="icon-logout">M</span><span class="caption" id="caption-logout"></span></a>';
                    echo'<li><a href="/user/index.php?action=contentHome" title="Click for content home">
                    <span class="icon-account">m</span><span class="caption" id="caption-account"></span></a>';
                    echo '<li><h1>Welcome ' . $_SESSION['firstName'] . '</h1>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>
    
<div class="grid"> 
    <div class="one-quarter">
        <a href="/index.php" title="Go to home page"><img src='/photo/logo.png' alt='Ammon-dbs'></a>
    </div>
</div>
                    
 <nav>
    <div class="grid"> 
    <ul>
        <li><a href="/index.php" title='Click for Home Page'><span class="icon-home">H</span><span class="caption" id="caption-home"></span></a>
        <li><a href="/about/index.php" title='Information about Ammon-DBS'><span class="icon-about">I</span><span class="caption" id="caption-about"></span></a>   
        <li><a href="/vision/index.php" title='See what is possible with Ammon-DBS'><span class="icon-vision">E</span><span class="caption" id="caption-vision"></span></a>   
        <li><a href="/database/index.php" title='Information Storage'><span class="icon-database">D</span><span class="caption" id="caption-database"></span></a>   
        <li><a href="/technology/index.php" title='Latest Tech in inventory control'><span class="icon-technology">B</span><span class="caption" id="caption-technology"></span></a>
        <li><a href="/contact/index.php" title='Want more information?'><span class="icon-contact">P</span><span class="caption" id="caption-contact"></span></a>    
    </ul>
    </div>    
 </nav> 
</div>
