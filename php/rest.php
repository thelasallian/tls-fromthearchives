<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
        $_SESSION["TIME_ACCESSED"] = time();
        $_SESSION["ARTICLE_INFO"] = fetchInfo("https://thelasallian.com/wp-json/wp/v2/posts?_fields=jetpack_featured_media_url,date,link,title,authors&tags=2115&orderby=modified");
    } else if(session_status() == PHP_SESSION_ACTIVE){
        $dateInitiallyAccessed = new DateTime($_SESSION["TIME_ACCESSED"]);
        $dateNow = new DateTime(time());
        $difference = date_diff($dateInitiallyAccessed, $dateNow);
        // TODO: WRITE TIME CHECKER FUNCTION
    }
?>

<?php 

/**
 * 
 * 
 * @param string URL of the request 
 * @param string Request required. Defaults to GET.
 * @return assoc_array Returns a JSON santiized associative array of the API.
 */
function fetchInfo($url, $httpReq = 'GET'){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $httpReq,
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response, true);
}