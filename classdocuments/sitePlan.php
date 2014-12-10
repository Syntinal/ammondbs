<!DOCTYPE html>
<!--
    Site Plan
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="Description" content="Ammon Database Solutions Site Plan">
        <meta name="Keywords" content="manufacturing, inventory, database, accounting, shipping">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title>Ammon-DBS.com Site Plan</title>
        <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    
    <body class="background">
      <div class="content">
        
        <div>
        <header id='page_header'> 
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/header.php'; ?> 
        </header>
           
        <main>
            
            <h1>
              Ammon-dbs.com Site Plan   
            </h1>
            
                <h2>
                    Purpose Statement   
             	</h2>
                <p>
                   Heritage Paper is a company that I work for that is located in Bay Area of California. Heritage Paper is in need of a 	database which contains Inventory information that accessible from the web. I want to create a front end site that will allow customers to securely access their inventory. A Heritage Paper manager would be able to login and search for a SKU or enter a SKU and then gain access to the data corresponding to that SKU. The data would also be accompanied by an image of that SKU giving a visual depiction of their product as well as the data corresponding to it. This site will allow them to access this information without having to be located at a computer in the warehouse. It will allow ease of access and efficiency to their processes. 
                </p> 
            
            <div class="grid">    
            <div class="unit half"> 
            <h2>
                Target Audience
            </h2>
                <dl>
                    <dt>Age</dt>
                    <dd>25 - 60</dd>
                    <dt>Economic Range</dt>
                    <dd>50k – 150k</dd>
                    <dt>Education Range</dt>
                    <dd>High school grad +</dd>
                    <dt>Internet Browsing Device:</dt>
                    <dd>Desktop</dd>
                    <dd>Laptop</dd>
                    <dd>Phone</dd>
                    <dt>Likes</dt>
                    <dd>Automation</dd>
                    <dd>Technology</dd>
                    <dd>Change</dd>
                    <dd>Improving Procedure</dd>
                    <dd>Being ahead of the curve</dd>
                    <dt>Dislikes</dt>
                    <dd>Redundancy</dd>
                    <dd>Inefficiency</dd>
                    <dd>Falling behind</dd>                 
                </dl>
                
                </div>
                <div class="unit half">
                
                <h2>
                    Female Persona   
             	</h2>
                <p>
                   User Group
                    High level management (ie Operations manager, Production Manager, Inventory Manager)
                    Medium to small sized Company 5 to 200 employees
                    Expectations: Be able to easily access information regarding database on the go. Will 
                    use mobile device to answer questions while on teh road. 
                    Type:
                    A managerial level decision maker that wants to improve accounting and inventory control.
                </p> 
                
                <h2>
                    Male Persona   
             	</h2>
                <p>
                   User Group
                    Middle to high level management (ie Operations manager, Production Manager, Inventory Manager)
                    Medium to small sized Company 5 to 200 employees
                    Expectations: Needs to be able to get their job done even when they are not at their desk. Often
                    moving about a warehouse and need to access inventory information at all times of the day, at 
                    many different locations in the warehouse. Needs to be flexiable and effecient at their job. 
                    Type:
                    Non-Decsion Maker. Uses site to accomplish tasks at hand. 
                </p> 
                
                </div>
                </div>   
                
                <img src="/photo/spMan.jpg" alt='Man'>
                <img src="/photo/spWoman.jpg" alt='Woman'>                 
                      
            <h2>
                Scenarios
            </h2>
                <dl>
                    <dt>Scenario 1: Customer needs to determine current quantity of a SKU.</dt>
                    	<dd>Login</dd>
                    	<dd>Select desired SKU</dd>
                    	<dd>View SKU display and find field that lists quantity</dd>
                    <dt>Scenario 2: Customer needs to determine unit of measure of a SKU</dt>
                    	<dd>Login</dd>
                    	<dd>Select desired SKU</dd>
                    	<dd>View SKU display and find field that lists unit of measure</dd>
                    <dt>Scenario 3: Customer needs to determine described color of paticular SKU.</dt>
                    	<dd>Login</dd>
                    	<dd>Select desired SKU</dd>
                    	<dd>View SKU display and find field that lists quantity</dd>
                    <dt>Scenario 4: Customer needs to determine associated customer of a SKU.</dt>
                    	<dd>Login</dd>
                    	<dd>Select desired SKU</dd>
                    	<dd>View SKU display and find field that lists quantity</dd>
                    <dt>Scenario 5: Customer needs to determine quantity pending receipt</dt>
                    	<dd>Login</dd>
                    	<dd>Select desired SKU</dd>
                    	<dd>View SKU display and find field that lists quantity pending recei</dd> 
                    <dt>Scenario 5: Customer cannot recall specific SKU of desired inventory item</dt>
                    	<dd>Login</dd>
                    	<dd>Search and Select desired SKU</dd>
                    	<dd>Gains access to desired SKU</dd>                                                                                                
                </dl>
                                      
   

            <div class="grid">    
            <div class="unit one-third">
            
             <h2>
                 Asset List
             </h2>
                 <dl>
                    <dt>Text/Data:</dt>
                    <dd>Inventory list</dd>
                    <dd>Inventory Description</dd>
                    <dd>Inventory Quantity</dd>
		    <dd>Quantity Pending Receipt</dd>                    
                    <dd>Inventory Unit</dd>
                    <dd>Inventory SKU</dd>
                    <dd>Inventory Details</dd>
		    <dd>Associated Company Name</dd>
                    <dt>Interactive</dt>
                    <dd>LoginName</dd>
                    <dd>Login Password</dd>
                    <dd>Description Search</dd>
                    <dd>SKU Selection</dd>		    
                    <dt>Photos:</dt>
                    <dd>Photo of Inventory Items</dd>
                    <dd>Thumbnail of Inventory Item</dd>
                    <dd>Company Logo</dd>
                    <dt>New Icons:</dt>
                    <dd>magnifing glass - search,</dd>
                    <dd>house – home</dd>
                 </dl>  
                 </div>
                 
                <div class="unit two-thirds">              
                <h2>
                   Color and Font Selection   
                </h2>
                 <h3>
                     Color Pallet
                 </h3>
                 <img  src="/photo/spColorChart.jpg" alt='Pallet'>
                 
                 <h3>
                     Color and Font Chart
                 </h3>
                 <img  src="/photo/spFontChart.JPG" alt='Font Chart'>
                 </div>
                 </div>
              <h2>
                  Navigation
              </h2>
                 <h3>
                     Diagram
                 </h3>

                 <img src="/photo/spDiagram.jpg" alt='Flow Chart'>  

              <h2>
                  Sketches
              </h2>
                 <h3>
                    Desktop Browser Login
                 </h3>
                 <img src="/photo/spDeskPri.jpg" alt='Flow Chart'>
                 <h3>
                    Tablet Search
                 </h3>                 
                 <img src="/photo/spTabletSec.jpg" alt='Flow Chart'>
                 <h3>
                    Large Phone Inventory Display
                 </h3>        
                 <img src="/photo/spPhoneSec.jpg" alt='Flow Chart'>
               
        </main>
        
        <footer id='page_footer' class='grid'>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footer.php'; ?>
        </footer>
    
        <script src="/javascript/analytics.js"></script>
        </div>
      </div>
    </body>
</html>