<!DOCTYPE html>
<!--

    About Page

-->
<html>

    <head>

        <meta charset="UTF-8">

        <meta name="Description" content="About Ammon Database Solutions">

        <meta name="Keywords" content="manufacturing, inventory, database">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        

        <title>About</title>

        <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">

    </head>

    <body class="background">

        <div class="content"> 

        

    <header id='page_header'>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/header.php'; ?> 

    </header>

    <main>
    <?php if($action == 'gotoLogin') : ?>
      <div class="grid">
        <div class="whole">   
          <form method="post" action="." id="loginform">
            <ul>
                <li>
                    <h2>Login</h2>
                    <?php if($message){echo'<h3>' . $message . '</h3>';}?>
                </li>
                <li>
                    <label for="emailAddress">Email Address:</label>
                    <input type="email" name="emailAddress" placeholder="Enter Email Address" value="<?php echo $email ?>" id="emailAddress" required>
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter Password" id="password" required>
                </li>
                <li>
                    <button type="submit" name="action" id="action" value="login">login</button>
                </li>   
            </ul>
          </form>
       </div>
      </div>
      <?php elseif($action == 'gotoRegister') : ?>
      <div class="grid">
        <div class="whole">
           <form method="post" action="." id="registerform">
            <ul>
                <li>
                    <h2>Register</h2>
                    <?php echo'<h3>' . $message . '</h3>';?>
                </li>
                <li>
                    <label for="email">Email Address:</label>
                    <input type="email" name="email" placeholder="Enter Email Address" value="<?php echo $email ?>" id="email" required>
                </li>
                <li>
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" placeholder="Enter First Name" value="<?php echo $firstName ?>" id="firstName" required>
                </li>
                <li>
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" placeholder="Enter Last Name" value="<?php echo $lastName ?>" id="lastName" required>
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter Password" value="<?php echo $password ?>" id="password" required>
                </li>
                <li>
                    <button type="submit" name="action" id="action" value="register">Register</button>
                </li>   
            </ul>
          </form>
       </div>
      </div>
      <?php elseif($action == 'contentHome') : ?>
      <div class="grid">
        <div class="whole">
            <h2>Content HOME</h2>
            <?php if($message){echo'<h3>' . $message . '</h3>';}?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?> 


       </div>
      </div>
<!--  Users View   --> 
      <?php elseif($action == 'users') : ?>
      <div class="grid">
        <div class="whole">
            
            <h2>User View</h2>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>
            <?php if($message){echo'<h3>' . $message . '</h3>';}?>
            <table>         
                <?php
                    for($i = 0; $i < count($users); $i++){
                        echo '<tr>';
                            for($j = 0; $j < 5; $j++){
                                if($j < 4){
                                    echo '<td>' . $users[$i][$j] . '</td>';
                                }elseif($j == 4){
                                    echo '<td>' .'<a href="/user/index.php?action=gotoEditUser' . $users[$i][0] . '" title="Goto to Edit User">edit</a>' . '</td>';
                                } 
                            }
                        echo '</tr>';
                    }
                ?>
            </table>
       </div>
      </div>

<!--  Item Search Results View   -->
        <?php elseif($action == 'searchResults') : ?>
            <div class="grid">
              <div class="whole">

                  <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>
                      <form method="post" action="." id="search">
                          <ul>
                              <li>
                                  <h1>Inventory Search</h1>
                              </li>
                              <li>
                                  <label for="search">Search:</label>
                                  <input type="text" name="search" placeholder="Enter search term" id="search">
                                  <button type="submit" name="action" id="action" value="searchResults">search</button>
                                  <button type="submit" name="action" id="action" value="search">reset</button>
                              </li>
                          </ul>
                      </form>

                  <?php if($message){echo'<h2>' . $message . '</h2>';}?>

                  <table class="resultsTable"> 
                      <tr>
                          <td>SKU#</td>
                          <td>Description1</td>
                          <td>Description2</td>
                          <td>Description3</td>
                          <td>Part Number</td>
                          <td>Select</td>
                      </tr>
                      <?php
                          for($i = 0; $i < count($items); $i++){
                              echo '<tr>';
                                  for($j = 0; $j < 6; $j++){
                                      if($j < 5){
                                          echo '<td>' . $items[$i][$j] . '</td>';
                                      }elseif($j == 5){
                                          echo '<td>' .'<a href="/user/index.php?action=gotoItem' . $items[$i][0] . '" title="Goto Item View">view</a>' . '</td>';
                                      }
                                  }
                              echo '</tr>';
                          }
                      ?>
                  </table>
                 </div>
                </div>

