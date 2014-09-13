<?php
$QUERY_STRING=$_SERVER['QUERY_STRING'];
if(isset($QUERY_STRING)){
$url=$QUERY_STRING;
$file=fopen("statistika.txt","r+");
$text = fread ($file, filesize("statistika.txt"));
if (strpos($text, $url) !== false){
preg_match ("#".quotemeta($url)." просмотров ([0-9]+) \\n#i", $text, $matches);
$matches[1] = $matches[1]+1;
$text = preg_replace("#(".quotemeta($url)." просмотров) ([0-9]+) (\\n)#i", "$1 $matches[1] $3", $text);
ftruncate($file, 0);         
rewind($file);
fputs ($file, $text);
} else {
fputs ($file, $url." просмотров 1 \n");
}
fclose($file);
}else{
exit("<div align='center' style='font-family:verdana;font-size:12pt;color:red;'>Здесь нет ничего интересного!</div><br>");
}
?>
<html>
<head>
<META http-equiv="Refresh" content="0; url=<?print $url;?>">
</head>
</html>  