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
            
            <h3>Tender Foot(Class One Rapids)</h3>
         <div class="grid">
           <div class="unit one-third">     
                <img src='/photo/adv1.JPG' alt='Salmon River Adventures'>
            </div>

          <div class="unit one-third">
              <p>
                  Tender Foot Adventure is an option for people who are looking for a 
                  mild challenge. Great for the casual newbie that is looking for a 
                  relaxing trip down the river. The rapids that you will encounter will
                  not cause any concern. 
              </p>
          </div>   
             
          <div class="unit one-third">
        <ul>
            <li><p>Difficulty: Novice</p>
            </li>
        
            <li><p>Length: 1 hour</p>
            </li>
        
            <li><p>Rapids: Class I</p>
            </li>
            
            <li><p>Food: trail-mix</p>
            </li>
            
            <li><p>Cost: $25 per person</p>
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