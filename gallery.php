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
    
    <ol>
        <?php
        $allPhotos = json_decode(file_get_contents("https://github.com/ronnparcia/tls-fta-scans/blob/main/all-photos.json?raw=true"), true);
        foreach ($allPhotos as $photo):
            $date = $photo["date"];
            $caption = $photo["caption"];
            $imageURL = $photo["image-url"];
        ?>
            <li>
                <?php echo $date; ?><br/>
                <?php echo $caption; ?><br/>
                <?php echo $imageURL; ?>
            </li>
        <?php endforeach; ?>
    </ol>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Masonry -->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

</body>

</html>