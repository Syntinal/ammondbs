<!DOCTYPE html>
<!--
    Home Page
-->
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="Description" content="Salmon River Adventures">
        <meta name="Keywords" content="river rafting, outdoor adventures, rapids">
        
        <title>Salmon River Adventures Home Page</title>

        <link type="text/css" media="screen"  rel="stylesheet" href="/css/screenF.css" />


    </head>
    
    <body class="background">
        <div class="content">   
        <header id="page_header">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/headerF.php'; ?> 
        </header>
           
        <main>
            <a href="/salmon/adventure/index.php" title="Go to Adventures">
            <img src='/photo/slideImage1.jpg' alt='Salmon River Adventures'>
            </a>
            
            <a href="/salmon/guide/index.php" title="Go to Guides">
            <img src='/photo/slideImage3.jpg' alt='Salmon River Adventures '>
            </a>
        </main>

        <footer id='page_footer' class="grid">
            
            
           <!-- Summary of Services -->                          
           <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footerF.php'; ?>
  
        </footer>
    
       
      </div>
    </body>
</html>
