<!doctype html>
<html lang="en">

<head>
    <!-- Execute php -->
    <?php require_once("php/functions.php"); ?>

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
    <title>All Photos - The LaSallian: From the Archives</title>
</head>

<body>
    <header class="subpage-header py-5">
        <div class="container">
            <a class="homepage-link d-inline-block mb-3 fst-italic" href="index.php">← Back to Homepage</a>
            <div class="d-flex align-items-center flex-column flex-md-row">
                <img class="me-md-4" src="images/old-tls-star.png" alt="">
                <h1 class="lh-1 m-0 text-white text-center text-md-start">
                    <span class="subpage-title fw-bold">All Photos</span><br/>
                    <span class="subpage-subtitle fs-4">From the Archives</span>
                </h1>
            </div>
        </div>
    </header>

    <main class="photos py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3" data-masonry='{"percentPosition": true }'>
            <!-- Loop to Display All Archived Photos -->
            <?php
                $allPhotos = json_decode(file_get_contents("https://github.com/ronnparcia/tls-fta-scans/blob/main/all-photos.json?raw=true"), true);
                foreach ($allPhotos as $photo):
                         $date = $photo["date"];
                         $caption = $photo["caption"];
                         $imageURL = $photo["image-url"];
            ?>
    
                <!-- Display Archived Photo -->
                <div class="col-sm-6 col-lg-3 col-md-4 mb-2">
                    <!-- Card -->
                    <div class="gallery-card border-0 rounded-0 p-3">
                        <!-- Archived Photo -->
                        <img src="<?php echo $imageURL; ?>" class="gallery-card-img card-img-top rounded-0 w-100" alt="..." loading="lazy">
                        <!-- Caption -->
                        <div class="gallery-card-body mt-4">
                            <h5 class="gallery-card-date text-center"><strong><?php echo $date; ?></strong></h5>
                            <p class="gallery-card-text text-center"><?php echo $caption; ?></p>
                        </div>
                        <a href="<?php echo $imageURL; ?>" target="_blank" class="stretched-link"></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

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
                    <p class="footer-link-main-site"><a href="https://thelasallian.com"><strong>Go to Main Website ></strong></a></p>
                    <!-- Website Developers -->
                    <p class="footer-developers"><strong>Website by Angelo Guerra & Ronn Parcia</strong></p>
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