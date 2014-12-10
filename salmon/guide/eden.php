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

        <title>Eden</title>
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
            
            <h3>Guide: Eden</h3>
         <div class="grid">
           <div class="unit one-third">     
               <img src='/photo/eden.jpg' alt='Salmon River Adventures'>
            </div>

          <div class="unit one-third">
              <p>
                  Eden is our least experienced guide, but dont let that fool you. She
                  is experienced on our moderate river rafting adventures. She will take
                  you on a wild ride down some of the most exciting rapids on the Salmon River.
                  Prepare your self for a great day when you are with Eden. 
              </p>
          </div>   
             
          <div class="unit one-third">
        <ul>
            <li><p>Name: Eden Wittmann</p>
            </li>
        
            <li><p>Age: 4</p>
            </li>
        
            <li><p>Experience: 1 months</p>
            </li>
            
            <li><p>Certification: Class III</p>
            </li>
            
            <li><p>Email: eden@gmail.com</p>
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