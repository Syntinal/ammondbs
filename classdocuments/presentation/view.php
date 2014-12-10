<?php $action; ?>
<!DOCTYPE html>

<!--

    About Page

-->

<html>

    <head>

        <meta charset="UTF-8">

        <meta name="Description" content="About Ammon Database Solutions">

        <meta name="Keywords" content="manufacturing, inventory, database">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title>Presentation</title>

        <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">

    </head>

    <body class="background">

        <div class="content"> 

        

        <header id='page_header'> 

            <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/header.php'; ?> 

        </header>
        <main>
            
        <h1>SELECT and WHERE statements</h1>
        
        <?php include 'nav.php'; ?> 
          
          
          <?php if($action == 'example1') : ?>
          <div class="grid">
            <div class="whole">

                <h2>Basic SELECT Statement</h2>
                <h3>Also known as a query, SELECT statements retrieve data from a database.</h3>
                    <h3>Code Format</h3>
                        <pre class="markup">
                            <code>SELECT col1, col2, col3, ... <br>FROM tableName</code>
                        </pre>
                    
                    <h3>Example</h3>
                        <pre class="markup">
                            <code>SELECT productName<br>     , productCode<br>     , listPrice<br>FROM products
                            </code>
                        </pre>
                    <h3>Results</h3>
           </div>
          </div>
          <?php elseif($action == 'example2') : ?>
          <div class="grid">
            <div class="whole">

                <h2>SELECT with LIMIT</h2>
                <h3>LIMIT is used to reduce the number of records displayed from the query.</h3>
                    <h3>Code Format</h3>
                        <pre class="markup">
                            <code>SELECT col1, col2, col3, ... <br>FROM tableName<br>LIMIT offset, count</code>
                        </pre>
                        <pre class="markup">
                            <code>SELECT col1, col2, col3, ... <br>FROM tableName<br>LIMIT n</code>
                        </pre>
                        <div class='presentation336'>
                            <ul>
                                <li>offset: the point in which you want to display your query. (starts at 0)</li>
                                <li>count: the number of rows you want to display from the offset point.</li>
                            </ul>
                        </div>
                    <h3>Example</h3>
                        <pre class="markup">
                            <code>SELECT productName<br>     , productCode<br>     , listPrice<br>FROM products<br>LIMIT 2,3
                            </code>
                        </pre>
                    <h3>Results</h3>
           </div>
          </div>
          <?php elseif($action == 'example3') : ?>
          <div class="grid">
            <div class="whole">

                <h2>SELECT with WHERE</h2>
                <h3>WHERE statements are used to narrow results of a query.</h3>
                    <h3>Code Format</h3>
                        <pre class="markup">
                            <code>SELECT col1, col2, col3, ... <br>FROM tableName<br>WHERE condition</code>
                        </pre>
                    
                    <h3>Example</h3>
                        <pre class="markup">
                            <code>SELECT productName<br>     , productCode<br>     , listPrice<br>FROM products<br>WHERE productCode = hofner
                            </code>
                        </pre>
                    <h3>Results</h3>
           </div>
          </div>
          <?php elseif($action == 'example4') : ?>
          <div class="grid">
            <div class="whole">

                <h2>WHERE with a greater than condition</h2>
                <h3>Different operators can be used other that the '=' to produce desired results.</h3>
                    <h3>Code Format</h3>
                        <pre class="markup">
                            <code>SELECT col1, col2, col3, ... <br>FROM tableName<br>WHERE condition</code>
                        </pre>
                    
                    <h3>Example</h3>
                        <pre class="markup">
                            <code>SELECT productName<br>     , productCode<br>     , listPrice<br>FROM products<br>WHERE productCode > 500
                            </code>
                        </pre>
                    <h3>Results</h3>
           </div>
          </div>
          <?php elseif($action == 'example5') : ?>
          <div class="grid">
            <div class="whole">

                <h2>Using SELECT/WHERE statement in an INSERT</h2>
                <h3>SELECT/WHERE can be used in conjunction with INSERT to insert 1..* records.</h3>
                    <h3>Code Format</h3>
                        <pre class="markup">
                            <code>INSERT INTO tableName<br>(column1, colmon2, ...)<br>SELECT column1, column2<br>FROM tableName<br>WHERE condition</code>
                        </pre>
                    
                    <h3>Example</h3>
                        <pre class="markup">
                            <code>INSERT INTO administrators<br>( firstName<br>, lastName<br>, emailAddress)<br>SELECT firstName<br>, lastName<br>, emailAddress<br>FROM customers<br>WHERE firstName = 'Barry'
                            </code>
                        </pre>
                    <h3>Results</h3>
           </div>
          </div>
          <?php elseif($action == 'example6') : ?>
          <div class="grid">
            <div class="whole">

                <h2>Using a WHERE statement in a DELETE</h2>
                <h3>WHERE statements are used with DELETE to specify records to be removed.</h3>
                    <h3>Code Format</h3>
                        <pre class="markup">
                            <code>DELETE FROM table<br>WHERE condition</code>
                        </pre>
                    
                    <h3>Example</h3>
                        <pre class="markup">
                            <code>DELETE FROM administrators<br>WHERE firstName = 'Barry'</code>
                        </pre>
                    <h3>Results</h3>
           </div>
          </div>
          <?php else : ?>
                <h1>CIT 336 PRESENTATION</h1>
                <h1>SELECT AND WHERE STATEMENTS</h1>
                <h1>Nathan Wittmann</h1>
          <?php endif ?>
          
          
        <table>         
            <?php
                for($i = 0; $i < count($example); $i++){
                    echo '<tr>';
                        for($j = 0; $j < 3; $j++){
                            echo '<td>' . $example[$i][$j] . '</td>';
                        }
                    echo '</tr>';
                }
            ?>
        </table>
 
        </main>

        <footer id='page_footer' class="grid">

           <!-- Summary of Services -->

        <a href="/index.php" title="Go to home page">

            <img src='/photo/logo.png' alt='Ammon-dbs Logo'></a>

           <?php include $_SERVER['DOCUMENT_ROOT'] . '/module/footer.php'; ?>

        </footer>

        <script src="/javascript/analytics.js"></script>

      </div>

    </body>

</html>