<!--  Item View  -->
            <?php elseif($action == 'gotoItem') : ?>
            <div class='itemDisplay'>
                      <h2>item view</h2>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>
                <?php if($message){echo'<h3>' . $message . '</h3>';}?>
                <div class="grid">
                  <div class="unit whole">
                    <form method="post" action="." id="itemForm">
                        <?php if($_SESSION['admin'] == 1)
                            echo
                            '<ul>
                                <li>
                                    <button type="submit" name="action" id="action" value="editItem">Edit Item</button>                
                                </li>   
                            </ul>'
                        ?>
                        <ul>        
                        <div class="grid">
                        <div class="unit half">
                            <li>
                                <label for="userID">SKU #:</label>
                                <input type="text" name="skuNumber" value="<?php echo $itemData['skuNumber'] ?>" id="skuNumber" disabled>
                            </li>
                            <li>
                                <label for="partNumber">Part Number:</label>
                                <input type="text" name="partNumber" value="<?php echo $itemData['partNumber'] ?>" id="partNumber" disabled>
                            </li>
                            <li>
                                <label for="description1">Description1:</label>
                                <input type="text" name="description1" value="<?php echo $itemData['DESC1'] ?>" id="description1" disabled>
                            </li>
                            <li>
                                <label for="description2">Description2:</label>
                                <input type="text" name="description2" value="<?php echo $itemData['DESC2'] ?>" id="description2" disabled>
                            </li>
                            <li>
                                <label for="description3">Description3:</label>
                                <input type="text" name="description3" value="<?php echo $itemData['DESC3'] ?>" id="description3" disabled>
                            </li>
                            <li>
                                <label for="description4">Description4:</label>
                                <input type="text" name="description4" value="<?php echo $itemData['DESC4'] ?>" id="description4" disabled>
                            </li>
                            </div>
                        <div class="unit half">
                            <li>
                                <label for="inventoryUnit">Inventory Unit:</label>
                                <input type="text" name="inventoryUnit" value="<?php echo $itemData['UNIT'] ?>" id="inventoryUnit" disabled>
                            </li>
                            <li>
                                <label for="pricingUnit">Pricing Unit:</label>
                                <input type="text" name="pricingUnit" value="<?php echo $itemData['PUT'] ?>" id="pricingUnit" disabled>
                            </li>
                            <li>
                                <label for="standardCost">Standard Cost:</label>
                                <input type="text" name="standardCost" value="<?php echo $itemData['SCOST'] ?>" id="standardCost" disabled>
                            </li>
                            <li>
                                <label for="category">Category:</label>
                                <input type="text" name="category" value="<?php echo $itemData['CAT'] ?>" id="category" disabled>
                            </li>
                            <li>
                                <label for="quantityPicked">Quantity Picked:</label>
                                <input type="text" name="quantityPicked" value="<?php echo $itemData['QPK'] ?>" id="quantityPicked" disabled>
                            </li>
                            <li>
                                <label for="quantityOnHand">Quantity On Hand:</label>
                                <input type="text" name="quantityOnHand" value="<?php echo $itemData['QOH2'] ?>" id="quantityOnHand" disabled>
                            </li>
                        </div>
                        </div>
                        </ul>
                    </form>
                  </div>
                </div>
                      
                <?php 
                    $imageFile = $_SERVER['DOCUMENT_ROOT'] . '/image/' . $itemData['skuNumber'] . '.JPG';
                    if(file_exists($imageFile)){
                    echo '<img src=\'/image/' . $itemData['skuNumber'] . '.JPG\' alt=\'Ammon-dbs\'>'; 
                    }?>
            </div>
