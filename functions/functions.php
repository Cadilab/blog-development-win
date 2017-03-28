<?php

// checking wether the user is logged in

function logged_in()
{
	if(isset($_SESSION['logged_in']))
		return true;
	else { false; }
}

// parsing bb code returning the value to store in the database.

function parsebb($body) 
{ 
    $find = array( 
        "@\n@", 
        "@[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]@is",  
        "/\[url\=(.+?)\](.+?)\[\/url\]/is", 
        "/\[b\](.+?)\[\/b\]/is",  
        "/\[i\](.+?)\[\/i\]/is",  
        "/\[u\](.+?)\[\/u\]/is",  
        "/\[color\=(.+?)\](.+?)\[\/color\]/is", 
        "/\[size\=(.+?)\](.+?)\[\/size\]/is",  
        "/\[font\=(.+?)\](.+?)\[\/font\]/is", 
        "/\[center\](.+?)\[\/center\]/is", 
        "/\[right\](.+?)\[\/right\]/is", 
        "/\[left\](.+?)\[\/left\]/is", 
        "/\[img\](.+?)\[\/img\]/is", 
        "/\[email\](.+?)\[\/email\]/is" 
    ); 
    $replace = array( 
        "<br />", 
        "<a href=\"\\0\">\\0</a>", 
        "<a href=\"$1\" target=\"_blank\">$2</a>", 
        "<strong>$1</strong>", 
        "<em>$1</em>", 
        "<span style=\"text-decoration:underline;\">$1</span>", 
        "<font color=\"$1\">$2</font>", 
        "<font size=\"$1\">$2</font>", 
        "<span style=\"font-family: $1\">$2</span>", 
        "<div style=\"text-align:center;\">$1</div>", 
        "<div style=\"text-align:right;\">$1</div>", 
        "<div style=\"text-align:left;\">$1</div>", 
        "<img src=\"$1\" alt=\"Image\" />", 
        "<a href=\"mailto:$1\" target=\"_blank\">$1</a>" 
    ); 
    $body = htmlspecialchars($body); 
    $body = preg_replace($find, $replace, $body); 
    return $body; 
}

?>