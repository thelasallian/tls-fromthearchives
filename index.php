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

    <!-- Title -->
    <title>The LaSallian: From the Archives</title>
</head>

<body>

    <!-- Articles Section -->
    <section class="articles py-5">
        <div class="container">
            <!-- Masonry Grid -->
            <div class="row" data-masonry='{"percentPosition": true }'>
                <!-- Loop to Display Articles and Archived Photos -->
                <?php
                $articles = $_SESSION["ARTICLE_INFO"];
                $photos = json_decode(file_get_contents("https://github.com/ronnparcia/tls-fta-scans/blob/main/featured.json?raw=true"), true);
                for ($i = 1; $i < 10; $i++) {
                    getArticleInfo($articles, $i, $date, $link, $title, $visual, $authors, $category);
                    getArchivedPhotos($photos, $i - 1, $imageURL, $caption);
                ?>

                    <!-- Display Article Card -->
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <a href="<?php echo $link; ?>" target="_blank">
                            <!-- Card -->
                            <div class="card border-0 rounded-0">
                                <!-- Article Visual -->
                                <img src="<?php echo $visual; ?>" class="card-img-top border-0 rounded-0" alt="..." loading="lazy">
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
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <!-- Card -->
                        <div class="card border-0 rounded-0 p-4">
                            <!-- Archived Photo -->
                            <img src="<?php echo $imageURL; ?>" class="card-img-top rounded-0" alt="..." loading="lazy">
                            <!-- Caption -->
                            <div class="card-body mt-4 p-0">
                                <p class="card-text"><?php echo $caption; ?></p>
                            </div>
                        </div>
                    </div>

                <?php } ?> <!-- for loop closing brace -->
            </div>
            
            <!-- View All Link -->
            <a href="https://thelasallian.com/kicker/from-the-archives/" target="_blank" class="d-block text-center mt-4 view-all-link fw-bold fs-5">View All Articles</a>
        </div>

    </section>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Masonry -->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
</body>

</html>