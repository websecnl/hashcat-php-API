<?php
$wordlist = $_GET['wordlist']);
$rule = $_GET['rule']);
$hash = $_GET['hash'];

trim($hash,"stdout");
trim($hash,"-");
trim($hash,"%2d");

$hashcat = system("hashcat -m 1000 '" . escapeshellarg($_GET["hash"]) . "' " . escapeshellarg($_GET["wordlist"]) . " -r " . escapeshellarg($_GET["rule"]) . " -O");
sleep(5);
echo $hashcat;
?>
