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
                Search
            </h1>
            
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/databaseNav.php'; ?>            

         <div class='grid'>
           <div class='unit half'>            
            <h2>
                Interface Search
            </h2>
            
            <p>
                Ammon-DBS uses an intelligent search engine that allows you to quickly
                find the data you are looking for. 
            </p>
            </div>
             
            <div class='unit half'>   
            <img src="/photo/search.JPG" alt='Ammon database search'> 
           </div>   
         </div>

            
        </main>
        
        <footer id='page_footer' class="grid">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footer.php'; ?>
        </footer>
       </div>
    </body>
</html>