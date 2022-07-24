<!doctype html>
<html lang="en">

<head>
    <!-- Execute php -->
    <?php
    require_once("php/rest.php"); // Execute php rest script
    require_once("php/functions.php"); // Include helper functions for articles and archived photos
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" rel="stylesheet" href="styles/style.css">

    <!-- Favicons -->
    <link rel="icon" href="https://thelasallian.com/wp-content/uploads/2020/06/LOGO.png" sizes="32x32" />
    <link rel="icon" href="https://thelasallian.com/wp-content/uploads/2020/06/LOGO.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://thelasallian.com/wp-content/uploads/2020/06/LOGO.png" />

    <!-- Title -->
    <title>The LaSallian: From the Archives</title>
</head>

<body>
    <?php
    $articles = $_SESSION["ARTICLE_INFO"];
    getArticleInfo($articles, 0, $date, $link, $title, $visual, $authors, $category, $excerpt);
    ?>

    <!-- Header -->
    <header>
        <div class="container py-5">
            <div class="row my-0">
                <!-- Header Title -->
                <div class="header-title pb-5 pe-lg-5 pb-lg-0 col-sm-12 col-lg-4 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-lg-start text-center">
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
                        <div class="row g-0 d-f flex-column-reverse flex-xl-row h-100 my-0">
                            <div class="header-article col-12 col-lg-12 col-xl-6 flex-column justify-content-left overflow-hidden p-5">
                                <!-- Article Details -->
                                <h5 class="d-inline-block article-category py-1 px-3 rounded-pill fw-bold"><?php echo $category; ?></h5> <!-- Category -->
                                <h4 class="article-title"><strong><?php echo $title; ?></strong></h4> <!-- Title -->

                                <div class="d-flex flex-row">
                                    <p class="article-author"><strong><?php echo $authors; ?></strong></p> <!-- Authors -->
                                    <p class="article-date"><?php echo date('F j, Y', strtotime($date)); ?></p> <!-- Date -->
                                </div>

                                <p class="article-excerpt"><?php echo $excerpt; ?></p> <!-- Excerpt -->
                                <a href="<?php echo $link; ?>" class="stretched-link" target="_blank"></a>
                            </div>

                            <div class="article-visual col-12 col-lg-12 col-xl-6 overflow-hidden">
                                <img class="card-img w-100 h-100 rounded-0" style="object-fit:cover;" src="<?php echo $visual; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- Articles Section -->
    <section class="articles py-5">
        <div class="container">
            <!-- Masonry Grid -->
            <div class="row g-5" data-masonry='{"percentPosition": true }'>
                <!-- Loop to Display Articles and Archived Photos -->
                <?php
                $articles = $_SESSION["ARTICLE_INFO"];
                $photos = json_decode(file_get_contents("https://github.com/ronnparcia/tls-fta-scans/blob/main/featured.json?raw=true"), true);
                for ($i = 1; $i < 10; $i++) {
                    getArticleInfo($articles, $i, $date, $link, $title, $visual, $authors, $category, $excerpt);
                    getArchivedPhotos($photos, $i - 1, $imageURL, $caption);
                ?>

                    <!-- Display Article Card -->
                    <div class="col-sm-6 col-lg-4">
                        <a href="<?php echo $link; ?>" target="_blank">
                            <!-- Card -->
                            <div class="card border-0 rounded-0">
                                <!-- Article Visual -->
                                <img src="<?php echo $visual; ?>" class="card-img card-img-top border-0 rounded-0" alt="..." loading="lazy">
                                <!-- Card Body -->
                                <div class="card-body p-4">
                                    <p class="card-text card-category py-1 px-3 rounded-pill fw-bold"><?php echo $category ?></p> <!-- Category -->
                                    <h4 class="card-title fw-bold"><?php echo $title; ?></h4> <!-- Title -->
                                    <div class="card-byline">
                                        <img src="../images/quill.png" alt="">
                                        <p class="card-text fw-bold mb-0"><?php echo $authors; ?></p> <!-- Authors -->
                                        <p class="card-text card-date"><?php echo date('F j, Y', strtotime($date)); ?></p> <!-- Date -->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Display Archived Photo -->
                    <div class="col-sm-6 col-lg-4">
                        <!-- Card -->
                        <div class="card border-0 rounded-0 p-4">
                            <!-- Archived Photo -->
                            <img src="<?php echo $imageURL; ?>" class="card-img card-img-top rounded-0" alt="..." loading="lazy">
                            <!-- Caption -->
                            <div class="card-body mt-4 p-0">
                                <p class="card-text"><?php echo $caption; ?></p>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <!-- for loop closing brace -->
            </div>

            <!-- View All Link -->
            <div class="d-f text-center mt-5">
                <a href="view-all.php" class="view-all-link fw-bold fs-5">View All Articles</a>
                <a href="gallery.php" class="ms-5 view-all-link fw-bold fs-5">View All Photos</a>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6 d-flex justify-content-center align-self-center align-items-lg-start text-center">
                    <figure>
                        <!-- Logo -->
                        <img src="images/old-tls-wordmark.png" alt="TLS Name Logo" class="footer-logo mb-4 img-fluid">
                        <!-- Logo Heading -->
                        <figcaption class="footer-heading"><strong>Archives Website</strong></figcaption>
                    </figure>
                </div>
                <div class="col-sm-12 col-lg-6 d-flex flex-column align-items-center align-items-lg-start text-center text-lg-start">
                    <!-- Description -->
                    <p class="footer-description">
                        <strong>The LaSallian</strong> is the official student publication of De La Salle University.
                        It is of the students, by the students, and for the students. Our student writers, photographers,
                        videographers, and web managers are committed to the 61-year tradition of journalistic excellence
                        and issue-oriented critical thinking.
                    </p>
                    <!-- Link to Main Website -->
                    <p class="footer-link-main-site"><a href="https://thelasallian.com"><strong>Go to Main Website →</strong></a></p>
                    <!-- Website Developers -->
                    <p class="footer-developers fst-italic mt-3">Website by Angelo Guerra & Ronn Parcia</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Masonry -->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

</body>

</html>