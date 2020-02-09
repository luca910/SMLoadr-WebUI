<?php

class Song
{
  public $name ="";
  public $url ="";
  public $title ="";

    public function __construct($name,$url,$title)
    {
    $this->name= $name;
    $this->url = $url;
	$this->title = $title;

    }
}

$test = array();
//$json = file_get_contents("https://api.deezer.com/search/'".$_POST["cat"]."'?q='".$_POST["query"]"'");
$json = file_get_contents('https://api.deezer.com/search/'.$_POST["query"]);
//$json = file_get_contents('https://api.deezer.com/search/track?q=kokain');
$array = json_decode($json);
$songlist = array();
foreach ($array->data as $song) {
//echo("<p onclick='open('".$song->link."')' test='" .$song->link ."'>". $song->name."</p></br>");
$test[] = new Song($song->name,$song->link,$song->title);
}
echo(json_encode($test));
?>
