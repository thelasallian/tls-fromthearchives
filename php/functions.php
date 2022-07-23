<?php

/**
 * getArticleInfo gets the date, link, title, visual, authors, and category of an article.
 *
 * @param $articles - Array of articles from Wordpress.
 * @param $i - Index of the article being searched for info.
 * @param $date - Date of the article
 * @param $link - URL of the article
 * @param $title - Title of the article
 * @param $authors - Author/s of the article
 * @param $category - Writing section/category of the article
 */
function getArticleInfo($articles, $i,
                        &$date, &$link, &$title,
                        &$visual, &$authors, &$category, &$excerpt)
{
    $date = $articles[$i]["date"]; // Article date
    $link = $articles[$i]["link"]; // Article URL
    $title = $articles[$i]["title"]["rendered"]; // Article title
    $visual = $articles[$i]["jetpack_featured_media_url"]; // Article visual
    $excerpt = $excerpt[$i]["excerpt"]["rendered"]; // Article excerpt

    getAuthors($articles, $i, $authors);
    getCategory($articles, $i, $category);
}

/**
 * getAuthors gets all the authors of an article.
 * 
 * This function searches the "authors" array and appends each author found to $authors
 *
 * @param $articles - Array of articles from Wordpress.
 * @param $i - Index of the article being searched for info.
 * @param $authors - Author/s of the article
 */
function getAuthors($articles, $i, &$authors)
{
    $authors = ""; // Reset authors to avoid succeeding article cards from appending previous articles' author/s
    $j = 0;
    do {
        $authors .= $articles[$i]["authors"][$j]["display_name"];
        $j++;
        if (!empty($articles[$i]["authors"][$j]["display_name"])) {
            $authors .= ", ";
        }
    } while (!empty($articles[$i]["authors"][$j]["display_name"]));
}

/**
 * getCategory gets  the category of an article.
 * 
 * This function searches the "categories" array. It skips the "Archives" category until
 * it finds the writing section. Then it converts the category id to the category name.
 *
 * @param $articles - Array of articles from Wordpress.
 * @param $i - Index of the article being searched for info.
 * @param $category - Writing section/category of the article
 */
function getCategory($articles, $i, &$category)
{
    $j = 0;
    while ($articles[$i]["categories"][$j] == 11) { // 11 == "Archives" category
        $j++; // Skip "Archives" category
    }
    $category = $articles[$i]["categories"][$j];

    // Convert category id to category name
    switch ($category) {
        case 1891:
            $category = "Editorial";
            break;
        case 8:
            $category = "Menagerie";
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
}

/**
 * getArchivedPhotos gets the link and caption of a photo.
 *
 * @param $articles - Array of archived photos.
 * @param $i - Index of the photo being searched for info.
 * @param $imageURL - Link to where the photo is hosted.
 * @param $caption - Caption of the photo.
 */
function getArchivedPhotos($photos, $i, &$imageURL, &$caption)
{
    $imageURL = $photos[$i]["image-url"];
    $caption = $photos[$i]["caption"];
}

?>