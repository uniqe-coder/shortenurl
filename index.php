<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Shorten URL</title> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</body>
</html>
<?php

// File which works as Homepage and provides the url. Once you click on URL it takes you to the requested URL (From shortURL to Actual URL)

// URL can be of google.com or youtube.com or any bigger url

// Include database configuration file
require_once 'dbConfig.php';

// Include URL Shortener library file
require_once 'Shortener.class.php';

// Initialize Shortener class and pass PDO object
$shortener = new Shortener($db);

// Long URL
// $longURL = 'https://www.youtube.com/watch?v=4Oq-Pcgw9uk&ab_channel=AparnArt';
$longURL = array('https://www.youtube.com/watch?v=8aQtWQ8PW7c&ab_channel=DilRaju','https://www.youtube.com/watch?v=GX0RZ_P_BTg','https://www.youtube.com/watch?v=4Oq-Pcgw9uk&ab_channel=AparnArt');
$shortURL_Prefix = 'http://localhost/shorturl/redirect.php?c=';
foreach ($longURL as $key => $value) {
    $shortCode = $shortener->urlToShortCode($value);
    // print_r($shortCode);die;
    
    // Create short URL
    $shortURL = $shortURL_Prefix.$shortCode;
    
    // Display short URL
    echo 'Short URL:'.'<a target="blank" href="'.$shortURL.'">'.$shortURL;
    echo "<br>";
}

// Prefix of the short URL 
// $shortURL_Prefix = 'http://localhost/shorturl/redirect.php?c='; // with URL rewrite
// $shortURL_Prefix = 'https://xyz.com/?c='; // without URL rewrite


/*try{
    // Get short code of the URL
    $shortCode = $shortener->urlToShortCode($longURL);
    // print_r($shortCode);die;
    
    // Create short URL
    $shortURL = $shortURL_Prefix.$shortCode;
    
    // Display short URL
    echo 'Short URL: <a target="blank" href="'.$shortURL.'">'.$shortURL;
}catch(Exception $e){
    // Display error
    echo $e->getMessage();
}*/