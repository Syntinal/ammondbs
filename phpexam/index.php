<?php
$value = $_GET['location'];

switch ($value) {
    case 'Africa':
        $content = "<h1>$value</h1>" . '<p>Is very hot</p>';
        break;
    case 'Europe':
        $content = "<h1>$value</h1>" . '<p>Is cold</p>';
        break;
    case 'North America':
        $content = "<h1>$value</h1>" . '<p>Is free</p>';
        break;
    case 'Antarctica':
        $content = "<h1>$value</h1>" . '<p>Is very cold</p>';
        break;
    case 'Asia':
        $content = "<h1>$value</h1>" . '<p>Is very populated</p>';
        break;
    case 'South America':
        $content = "<h1>$value</h1>" . '<p>Is in the south</p>';
        break;
    case 'Oceania':
        $content = "<h1>$value</h1>" . '<p>Is down under</p>';
        break;
    default:
        $content = '<h1>Select a location.</h1>';
        break;
}

include('view.php');
