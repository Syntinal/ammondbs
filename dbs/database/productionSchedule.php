<!DOCTYPE html>
<!--
    Database Solution -Production Schedule
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="Description" content="Ammon Database Production Tools">
        <meta name="Keywords" content="database, software, production, manufacturing, tools">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>Production Schedule</title>
        <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    
    <body class="background">
      <div class="content"> 
          
        <header id='page_header'> 
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/header.php'; ?> 
        </header>
           
        <main>

            <h1>
                Production Schedule
            </h1>
            
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/databaseNav.php'; ?>            

          <div class='grid'>
           <div class='unit half'>                                    
            <h2>
                Production Tools
            </h2>            
            <p>
                Production planning is essential to stay organized and to reach
                quotas. Ammon-DBS provides extensive professional tools that allow you
                to plan and to track goals.
            </p>
            </div>
            
            <div class='unit half'>
            <img src="/photo/productionSchedule.JPG" alt='Powerful Production Tools'>
           </div>   
         </div>            
           
            
        </main>
        
        <footer id='page_footer' class="grid">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footer.php'; ?>
        </footer>
       </div>
    </body>
</html>