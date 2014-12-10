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

        <title>Chase</title>
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

            
            <h3>Guide: Chase</h3>
         <div class="grid">
           <div class="unit one-third">     
               <img src='/photo/chase.jpg' alt='Salmon River Adventures'>
            </div>

          <div class="unit one-third">
              <p>
                  Chase is an experience river rafter. He always has a smile to welcome
                  you to exciting adventure. Chase has been on the river since he was 
                  a young boy and still can't get enough. You can be garenteed to have a
                  good time on Chase's raft. 
              </p>
          </div>   
             
          <div class="unit one-third">
        <ul>
            <li><p>Name: Chase Wittmann</p>
            </li>
        
            <li><p>Age: 7</p>
            </li>
        
            <li><p>Experience: 6 months</p>
            </li>
            
            <li><p>Certification: Class VI</p>
            </li>
            
            <li><p>Email: Chase@gmail.com</p>
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