<?php
#Uncomented Funtions Ternary Operator:
//($your_boolean) ? 'This is returned if true' : 'This is returned if false';

// Format Dumped Data
function dump($data, $label='', $return = false) {

    $debug           = debug_backtrace();
    $callingFile     = $debug[0]['file'];
    $callingFileLine = $debug[0]['line'];
    
    ob_start();
    var_dump($data);
    $c = ob_get_contents();
    ob_end_clean();
    
    $c = preg_replace("/\r\n|\r/", "\n", $c);
    $c = str_replace("]=>\n", '] = ', $c);
    $c = preg_replace('/= {2,}/', '= ', $c);
    $c = preg_replace("/\[\"(.*?)\"\] = /i", "[$1] = ", $c);
    $c = preg_replace('/  /', "    ", $c);
    $c = preg_replace("/\"\"(.*?)\"/i", "\"$1\"", $c);
    $c = preg_replace("/(int|float)\(([0-9\.]+)\)/i", "$1() <span class=\"number\">$2</span>", $c);
    
    // Syntax Highlighting of Strings. This seems cryptic, but it will also allow non-terminated strings to get parsed.
    $c = preg_replace("/(\[[\w ]+\] = string\([0-9]+\) )\"(.*?)/sim", "$1<span class=\"string\">\"", $c);
    $c = preg_replace("/(\"\n{1,})( {0,}\})/sim", "$1</span>$2", $c);
    $c = preg_replace("/(\"\n{1,})( {0,}\[)/sim", "$1</span>$2", $c);
    $c = preg_replace("/(string\([0-9]+\) )\"(.*?)\"\n/sim", "$1<span class=\"string\">\"$2\"</span>\n", $c);
    
    $regex = array(
        // Numberrs
        'numbers' => array('/(^|] = )(array|float|int|string|resource|object\(.*\)|\&amp;object\(.*\))\(([0-9\.]+)\)/i', '$1$2(<span class="number">$3</span>)'),
        // Keywords
        'null' => array('/(^|] = )(null)/i', '$1<span class="keyword">$2</span>'),
        'bool' => array('/(bool)\((true|false)\)/i', '$1(<span class="keyword">$2</span>)'),
        // Types
        'types' => array('/(of type )\((.*)\)/i', '$1(<span class="type">$2</span>)'),
        // Objects
        'object' => array('/(object|\&amp;object)\(([\w]+)\)/i', '$1(<span class="object">$2</span>)'),
        // Function
        'function' => array('/(^|] = )(array|string|int|float|bool|resource|object|\&amp;object)\(/i', '$1<span class="function">$2</span>('),
    );
    
    foreach ($regex as $x) {
        $c = preg_replace($x[0], $x[1], $c);
    }
    
    $style = '
    /* outside div - it will float and match the screen */
    .dumpr {
        margin: 2px;
        padding: 2px;
        background-color: #fbfbfb;
        float: left;
        clear: both;
    }
    /* font size and family */
    .dumpr pre {
        color: #000000;
        font-size: 9pt;
        font-family: "Courier New",Courier,Monaco,monospace;
        margin: 0px;
        padding-top: 5px;
        padding-bottom: 7px;
        padding-left: 9px;
        padding-right: 9px;
    }
    /* inside div */
    .dumpr div {
        background-color: #fcfcfc;
        border: 1px solid #d9d9d9;
        float: left;
        clear: both;
    }
    /* syntax highlighting */
    .dumpr span.string {color: #c40000;}
    .dumpr span.number {color: #ff0000;}
    .dumpr span.keyword {color: #007200;}
    .dumpr span.function {color: #0000c4;}
    .dumpr span.object {color: #ac00ac;}
    .dumpr span.type {color: #0072c4;}
    ';
    
    $style = preg_replace("/ {2,}/", "", $style);
    $style = preg_replace("/\t|\r\n|\r|\n/", "", $style);
    $style = preg_replace("/\/\*.*?\*\//i", '', $style);
    $style = str_replace('}', '} ', $style);
    $style = str_replace(' {', '{', $style);
    $style = trim($style);
    
    $c = trim($c);
    $c = preg_replace("/\n<\/span>/", "</span>\n", $c);
    
    if ($label == ''){
        $line1 = '';
    } else {
        $line1 = "<strong>$label</strong> \n";
    }
    
    $out = "\n<!-- Dumpr Begin -->\n".
        "<style type=\"text/css\">".$style."</style>\n".
        "<div class=\"dumpr\">
        <div><pre>$line1 $callingFile : $callingFileLine \n$c\n</pre></div></div><div style=\"clear:both;\">&nbsp;</div>".
        "\n<!-- Dumpr End -->\n";
    if($return) {
        return $out;
    } else {
        echo $out;
    }
    }

//Redirect to URI
function redirect( $uri ){
    $uri = str_replace('.', '/', $uri);
    header('Location: ' . URLROOT . '/' . $uri);
    exit();
}

//Password Check Function
function check_password($password_post_by_user, $password_stored_in_database){
        $password_post_by_user = md5($password_post_by_user);
        if ($password_post_by_user === $password_stored_in_database){
            return true;
        }
        else {
            return false;
        }
}

//Browser Grabber
function get_the_browser()
{
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
   return 'explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false)
    return 'explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false)
   return 'firefox';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
   return 'chrome';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false)
   return "opera";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false)
   return "opera";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false)
   return "safari";
 else
   return 'other';
}

// Get Visitor IP Diffrent Mode
function get_visitor_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

//Get Visitor Country Code Based IP
function get_country_code_visitor($ip){
    $details = json_decode(file_get_contents('http://ipinfo.io/'.$ip));
    $code = $details->country;
    return $code;
}

function asset( $path ){
	return URLROOT . '/' . $path;
}

// $date : date to be formatted like : 01/23/2020 result will be : 2020-01-23
function date_convertor($date){
return date("Y-m-d", strtotime($date));

}


function redirect_back2url(){
	if(isset($_SERVER['HTTP_REFERER'])){
		header("Location:".$_SERVER['HTTP_REFERER']."");
		return true;
		exit();
	}
	else {
		return false;
		exit();
	}
    
}

function timeConverter($date){
$date = new DateTime($date);
return $date->format('d-m-Y');
}