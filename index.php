

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function($){
    	$("input#sButton").click(function(){
    		var resultDiv = $("div#searchResults");
    		resultDiv.html('<img src="loader.gif" alt="loading" />');
    	    $.post("get_results.php",
            {
                searchString: $("input#searchString").val()
            },
            function(data,status){
                
                if(status=='success')
                {
                	resultDiv.html(data);
                }
                else
                {
                    resultDiv.html('Technical Error! :(');
                }
                
            });
    	});
    	$("input#searchString").keypress(function(e) {
    		if(e.which == 13) {
    		$("input#sButton").click();
    		}
		});
    });
    </script>
    </head>
    <body>

    Hi there, <br><br>

    <b> Enter Songname / Lyrics or whatever.. </b><br>
    <br> <input type="text" name="searchString" id="searchString" />
    <input id="sButton" type="button" name="msubmit" value="Search" />
    <br>
    <div id="searchResults" align="center"></div>
    <br>
    <a class="github-button" href="https://github.com/sukeesh/Music-Downloader" data-icon="octicon-star" data-style="mega" data-count-href="/sukeesh/Music-Downloader/stargazers" data-count-api="/repos/sukeesh/Music-Downloader#stargazers_count"     data-count-aria-label="# stargazers on GitHub" aria-label="Star sukeesh/Music-Downloader on GitHub">Star</a> <br>

    &copy; <a href="http://www.sukeesh.me/">Sukeesh</a>


    <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>

</html>