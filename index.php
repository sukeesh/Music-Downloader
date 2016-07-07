<?php
    
    $flag = 0;
    
    if(isset($_POST['msubmit']) && $_POST['msubmit'] != ''){
        $searchString   = $_POST['searchString'];
        $correctString  = str_replace(" ","+",$searchString);
        $youtubeUrl     = "https://www.youtube.com/results?search_query=". $correctString;
        $getHTML        = file_get_contents($youtubeUrl);
        $pattern        = '/<a href="\/watch\?v=(.*?)"/i';

        if(preg_match($pattern, $getHTML, $match)){
            $videoID    = $match[1];
        }
        else{
            echo "Something went wrong!";
            exit;
        }
        $flag = 1;
    }

?>

<!DOCTYPE HTML>
<html>
    <head>
            

    <title>Sukeesh || Music Downloader </title>
    
    <link rel="shortcut icon" href="music.png" type="image/x-icon" />
    <link href="//www.w3resource.com/includes/bootstrap.css" rel="stylesheet">  
    
    <style type="text/css">  
        
        body{
            margin-top: 40px;
            margin-left: 40px;
            text-align: center;
        }

    </style>
    
    </head>
    <body>

    Hi there, <br> <br> <br>

    <form method="post" action="index.php" accept-charset="utf-8">
        <b> Enter Songname / Lyrics or whatever.. </b><br>
        <br> <input type="text" name="searchString" />
        <input type="submit" name="msubmit" value="Search" />
    </form>

    <?php 
        if ($flag == 1){
            echo '<iframe style="width:230px;height:60px;border:0;overflow:hidden;" scrolling="no" src="//www.youtubeinmp3.com/widget/button/?video=https://www.youtube.com/watch?v='. $videoID .'"&color=c91818>';
            $flag = 0;
        }
    ?>

    <a class="github-button" href="https://github.com/sukeesh/Music-Downloader" data-icon="octicon-star" data-style="mega" data-count-href="/sukeesh/Music-Downloader/stargazers" data-count-api="/repos/sukeesh/Music-Downloader#stargazers_count"     data-count-aria-label="# stargazers on GitHub" aria-label="Star sukeesh/Music-Downloader on GitHub">Star</a> <br>

    &copy; <a href="http://www.sukeesh.me/">Sukeesh</a>


    <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>

</html>