<!-- Goto Edit User -->  
           <?php elseif($action == 'editItem') : ?>
            <div class='itemDisplayEdit'>
                <h2>Edit Item</h2>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>
                <?php if($message){echo'<h3>' . $message . '</h3>';}?>
                <div class="grid">
                  <div class="unit whole">
                    <form method="post" action="." id="editItemForm">
                        <ul>
                            <li>
                                <button type="submit" name="action" id="action" value="updateItem">Update</button>
                                <button type="submit" name="action" id="action" value="deleteItem">Delete</button>
                                <button type="submit" name="action" id="action" value="search">Cancel</button>                    
                            </li>   
                        </ul>   
                        <ul>        
                        <div class="grid">
                        <div class="unit half">
                            <li>
                                <label for="userID">SKU #:</label>
                                <input type="text" name="skuNumber" value="<?php echo $itemData['skuNumber'] ?>" id="skuNumber">
                            </li>
                            <li>
                                <label for="partNumber">Part Number:</label>
                                <input type="text" name="partNumber" value="<?php echo $itemData['partNumber'] ?>" id="partNumber" >
                            </li>
                            <li>
                                <label for="description1">Description1:</label>
                                <input type="text" name="description1" value="<?php echo $itemData['DESC1'] ?>" id="description1" >
                            </li>
                            <li>
                                <label for="description2">Description2:</label>
                                <input type="text" name="description2" value="<?php echo $itemData['DESC2'] ?>" id="description2" >
                            </li>
                            <li>
                                <label for="description3">Description3:</label>
                                <input type="text" name="description3" value="<?php echo $itemData['DESC3'] ?>" id="description3" >
                            </li>
                            <li>
                                <label for="description4">Description4:</label>
                                <input type="text" name="description4" value="<?php echo $itemData['DESC4'] ?>" id="description4" >
                            </li>
                            </div>
                        <div class="unit half">
                            <li>
                                <label for="inventoryUnit">Inventory Unit:</label>
                                <input type="text" name="inventoryUnit" value="<?php echo $itemData['UNIT'] ?>" id="inventoryUnit" >
                            </li>
                            <li>
                                <label for="pricingUnit">Pricing Unit:</label>
                                <input type="text" name="pricingUnit" value="<?php echo $itemData['PUT'] ?>" id="pricingUnit" >
                            </li>
                            <li>
                                <label for="standardCost">Standard Cost:</label>
                                <input type="text" name="standardCost" value="<?php echo $itemData['SCOST'] ?>" id="standardCost" >
                            </li>
                            <li>
                                <label for="category">Category:</label>
                                <input type="text" name="category" value="<?php echo $itemData['CAT'] ?>" id="category" >
                            </li>
                            <li>
                                <label for="quantityPicked">Quantity Picked:</label>
                                <input type="text" name="quantityPicked" value="<?php echo $itemData['QPK'] ?>" id="quantityPicked" >
                            </li>
                            <li>
                                <label for="quantityOnHand">Quantity On Hand:</label>
                                <input type="text" name="quantityOnHand" value="<?php echo $itemData['QOH2'] ?>" id="quantityOnHand" >
                            </li>
                        </div>
                        </div>
                        </ul>
                    </form>
                  </div>
                </div>
            </div>
<!-- Goto Edit User -->                      
           <?php elseif($action == 'gotoEditUser') : ?>
           <div class="grid">
             <div class="whole">

            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>
          <form method="post" action="." id="registerform">
            <ul>
                <li>
                    <h2>Edit User</h2>
                    <?php if($message){echo'<h3>' . $message . '</h3>';}?>
                </li>
                <li>
                    <label for="userID">User ID:</label>
                    <input type="text" name="userID" value="<?php echo $userData['userID'] ?>" id="userID" required>
                </li>
                <li>
                    <label for="email">Email Address:</label>
                    <input type="email" name="email" value="<?php echo $userData['email'] ?>" id="email" required>
                </li>
                <li>
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" value="<?php echo $userData['firstName'] ?>" id="firstName" required>
                </li>
                <li>
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" value="<?php echo $userData['lastName'] ?>" id="lastName" required>
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" value="**************" id="password" required>
                </li>
                <li>
                    <button type="submit" name="action" id="action" value="updateUser">Update</button>
                    <button type="submit" name="action" id="action" value="deleteUser">Delete</button>
                    <button type="submit" name="action" id="action" value="users">Cancel</button>                    
                </li>   
            </ul>
          </form>
       </div>
      </div>
