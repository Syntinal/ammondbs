<!DOCTYPE html>
<!--
    Database Solutions -Forms
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="Description" content="Ammon Database Forms">
        <meta name="Keywords" content="dataentry, form, validation, database">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title>Forms</title>
        <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    
    <body class="background">
      <div class="content"> 
          
        <header id='page_header'> 
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/header.php'; ?> 
        </header>
           
        <main>
                          
            <h1>
                User Forms
            </h1>
            
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/databaseNav.php'; ?>            

         <div class='grid'>
           <div class='unit half'>            
            <h2>
                Simple Validating Forms
            </h2>
            
            <p>
                The best way to stop inaccurate data entry is through form validation.
                Ammon-DBS provides through data validation that allows you to have
                the piece of mind that your data is correct. 
            </p>
           </div>              
           <div class='unit half'>
            <img src="/photo/form.JPG" alt='Simple User Forms with Validation'>            
           </div>   
         </div>
            
        </main>
        
        <footer id='page_footer' class="grid">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footer.php'; ?>
        </footer>
       </div>
    </body>
</html>