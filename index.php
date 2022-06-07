<!doctype html>
<html lang="en">
<head>
    <!-- Execute php rest script -->    
    <?php require_once("php/rest.php")?>
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
    <h1>Hello, world!</h1> <!-- Temporary -->

    <section class="articles">
        <div class="container">
            <div class="row" data-masonry='{"percentPosition": true }'>
                <?php for ($i = 1; $i < 9; $i++) { 
                    $data = $_SESSION["ARTICLE_INFO"];

                    $date = $data[$i]["date"];
                    $link = $data[$i]["link"];
                    $title = $data[$i]["title"]["rendered"];

                    for ($j = 0; $j < 3; $j++) {
                        if ($j == 0) {
                            $authors .= $data[$i]["authors"][$j]["display_name"];
                        } else if ($j > 0 && !empty($data[$i]["authors"][$j]["display_name"]) ) {
                            $authors .= ", ";
                            $authors .= $data[$i]["authors"][$j]["display_name"];
                        }
                    }

                    $media = $data[$i]["jetpack_featured_media_url"];
                ?>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <!-- Display Article Card -->
                        <a href="<?php echo $link; ?>" target="_blank">
                            <div class="card">
                                <img src="<?php echo $media; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $title; ?></h5>
                                    <p class="card-text"><?php echo $authors; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-4">
                        <!-- Display Image -->
                        <div class="card">
                            <img src="https://designshack.net/wp-content/uploads/placehold.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">January 1, 2001. Lorem ipsum dolor sit caption.</p>
                            </div>
                        </div>
                    </div>
                    
                <?php $authors = ""; } ?>
            </div>
        </div>
    </section>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Masonry -->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
</body>
</html>
