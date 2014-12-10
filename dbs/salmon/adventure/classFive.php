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

        <title>River Adventures</title>
        <link href="/css/screenF.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    
    <body class="background">
                
      <div class="adventure"> 
        
          
        <header id="page_header">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/headerF.php'; ?> 
        </header>
              
        <main>

            <h1>
                High Adventure Trips
            </h1>          
          

            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/adventureNav.php'; ?> 
            
            <h3>Eagle Rapids(Class Five Rapids)</h3>
         <div class="grid">
           <div class="unit one-third">     
                <img src='/photo/adv3.JPG' alt='Salmon River Adventures'>
            </div>

          <div class="unit one-third">
              <p>
                  If you are experienced and have logged over 30 hours of time on
                  class 3 or 4 rapids you are ready for this adventure. This will
                  challenge you to the most extreme river rafting that you will see
                  in the state of Idaho. There is a good chance that you will end up
                  in the water. Faint of heart need not apply. 
              </p>
          </div>   
             
          <div class="unit one-third">
        <ul>
            <li><p>Difficulty: Expert</p>
            </li>
        
            <li><p>Length: 5 hour</p>
            </li>
        
            <li><p>Rapids: Class V</p>
            </li>
            
            <li><p>Food: lunch</p>
            </li>
            
            <li><p>Cost: $75 per person</p>
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