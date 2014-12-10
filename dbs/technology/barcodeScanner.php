<!DOCTYPE html>
<!--
    Technology -Barcode Scanner
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="Description" content="Ammon Database Barcode Scanning">
        <meta name="Keywords" content="barcode, scanner, input, database">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>Barcode Scanner</title>
        <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    
    <body class="background">
      <div class="content">
          
        <header id='page_header'> 
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/header.php'; ?> 
        </header>
           
        <main>
            
            <h1>
                Barcode Scanners
            </h1>
            
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/technologyNav.php'; ?> 

            
         <div class='grid'>
          <div class='unit half'>             
            <h2>
                Long Range Scanners
            </h2>
            
            <p>
                Advances in barcode scanners give many powerful capabilities.
            </p>

            
            <ul>
                <li>Bluetooth capability</li>
                <li>Long range 50'+ scanning</li>
                <li>Elimination of Human Error</li>
            </ul>
           </div>
             
           <div class='unit half'>  
            <img src="/photo/BlueToothScanGun.jpg" alt='Bluetooth Scan Gun'>
           </div>
          </div>
            
          <div class='grid'> 
           <div class='unit half'>             
            <h2>
                Serial Barcodes
            </h2>
            
            <p>
                Serial tagging allows each pallet unit to be unique and able to track critical information.
            </p>

            
            <ul>
                <li>Superior Bin locating</li>
                <li>FIFO tracking ability</li>
                <li>Error free handling</li>
            </ul>
           </div>  
             
           <div class='unit one-third'>  
            <img src="/photo/loadTag.JPG" alt='Load Tag'><br>
           </div>
         </div>  
            
            <h2>
                Alternative Barcode Sound
            </h2>
            
            <audio controls preload='none'>
                <source src='/audio/Bell.mp3'>
                <source src='/audio/Bell.oggvorbis.ogg'>
                <p>
                    Your browser does not support HTML5 audio. You can 
                    <a href='/path/Bell.zip' title='download a zipped MP3
                   file'>download a zipped version
                    </a> of the file in MP3 format to listen to you own
                    MP3 player by right-clicking the link and selecting
                    "Save as...".
                </p>
            </audio>
            

            
        </main>
        
        <footer id='page_footer' class="grid">
            <a href="/index.php" title="Go to home page">
                <img src='/photo/logo.png' alt='Ammon-dbs Logo'></a>             

            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footer.php'; ?>
        </footer>
      </div>
    </body>
</html>