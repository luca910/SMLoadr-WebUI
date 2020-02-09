<!--by Rampage and RedStonePowerCrafter-->
<html lang="de" dir="ltr">
<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"><!--Anpassung der Breite für Mobil-Geräte-->
		<meta charset="utf-8">
		<meta name="theme-color" content="#697278">
		<title>
			DEEZL - EXEC
		</title>
		<link href="index.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
function get_title($url){
  $str = file_get_contents($url);
  if(strlen($str)>0){
    $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
    preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
   // $title = str_replace("- Auf Deezer Anhören", "", $title)
    return $title[1];
  }
}

$link = $_POST["url"];
shell_exec("sudo /var/www/html/sml/SMLOADR/exec.sh '".$link."'");
echo "Lade herunter: ";
echo get_title("$link");

?>
<embed src="https://192-168-10-5.eabce2fd7f49495a8886a49ed5cc4784.plex.direct:32400/library/sections/2/refresh?X-Plex-Token=kJpupfoqBzT8L7micuAs" height="0" title="Refreshing Plex...">

</body>
</html>