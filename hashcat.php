<?php
$wordlist = basename($_GET['wordlist']);
$rule = basename($_GET['rule']);
$hash = $_GET['hash'];
$hashcat = system("hashcat -m 1000 '" . escapeshellarg($_GET["hash"]) . "' " . escapeshellarg($_GET["wordlist"]) . " -r " . escapeshellarg($_GET["rule"]) . " -O");
sleep(5);
echo $hashcat;
?>
