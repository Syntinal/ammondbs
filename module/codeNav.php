<nav class='codeNav'>
    <ul>
        <?php if($_SESSION['admin'] == 1)
        echo '<li><a href="/user/index.php?action=modelCode" title="Inspect Model Code">MODEL</a>';
        echo '<li><a href="/user/index.php?action=viewCode" title="Inspect View Code">VIEW</a>';
        echo '<li><a href="/user/index.php?action=indexCode" title="Inspect Controller Code">CONTROLLER</a>';
        ?> 
    </ul>                 
</nav> 