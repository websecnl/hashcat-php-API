<?php
$wordlist = realpath(dirname(__FILE__) . "/Wordlist/" . $_GET['wordlist']);
$rule = realpath(dirname(__FILE__) . "/rules/" . $_GET['rule']);
$hash = $_GET['hash'];

trim($hash,"stdout");

$safe_root_wordlist = dirname(__FILE__) . "/Wordlist/";
$safe_root_rules =  dirname(__FILE__) . "/rules/";

if (substr($wordlist, 0, strlen($safe_root_wordlist)) != $safe_root_wordlist) 
   die ("Possible wordlist directory traversal attack");
if (substr($name, 0, strlen($safe_root_rules)) != $safe_root_rules) 
   die ("Possible rules directory traversal attack");

$hashcat = system("hashcat -m 1000 '" . escapeshellarg($_GET["hash"]) . "' " . escapeshellarg($_GET["wordlist"]) . " -r " . escapeshellarg($_GET["rule"]) . " -O");
sleep(5);
echo $hashcat;
?>
