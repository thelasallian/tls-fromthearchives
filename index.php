<!doctype html>
<html lang="en">
<head>
    <!-- Execute php rest script -->    
    <?php require_once("php/rest.php")?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" rel="stylesheet" href="styles/style.css">

    <!-- Title -->
    <title>The LaSallian: From the Archives</title>

    <!-- TODO: Add Favicon -->
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
                    $media = $data[$i]["jetpack_featured_media_url"];

                    // Determine authors:
                    for ($j = 0; $j < 3; $j++) {
                        if ($j == 0) {
                            $authors .= $data[$i]["authors"][$j]["display_name"];
                        } else if ($j > 0 && !empty($data[$i]["authors"][$j]["display_name"]) ) {
                            $authors .= ", ";
                            $authors .= $data[$i]["authors"][$j]["display_name"];
                        }
                    }
                    
                    // Determine category/writing section:
                    $k = 0;
                    while ($data[$i]["categories"][$k] == 11) { // 11 == "Archives" category
                        $k += 1;
                    }
                    $category = $data[$i]["categories"][$k];

                    switch ($category) {
                        case 1891:
                            $category = "Editorial";
                            break;
                        case 8:
                            $category = "Menagarie";
                            break;
                        case 5:
                            $category = "Opinion";
                            break;
                        case 6:
                            $category = "Sports";
                            break;
                        case 4:
                            $category = "University";
                            break;
                        case 1883:
                            $category = "Vanguard";
                            break;
                        default:
                            $category = "Uncategorized";
                            break;
                    }
                ?>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <!-- Display Article Card -->
                        <a href="<?php echo $link; ?>" target="_blank">
                            <div class="card border-0 rounded-0">
                                <img src="<?php echo $media; ?>" class="card-img-top border-0 rounded-0" alt="...">
                                <div class="card-body p-4">
                                    <p class="card-text"><?php echo $category?></p>
                                    <h4 class="card-title fw-bold"><?php echo $title; ?></h4>
                                    <div class="card-byline">
                                        <img src="../images/quill.png" alt="">
                                        <p class="card-text fw-bold mb-0"><?php echo $authors; ?></p>
                                        <p class="card-text card-author"><?php echo date('M d Y', strtotime($date)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-4">
                        <!-- Display Image -->
                        <div class="card border-0 rounded-0 p-3">
                            <img src="https://designshack.net/wp-content/uploads/placehold.jpg" class="card-img-top" alt="...">
                            <div class="card-body mt-3 p-0">
                                <p class="card-text">January 1, 2001. Lorem ipsum dolor sit caption.</p>
                            </div>
                        </div>
                    </div>
                    
                <?php $authors = ""; } ?> <!-- for loop closing brace -->
            </div>
        </div>
    </section>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Masonry -->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
</body>
</html>
