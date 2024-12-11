<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php $title ?></title>
</head>

<body>

<header>
    <nav>
        <ul>
            <li><a href="?c=home&f=index">Home</a></li>
            <li><a href="?c=home&f=notFound404">404</a></li>
            <li><a href="?c=artistes&f=index">Artistes</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <!-- <p>dans la div de la page defaut</p> -->

    <!--            VIEW CONTENT HERE !! -->
    <?=  
            $view_content;
            var_dump($data["title"]);
         ?>
    </div>

</body>
</html>     