<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title><?php $title ?>
    </title>
</head>

<body>

<header>
    <nav>
        <ul>
            <li>
                <a href="home">
                    Home
                </a>
            </li>
            <li>
                <a href="artistes">
                    Artistes
                </a>
            </li>
            <li>
                <a href="404">
                    404
                </a>
            </li>
            <li>
                <a href="clients">
                    clients
                </a>
            </li>
        </ul>
    </nav>
</header>
    <!--            VIEW CONTENT HERE !! -->
    <div class="container">
        <!-- <p>dans la div de la page defaut</p> -->
         <?=  
            $view_content;
         ?>
    </div>


</body>

</html>     