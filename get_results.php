<?php
    $searchString = $_POST['searchString'];
    if(isset($searchString) && $searchString != ''){
        $youtubeUrl     = "https://www.youtube.com/results?search_query=". urlencode($searchString);
        $getHTML        = file_get_contents($youtubeUrl);
        $pattern        = '/<a href="\/watch\?v=(.*?)"/i';

        if(preg_match_all($pattern, $getHTML, $matches)){
            echo '<br><table id="results">';
            foreach ($matches[1] as $videoID) {
                
                $json = json_decode(file_get_contents("http://www.youtubeinmp3.com/fetch/?format=JSON&video=http://www.youtube.com/watch?v=".urlencode($videoID)),true);
                if(isset($json))
                    echo '<tr><td><a href="'.$json['link'].'">'.$json['title'].'</a></td><td>'.gmdate("i:s", $json['length']).'</td></tr>';
            }
            echo '</table>';
        }
        else{
            echo "Something went wrong!";
            exit;
        }
        
    }

?>