<!-- View for adding and item -->
      <?php elseif($action == 'addItemView') : ?>
            <h2>add Inventory Item</h2>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>
                <?php if($message){echo'<h3>' . $message . '</h3>';}?>
                <div class="grid">
                  <div class="unit whole">
                    <form method="post" action="." id="addItemForm">

                        <ul>        
                        <div class="grid">
                        <div class="unit half">
                            <li>
                                <label for="skuNumber">SKU #:</label>
                                <input type="number" name="skuNumber" placeholder="Enter Unique SKU Number" value="<?php echo $itemData['skuNumber'] ?>" id="skuNumber" required>
                            </li>
                            <li>
                                <label for="partNumber">Part Number:</label>
                                <input type="text" name="partNumber"  value="<?php echo $itemData['partNumber'] ?>" id="partNumber" >
                            </li>
                            <li>
                                <label for="description1">Description1:</label>
                                <input type="text" name="description1" value="<?php echo $itemData['DESC1'] ?>" id="description1" >
                            </li>
                            <li>
                                <label for="description2">Description2:</label>
                                <input type="text" name="description2" value="<?php echo $itemData['DESC2'] ?>" id="description2" >
                            </li>
                            <li>
                                <label for="description3">Description3:</label>
                                <input type="text" name="description3" value="<?php echo $itemData['DESC3'] ?>" id="description3" >
                            </li>
                            <li>
                                <label for="description4">Description4:</label>
                                <input type="text" name="description4" value="<?php echo $itemData['DESC4'] ?>" id="description4" >
                            </li>
                            </div>
                        <div class="unit half">
                            <li>
                                <label for="inventoryUnit">Inventory Unit:</label>
                                <input type="text" name="inventoryUnit" value="<?php echo $itemData['UNIT'] ?>" id="inventoryUnit" >
                            </li>
                            <li>
                                <label for="pricingUnit">Pricing Unit:</label>
                                <input type="text" name="pricingUnit" value="<?php echo $itemData['PUT'] ?>" id="pricingUnit" >
                            </li>
                            <li>
                                <label for="standardCost">Standard Cost:</label>
                                <input type="number" step="any" name="standardCost" placeholder="Enter a number" value="<?php echo $itemData['SCOST'] ?>" id="standardCost" >
                            </li>
                            <li>
                                <label for="category">Category:</label>
                                <input type="text" name="category" value="<?php echo $itemData['CAT'] ?>" id="category" >
                            </li>
                            <li>
                                <label for="quantityPicked">Quantity Picked:</label>
                                <input type="number" name="quantityPicked" placeholder="Enter a number" value="<?php echo $itemData['QPK'] ?>" id="quantityPicked" >
                            </li>
                            <li>
                                <label for="quantityOnHand">Quantity On Hand:</label>
                                <input type="number" name="quantityOnHand" placeholder="Enter a number" value="<?php echo $itemData['QOH2'] ?>" id="quantityOnHand" >
                            </li>
                        </div>
                        </div>
                        </ul>
                        <ul>
                                <li>
                                    <button type="submit" name="action" id="action" value="addItem">Add Item</button>                
                                </li>
                            </ul>
                    </form>
                  </div>
                </div>
            </div>
<!--   View for viewing Index (controller) code -->
      <?php elseif($action == 'indexCode') : ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>
            <h2>Controller Code</h2>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/codeNav.php'; ?>
            <h3>index.php</h3>
                
            <pre>
                <?php 
                    $modelCode = htmlspecialchars(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/user/index.php'));
                    echo $modelCode;
                ?>
            </pre>
<!--   View for viewing Model code -->
      <?php elseif($action == 'modelCode') : ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>
            <h2>Model Code</h2>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/codeNav.php'; ?>
            <h3>model.php</h3>
            <pre>
                <?php 
                    $modelCode = htmlspecialchars(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/user/model.php'));
                    echo $modelCode;
                ?>
            </pre>
<!--   View for viewing View code -->
      <?php elseif($action == 'viewCode') : ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>
            <h2>View Code</h2>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/codeNav.php'; ?>
            <h3>view.php</h3>
            
            <pre>
                <?php 
                    $modelCode = htmlspecialchars(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/user/view.php'));
                    echo $modelCode;
                ?>
            </pre>
      <?php else : ?>
         <?php echo '<h1>error</h1>'; ?>
      <?php endif ?>

    </main>

    <footer id='page_footer' class="grid">

       <!-- Summary of Services -->

    <a href="/index.php" title="Go to home page">

        <img src='/photo/logo.png' alt='Ammon-dbs Logo'></a>


       <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footer.php'; ?>

    </footer>

        <script src="/javascript/analytics.js"></script>

    </div>

    </body>

</html>



