<nav>
    <ul>
        <li><a href="/user/index.php?action=search" title='Find an item'><span class="icon-search">s</span><span class="caption" id="caption-search"></span></a>  
        <?php if($_SESSION['admin'] == 1){
        echo '<li><a href="/user/index.php?action=addItemView" title="Add Inventory to Database"><span class="icon-addInventory">i</span><span class="caption" id="caption-addInventory"></span></a>';
        echo '<li><a href="/user/index.php?action=users" title="Access User Information"><span class="icon-users">u</span><span class="caption" id="caption-users"></span></a>';
        echo '<li><a href="/user/index.php?action=viewCode" title="Site PHP Code"><span class="icon-viewCode">c</span><span class="caption" id="caption-viewCode"></span></a>';
        }
        ?> 
    </ul>                 
</nav> 