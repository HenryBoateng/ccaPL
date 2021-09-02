<!doctype html>
<?php
$language = strtolower($_POST["language"]);
$code = $_POST["code"];

$random = substr(md5(mt_rand()), 0, 7); /* random variable*/
$filePath = "/Applications/MAMP/htdocs/work/ui/temp/" . $random . "." . $language;  /*filepath variable for finding the newly generated code*/
$ccaJFP = "java -jar /Applications/MAMP/htdocs/work/ui/temp/ccaPL6.jar"; //ccapl6 execution
$dot ='export PATH=$PATH:/usr/local/bin; dot 2>&1'; /* allowing me to use the dot application from the graphviz
tool which changes files from terminal command*/
$programFile = fopen($filePath, "w");
$src = '/Applications/MAMP/htdocs/work/ui/temp/'; /* src variable, allows me to locate the temp folder */
fwrite($programFile, $code);
fclose($programFile);

error_reporting(E_ALL);
ini_set("display_errors", "1");

if ($language == "cca") {
    $output = shell_exec(
        "$ccaJFP -e $filePath 2>&1"
    );
    $split = preg_split('/(\d+\.)/', $output);
preg_match_all('/(\d+\.)/', $output, $matches); //regex to reformat output
$count = 0;
foreach ($split as $s) {
   echo $s;
   echo "<br>";
   if (isset($matches[0][$count])) {
      echo $matches[0][$count];
      $count++;
   }
}
} /* this turns the dot files into pdf files using the dot variable
and only gets one cca file */

if ($language == "ccag") {
  exec(
    "$ccaJFP -g $filePath  && $dot  -Tpdf /Applications/MAMP/htdocs/work/ui/temp/$random.dot -o  /Applications/MAMP/htdocs/work/ui/temp/$random.pdf 2>&1"
  ); /*this turns the dot files into pdf files using the dot variable
  and gets three files ccag, dot and pdf */

if (empty($code)){
  throw new Exception('no user input.. try again');
  return 1;
}

}
/*if ($language == "ccagx") {
  exec(
    "$ccaJFP -gx $filePath  && $dot  -Tpdf /Applications/MAMP/htdocs/work/ui/temp/$random"."_0.dot -o /Applications/MAMP/htdocs/work/ui/temp/$random"."_0.pdf 2>&1"
  );
} */ /*commented out 2graph : communication graph*/

if ($language == "ccagx") {
  exec(
    "$ccaJFP -gx $filePath  && $dot  -Tpdf /Applications/MAMP/htdocs/work/ui/temp/$random"."_1.dot -o /Applications/MAMP/htdocs/work/ui/temp/$random"."_1.pdf 2>&1"
  );
}

?>
<?php if($language == "ccag") : ?>
    <img src ='<?php $src ?> temp/<?php echo $random ?>.pdf' alt= 'communication graph output'/>
<?php endif; ?>

<?php /*if($language == "ccagx") : ?>
    <img src ='<?php $src ?> temp/<?php echo $random?>_0.pdf' alt= 'communication graph output'/>
<?php endif; */ ?>

<?php if($language == "ccagx") : ?>
    <img src ='<?php $src ?> temp/<?php echo $random?>_1.pdf' alt= 'behaviour graph output'/>
<?php endif; ?>
