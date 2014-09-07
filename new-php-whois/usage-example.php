<?php

include('src/Phois/Whois/Whois.php');

$sld = 'xn--80aa6awi.xn--p1ai';

$domain = new Phois\Whois\Whois($sld);

$whois_answer = $domain->info();

echo '<pre>' . $whois_answer . '</pre>';
preg_match("/registrar\s*:\s*(\S+)/", $whois_answer, $matches);
echo '<b>pregmatch ---></b> ' . $matches[1] . '<br><b>end of pregmatch</b> <br>';
echo '<b>htmlInfo ---></b> ' . $domain->htmlInfo() . '<br><b>end of htmlInfo</b> <br>';
echo '<b>isAvailable ---></b> ' . $domain->isAvailable() . '<br><b>end of isAvailable</b> <br>';
echo '<b>getDomain ---></b> ' . $domain->getDomain() . '<br><b>end of getDomain</b> <br>';
echo '<b>getTLDs ---></b> ' . $domain->getTLDs() . '<br><b>end of getTLDs</b> <br>';
echo '<b>getSubDomain ---></b> ' . $domain->getSubDomain() . '<br><b>end of getSubDomain</b> <br>';

if ($domain->isAvailable()) {
    echo "Domain is available\n";
} else {
    echo "Domain is registered\n";
}
