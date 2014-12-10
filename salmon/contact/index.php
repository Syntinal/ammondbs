<!DOCTYPE html>
<!--
    Contact Page
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="Description" content="Ammon Database Contact Us">
        <meta name="Keywords" content="contact, database, manufacturing, software">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title>Contact</title>
        <link href="/css/screenF.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    
    <body class="background">
      <div class="content"> 
          
        <header id='page_header'> 
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/headerF.php'; ?> 
        </header>
           
          <form method="post" action="." id="contactform">
              <label for="name">Name:</label><br>
              <input type="text" name="name" id="name" size="40"><br>
              <label for="email">Email</label><br>
              <input type="email" name="email" id="email" size="50"><br>
              <label for="subject">Subject</label>
              <input type="text" name="subject" id="subject" size="50"><br>
              <label for="message">Message</label><br>
              <textarea name="message" id="message" cols="50" rows="10"></textarea><br>
              <label for='action'>&nbsp;</label>
              <input type='submit' name="action" id='action' value="Send"><br>
          </form>       

        <div class='unit half'>
            <img src="/photo/contactUs.png" alt='Contact Ammon database solution'>
        </div>    
         
        </main>
        
        <footer id='page_footer' class='grid'>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footerF.php'; ?>
        </footer>
    </body>
</html>