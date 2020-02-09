<?php

class Song
{
  public $title ="";
  public $link ="";
  public $name ="";
	//public $data ="";

    public function __construct($title,$link,$name)
    {
    //$this->name->title= $title;
	$this->title = $title;
    $this->link = $link;
	$this->name = $name;
	//$this->data = $data;
    }
}

$test = array();
//$json = file_get_contents("https://api.deezer.com/search/'".$_POST["cat"]."'?q='".$_POST["query"]"'");
$json = file_get_contents('https://api.deezer.com/playlist/1111143121');
//$json = file_get_contents('https://api.deezer.com/search/track?q=kokain');
$array = json_decode($json);
$songlist = array();
foreach ($array->tracks->data as $song) {
//echo("<p onclick='open('".$song->link."')' test='" .$song->link ."'>". $song->name."</p></br>");
$test[] = new Song($song->title,$song->link,$song->artist->name);
}
echo(json_encode($test));
?>
