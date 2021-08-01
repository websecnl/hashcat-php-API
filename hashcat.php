<?php
$wordlist = $_GET['wordlist'];
$rule = $_GET['rule'];
$hash = $_GET['hash'];

// Yes yes I know, this is still not safe, but its better than nothing.
trim($hash,"stdout");
trim($hash,"%73%74%64%6f%75%74");
trim($wordlist,"../");

$hashcat = system("hashcat -m 1000 '" . escapeshellarg($_GET["hash"]) . "' " . escapeshellarg($_GET["wordlist"]) . " -r " . escapeshellarg($_GET["rule"]) . " -O");
sleep(5);
echo $hashcat;
?>
