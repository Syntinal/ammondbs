<nav>
    <ul>
        <?php if($_SESSION['admin'] == 1)
        echo '<li><a href="/user/index.php?action=users"><span class="icon-users">B</span><span class="caption" id="caption-users"></span></a>';
        ?>
        <li><a href="/user/index.php?action=search"><span class="icon-search">T</span><span class="caption" id="caption-search"></span></a>
        <li><a href="/user/index.php?action=gotoItem"><span class="icon-home">Z</span><span class="caption" id="caption-gotoItem"></span></a>           
    </ul>                 
</nav> 