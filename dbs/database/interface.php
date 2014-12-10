<!DOCTYPE html>
<!--
    Database Solutions -Interface
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="Description" content="Ammon Database Interface">
        <meta name="Keywords" content="friendly, interface, database, manufacturing">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>Interface</title>
        <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    
     <body class="background">
      <div class="content"> 
          
        <header id='page_header'> 
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/header.php'; ?> 
        </header>
           
        <main>
           
            
            <h1>
                Simple Interface
            </h1>
            
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/databaseNav.php'; ?>            
             
         <div class='grid'>
           <div class='unit half'>
            <h2>
                User Friendly Interface
            </h2>
            
            <p>
               Ammon-DBS provides easy to use interfaces for the user. It allows
               ease of training due to its logical flow. Graphics of products
               to reduce user error.
            </p>
           </div> 
             
           <div class='unit half'>
            <img src="/photo/interface.jpg" alt='Ammon database Interface'>
           </div>   
         </div>
            
        </main>
        
        <footer id='page_footer' class="grid">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footer.php'; ?>
        </footer>
       </div>
    </body>
</html>