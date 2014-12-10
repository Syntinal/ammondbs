<!DOCTYPE html>
<!--
    Technology Page
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="Description" content="Salmon River Adventures">
        <meta name="Keywords" content="River, Adventures, Rafting, Outdoors">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>Maicy</title>
        <link href="/css/screenF.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    
    <body class="background">
                
      <div class="adventure"> 
        
          
        <header id="page_header">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/headerF.php'; ?> 
        </header>
              
        <main>

            
            
            <h1>
                River Rafting Guides
            </h1>          
          

            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/guideNav.php'; ?> 
            
 
            
            <h3>Guide: Maicy</h3>
         <div class="grid">
           <div class="unit one-third">     
               <img src='/photo/maicy.jpg' alt='Salmon River Adventures'>
            </div>

          <div class="unit one-third">
              <p>
                  Maicy is a laid back river rafter with a lot experience on the 
                  lower class rapids. If you are looking for someone to enjoy 
                  a lazy day on the river, Maicy is your girl. She has been rafting
                  down the Salmon river for 2 months now and is looking to brighten
                  your day.
              </p>
          </div>   
             
          <div class="unit one-third">
        <ul>
            <li><p>Name: Maicy Wittmann</p>
            </li>
        
            <li><p>Age: 5</p>
            </li>
        
            <li><p>Experience: 2 months</p>
            </li>
            
            <li><p>Certification: Class I</p>
            </li>
            
            <li><p>Email: maicy@gmail.com</p>
            </li>            
        </ul> 
          </div>
     </div>
        </main>
        
        <footer id='page_footer' class="grid">         
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footerF.php'; ?>
        </footer>
       </div>
    </body>
</html>