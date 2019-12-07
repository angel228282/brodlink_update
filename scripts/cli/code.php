<?php
echo("codelist!");
function clean($string) {
   $string = str_replace(' ', '-', $string);
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
   $string = str_replace('--', '-', $string);
   return $string; }
$json = file_get_contents("http://192.168.149:9876/codes");
$json_de = json_decode($json,true);


foreach ($json_de as $data) {
 print $data["code"]." name:".clean($data["displayName"])."<br>";
 $myfile = fopen(clean($data["displayName"]), "x+");
 $txt = $data["code"];
 fwrite($myfile, $txt);
 fclose($myfile);
}


?>
