<?php
$myfile = fopen("contats.csv", "r") or die("Unable to open file!");
$newfile = fopen("newlist.csv", "w") or die("Unable to open new file...");

while(!feof($myfile)) {
  $fullname = trim(fgets($myfile), " \t\n\r\"");
  $email = fgets($myfile);
  $lastname = substr($fullname, 0, strrpos($fullname,","));
  $firstname = substr($fullname, strrpos($fullname,",")+2);
  echo $firstname . "," . $lastname . "," . $email . "<br>";
  $record = "$firstname,$lastname,$email";
  fwrite($newfile, $record);
}
fclose($myfile);
fclose($newfile);
?>
