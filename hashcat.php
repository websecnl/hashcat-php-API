<?php
$wordlist = basename($_GET['wordlist']).PHP_EOL;
$rule = basename($_GET['rule']).PHP_EOL;
$hash = $_GET['hash'];
$hashcat = system("hashcat -m 1000 '" . escapeshellarg($_GET["hash"]) . "' " . escapeshellarg($_GET["wordlist"]) . " -r " . escapeshellarg($_GET["rule"]) . " -O");
sleep(5);
echo $hashcat;
?>
