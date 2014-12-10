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
            
            <h3>Star Rapids(Class Three Rapids)</h3>
         <div class="grid">
           <div class="unit one-third">     
                <img src='/photo/adv3.JPG' alt='Salmon River Adventures'>
            </div>

          <div class="unit one-third">
              <p>
                  Star Rapids allows for the more experienced rafters to begin to enjoy 
                  the excitement of river rafting. Take this moderate stretch of river for
                  an exciting half day on the river. This will give you more experience so
                  that you can tackle more difficult rapids in the future. 
              </p>
          </div>   
             
          <div class="unit one-third">
        <ul>
            <li><p>Difficulty: Moderate</p>
            </li>
        
            <li><p>Length: 3 hour</p>
            </li>
        
            <li><p>Rapids: Class III</p>
            </li>
            
            <li><p>Food: light lunch</p>
            </li>
            
            <li><p>Cost: $50 per person</p>
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