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
                    <input type="email" name="emailAddress" placeholder="Enter Email Address" id="emailAddress" required>
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
                    <input type="email" name="email" placeholder="Enter Email Address" id="email" required>
                </li>
                <li>
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" placeholder="Enter First Name" id="firstName" required>
                </li>
                <li>
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" placeholder="Enter Last Name" id="lastName" required>
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter Password" id="password" required>
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
                                    echo '<td>' .'<a href="/user/index.php?action=gotoEditUser' . $users[$i][0] . '">edit</a>' . '</td>';
                                } 
                            }
                        echo '</tr>';
                    }
                ?>
            </table>
       </div>
      </div>
      <?php elseif($action == 'search') : ?>
      <div class="grid">
        <div class="whole">

            <h2>search View</h2>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>

       </div>
      </div>
      <?php elseif($action == 'item') : ?>
      <div class="grid">
        <div class="whole">

            <h2>item view</h2>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/contentNav.php'; ?>

       </div>
      </div>
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
                    <button type="submit" name="action" id="action" value="updateUser">Update User</button>
                    <button type="submit" name="action" id="action" value="deleteUser">Delete</button>
                    <button type="submit" name="action" id="action" value="users">Cancel</button>                    
                </li>   
            </ul>
          </form>
       </div>
      </div>
      <?php else : ?>
            <h1>Access is Restricted</h1>
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



