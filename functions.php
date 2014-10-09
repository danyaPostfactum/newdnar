<?php

$TLDnames = Array('ru', 'su', 'com', 'xn--p1ai', 'net', 'org', 'biz', 'info', 'mobi', 'name', 'tv', 'in', 'mn', 'cc', 'ws', 'bz', 'asia', 'me', 'us', 'tel', 'kz');
$TLDprices = Array(
	'ru' => array('price' => 95), 'su' => array('price' => 400), 'com' => array('price' => 380), 'xn--p1ai' => array('price' => 100), 'net' => array('price' => 380), 'org' => array('price' => 380), 'biz' => array('price' => 380), 'info' => array('price' => 380), 'mobi' => array('price' => 800), 
	'name' => array('price' => 380), 'tv' => array('price' => 1400), 'in' => array('price' => 650), 'mn' => array('price' => 2000), 'cc' => array('price' => 1000), 'ws' => array('price' => 380), 'bz' => array('price' => 900), 'asia' => array('price' => 700), 'me' => array('price' => 1200),
	'us' => array('price' => 350), 'tel' => array('price' => 1650), 'kz' => array('price' => 560) 
);

function isXHR() {
	return isset( $_SERVER['HTTP_X_REQUESTED_WITH'] );
}

function is_valid_domain_name($domain_name) {
    return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) //valid chars check
            && preg_match("/^.{1,253}$/", $domain_name) //overall length check
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name)   ); //length of each label
}

function structure_domain_name($domain_name) {
	global $TLDnames;
	$domainArray = Array();
	$domain_name = strtolower($domain_name);
	foreach ($TLDnames as $TLD) {
		$check = "." . $TLD; // add dot before TLD name
		if ( substr($domain_name, 0 - strlen($check)) == $check ) {
			$domainArray["domain_name"] = substr($domain_name, 0, 0 - strlen($check));
			$domainArray["TLD"] = $check;
			$domainArray["TLDisset"] = true;
			return $domainArray; // strip from TLD
		}
	}
	$domainArray["domain_name"] = $domain_name;
	$domainArray["TLDisset"] = false;
	return $domainArray;
}

function phpWhois($query_value) { // using phpwhois script
	include_once('phpwhois/whois.main.php');
	// include_once('phpwhois/whois.utils.php');

	$whois = new Whois();

	// Set to true if you want to allow proxy requests
	$allowproxy = true;

 	// get faster but less acurate results
 	// $whois->deep_whois = empty($_GET['fast']);
 	$whois->deep_whois = false;
 	
 	// To use special whois servers (see README)
	//$whois->UseServer('uk','whois.nic.uk:1043?{hname} {ip} {query}');
	//$whois->UseServer('au','whois-check.ausregistry.net.au');

	// Comment the following line to disable support for non ICANN tld's
	$whois->non_icann = true;

	$whoisArray = $whois->Lookup($query_value);

	return $whoisArray;
}

function queryWhoIs($query_value) { // using reg.ru whois script
	include_once('new-php-whois/src/Phois/Whois/Whois.php');
	$whois_info_array = array();

	$whois_info = new Phois\Whois\Whois($query_value);
	$whois_answer = $whois_info->info();

	$whois_info_array['available'] = $whois_info->isAvailable();
	$whois_info_array['regyinfo'] = array();
	$whois_info_array['regyinfo']['raw'] = $whois_answer;
	$whois_info_array['domain'] = array(
			'name' => $whois_info->getDomain(),
			'tld' => $whois_info->getTLDs()
		);

	// regex for registrar info for RU/SU/RF
	$domain_TLD = $whois_info->getTLDs();
	$matches = false;
	if ($domain_TLD === "su" || $domain_TLD === "ru" || $domain_TLD === 'xn--p1ai') {
		preg_match("/registrar\s*:\s*(\S+)/", $whois_answer, $matches);
		if ($matches) {
			$whois_info_array['regyinfo']['registrar'] = $matches[1];
		}
	}


	return $whois_info_array;
}

function getDomainInfo($domain_name) {
	global $TLDprices;
	$domain_array = queryWhoIs($domain_name);

	// add price info to the resulting array:
	$dotPos = strrpos($domain_name, '.');
	$tld = substr($domain_name, $dotPos+1);
	$domain_array['domain_price'] = $TLDprices[$tld]['price'];
	return $domain_array;
}

function getAllDomains($domain_name) {
	// this function is not really used now *********
	global $TLDnames;
	$allWhois = array();
	foreach ($TLDnames as $TLD) {
		array_push($allWhois, getDomainInfo($domain_name . "." . $TLD));
	}
	return $allWhois;
}

function echoWhoisHtmlSpecs($whois) {
	// this function is not really used now *********
	$output = '';
	$output .= "<div class='col-sm-3'><ul class='list-group'><li class='list-group-item'>";
	$output .= "<strong>Домен:</strong> " . $whois['regrinfo']['domain']['name'];
	$output .= "</li>";
	$output .= "<li class='list-group-item'>";
	$output .= "<strong>Свободен:</strong> ";
	if ($whois['regrinfo']['registered'] != "yes") { $output .= "Да"; } else { $output .= "Нет"; }
	$output .= "</li></ul></div>";
	return $output;
}

function pageSpeed($url) {
	$service = 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed';
	$key = PAGESPEED_API_KEY;
	$locale = 'ru';

	$params = array('url' => $url, 'key' => $key, 'locale' => $locale, 'screenshot' => 'true');
	return getJSON($service, $params);
}

function getJSON($url, $params) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	return json_decode($response);
}

function getHttpInfo($url) {
	// curl session to get whois reposnse
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	$response = curl_exec($ch);

	if (curl_error($ch)) {
		return "Connection error!";
	} else {
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header_raw = substr($response, 0, $header_size);
		$headers = http_parse_headers($header_raw);
	}
	curl_close($ch);
	return array('status' => $status, 'headers' => $headers);
}

if (!function_exists('http_parse_headers'))
{
	function http_parse_headers($raw_headers)
	{
		$headers = array();
		$key = ''; // [+]

		foreach(explode("\n", $raw_headers) as $i => $h)
		{
			$h = explode(':', $h, 2);

			if (isset($h[1]))
			{
				if (!isset($headers[$h[0]]))
					$headers[$h[0]] = trim($h[1]);
				elseif (is_array($headers[$h[0]]))
				{
					// $tmp = array_merge($headers[$h[0]], array(trim($h[1]))); // [-]
					// $headers[$h[0]] = $tmp; // [-]
					$headers[$h[0]] = array_merge($headers[$h[0]], array(trim($h[1]))); // [+]
				}
				else
				{
					// $tmp = array_merge(array($headers[$h[0]]), array(trim($h[1]))); // [-]
					// $headers[$h[0]] = $tmp; // [-]
					$headers[$h[0]] = array_merge(array($headers[$h[0]]), array(trim($h[1]))); // [+]
				}

				$key = $h[0]; // [+]
			}
			else // [+]
			{ // [+]
				if (substr($h[0], 0, 1) == "\t") // [+]
					$headers[$key] .= "\r\n\t".trim($h[0]); // [+]
				elseif (!$key) // [+]
					$headers[0] = trim($h[0]);trim($h[0]); // [+]
			} // [+]
		}

		return $headers;
	}
}