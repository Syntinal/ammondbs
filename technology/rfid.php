<!DOCTYPE html>
<!--
    Technology -RFID Tagging
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="Description" content="Ammon Database RFID Tagging">
        <meta name="Keywords" content="RFID, manufacturing, tagging, database">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>RFID Tagging</title>
        <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">
    </head>

    <body class="background">
      <div class="content">    
    
        <header id='page_header'> 
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/header.php'; ?> 
        </header>
           
        <main>
            
            <h1>
                RFID Tagging
            </h1>

            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/technologyNav.php'; ?>             

         <div class='grid'>
          <div class='unit half'>               
            <h2>
                Advanced Inventory Control
            </h2>
            
            <p>
                A more expensive alternative to barcoding, RFID smart labeling gives 
                you the ability to read data remotely. This allows you to read simultaneously 
                load tags without individually scanning each unit. The advantages are make it
                an option worth looking into.
            </p>
          </div>
          <div class='unit half'>   
            <img src="/photo/RFID.jpg" alt='RFID Smart Labels'>
          </div>
         </div>    
           
                 
            

            
        </main>
        
        <footer id='page_footer' class="grid">
            <a href="/index.php" title="Go to home page">
                <img src='/photo/logo.png' alt='Ammon-dbs Logo'></a> 
        
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footer.php'; ?>
        </footer>
      </div>   
    </body>
</html>