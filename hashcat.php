<?php
$wordlist = $_GET['wordlist'];
$rule = $_GET['rule'];
$hash = $_GET['hash'];
$hashcat = system("hashcat -m 1000 '" . escapeshellarg($_GET["hash"]) . "' " . escapeshellarg($_GET["wordlist"]) . " -r " . escapeshellarg($_GET["rule"]) . " -O");
echo $hashcat;
?>
