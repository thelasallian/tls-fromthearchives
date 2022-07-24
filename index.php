<!doctype html>
<html lang="en">

<head>
    <?php
    require_once("php/rest.php"); // Execute php rest script
    require_once("php/functions.php"); // Include helper functions for articles and archived photos
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Title -->
    <title>The LaSallian: From the Archives</title>
</head>

<body>

    <!-- Loop to Display Feature Article -->
    <?php
    $articles = $_SESSION["ARTICLE_INFO"];
    getArticleInfo($articles, 0, $date, $link, $title, $visual, $authors, $category, $excerpt);
    ?>

    <!-- Header -->
    <header>
        <div class="container py-5">
            <div class="row my-0">
                <!-- Header Title -->
                <div class="header-title col-sm-12 col-lg-4 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-lg-start text-center">
                    <!-- Logo -->
                    <img src="images/old-tls-star.png" alt="The LaSallian FTA Star" class="header-logo mb-4">
                    <!-- Header Title -->
                    <h3 class="header-title-top">From the</h3>
                    <h1 class="header-title-bottom"><strong>Archives</strong></h1>
                    <!-- Header Description -->
                    <p class="header-description">Since its founding in 1960, The LaSallian has been committed to chronicling
                        chronicling the history of De La Salle University and Filipino society.
                        Explore the publication's articles, photographs, artworks, and videos to
                        truly unlock the essence of the bastion of issue-oriented critical thinking.
                    </p>
                </div>

                <!-- Header Article -->
                <div class="col-sm-12 col-lg-8">
                    <div class="card h-100 border-0 rounded-0 overflow-hidden">
                        <div class="row g-0 d-f h-100 my-0">
                            <div class="header-article col-6 col-sm-12 col-lg-6 flex-column justify-content-left overflow-hidden p-5">
                                <!-- Article Details -->
                                <h5 class="d-inline-block article-category py-1 px-3 rounded-pill fw-bold"><?php echo $category; ?></h5> <!-- Category -->
                                <h4 class="article-title"><strong><?php echo $title; ?></strong></h4> <!-- Title -->

                                <div class="d-flex flex-row">
                                    <p class="article-author"><strong><?php echo $authors; ?></strong></p> <!-- Authors -->
                                    <p class="article-date"><?php echo date('F j, Y', strtotime($date)); ?></p> <!-- Date -->
                                </div>

                                <p class="article-excerpt"><?php echo $excerpt; ?></p> <!-- Excerpt -->
                                <!-- <a href="<?php echo $link; ?>" class="stretched-link" target="_blank"></a> Hyperlink -->
                            </div>

                            <div class="article-visual col-6 col-lg-6 col-sm-12 overflow-hidden">
                                <img class="card-img w-100 h-100 rounded-0" style="object-fit:cover;" src="<?php echo $visual; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="n-header bg-secondary">
        <div class="container">
            <div class="row g-0 my-0">
                <div class="col-5 bg-success">
                    left
                </div>
                <div class="col-7 bg-warning">
                    right
                </div>
            </div>
        </div>
    </div>

    <!-- <h1 class="text-center">🦕🦕🦕</h1> Temporary -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>