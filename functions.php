<?php

require_once('vendor/autoload.php');

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
	$servers = json_decode(file_get_contents( __DIR__.'/new-php-whois/src/Phois/Whois/whois.servers.json' ), true);
	$servers['рф'] = 'xn--p1ai';
	unset($severs['xn--p1ai']);

	$whois = new Whois();
	$whois->DATA['xn--p1ai'] = 'ru';

	// Set to true if you want to allow proxy requests
	$allowproxy = true;

	// get faster but less acurate results
	// $whois->deep_whois = empty($_GET['fast']);
	$whois->deep_whois = false;

	foreach ($servers as $key => $server) {
		if (preg_match("/^https?:\/\//i", $server[0])) {
			$server[0] = $server[0] . '{domain}'. '.' . $key;
		}
		$whois->UseServer($key, $server[0]);
	}

	// Comment the following line to disable support for non ICANN tld's
	$whois->non_icann = true;

	$whoisArray = $whois->Lookup($query_value);

	if (isset($whoisArray['rawdata'])) {
		$whoisArray['rawdata'] = implode("\n", $whoisArray['rawdata']);
	}

	return $whoisArray;
}

function findMainHost($host) {
	$servers = json_decode(file_get_contents( __DIR__.'/new-php-whois/src/Phois/Whois/whois.servers.json' ), true);
	$servers['рф'] = 'xn--p1ai';
	unset($severs['xn--p1ai']);
	$domains = explode('.', $host);

	if (count($domains) < 2)
		return null;

	$found = '';
	for ($i = count($domains) - 1; $i > 0; $i--) {
		$test = implode('.', array_slice($domains, $i));
		if (isset($servers[$test]))
			$found = $test;
	}

	if (!$found)
		return null;
	$host = substr($host, 0, - (strlen($found) + 1));
	return array_pop(explode('.', $host)) . '.' . $found;
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
	$response = getRemoteContent($service . '?' . http_build_query($params));
	if ($response) {
		$result = json_decode($response);
	}

	if (isset($result->screenshot)) {
		$result->screenshot->data = str_replace(array('_', '-'), array('/', '+'), $result->screenshot->data);
	}
	return $result;
}

function getRemoteContent($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if (curl_error($ch) || $status != 200) {
		return false;
	}
	return $response;
}

function getAbsoluteURL($source_url, $relative_url)
{
	$url_parts = parse_url($relative_url);
	return http_build_url($source_url, $url_parts, HTTP_URL_JOIN_PATH);
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
		return array('error' => curl_error($ch));
	} else {
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header_raw = substr($response, 0, $header_size);
		$headers = http_parse_headers($header_raw);

		$favUrl = '/favicon.ico';

		$body = substr($response, $header_size);
		$dom = new DOMDocument();
		if (@$dom->loadHTML($body)) {
			$links = $dom->getElementsByTagName('link');
			foreach ($links as $link) {
				$rel = $link->getAttribute('rel');
				if ($rel and strpos($rel, 'shortcut') !== false) {
					$linkUrl = $link->getAttribute('href');
					if ($linkUrl) {
						$favUrl = $linkUrl;
					}
				}
			}
		}

		$favUrl = getAbsoluteURL($url, $favUrl);

		$favicon = getRemoteContent($favUrl);
		if (!$favicon)
			$favUrl = false;
	}
	curl_close($ch);
	return array('status' => $status, 'headers' => $headers, 'favicon' => $favUrl);
}

function getDnsRecords($host) {
	// PHP гавно
	$records = @dns_get_record($host, DNS_A + DNS_MX + DNS_NS);
	$result = array();
	if ($records) {
		foreach ($records as $record) {
			$result[$record['type']][] = $record;
		}
	}
	return $result;
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

if (!function_exists('http_build_url'))
{
	define('HTTP_URL_REPLACE', 1);              // Replace every part of the first URL when there's one of the second URL
	define('HTTP_URL_JOIN_PATH', 2);            // Join relative paths
	define('HTTP_URL_JOIN_QUERY', 4);           // Join query strings
	define('HTTP_URL_STRIP_USER', 8);           // Strip any user authentication information
	define('HTTP_URL_STRIP_PASS', 16);          // Strip any password authentication information
	define('HTTP_URL_STRIP_AUTH', 32);          // Strip any authentication information
	define('HTTP_URL_STRIP_PORT', 64);          // Strip explicit port numbers
	define('HTTP_URL_STRIP_PATH', 128);         // Strip complete path
	define('HTTP_URL_STRIP_QUERY', 256);        // Strip query string
	define('HTTP_URL_STRIP_FRAGMENT', 512);     // Strip any fragments (#identifier)
	define('HTTP_URL_STRIP_ALL', 1024);         // Strip anything but scheme and host

	// Build an URL
	// The parts of the second URL will be merged into the first according to the flags argument. 
	// 
	// @param   mixed           (Part(s) of) an URL in form of a string or associative array like parse_url() returns
	// @param   mixed           Same as the first argument
	// @param   int             A bitmask of binary or'ed HTTP_URL constants (Optional)HTTP_URL_REPLACE is the default
	// @param   array           If set, it will be filled with the parts of the composed url like parse_url() would return 
	function http_build_url($url, $parts=array(), $flags=HTTP_URL_REPLACE, &$new_url=false)
	{
		$keys = array('user','pass','port','path','query','fragment');

		// HTTP_URL_STRIP_ALL becomes all the HTTP_URL_STRIP_Xs
		if ($flags & HTTP_URL_STRIP_ALL)
		{
			$flags |= HTTP_URL_STRIP_USER;
			$flags |= HTTP_URL_STRIP_PASS;
			$flags |= HTTP_URL_STRIP_PORT;
			$flags |= HTTP_URL_STRIP_PATH;
			$flags |= HTTP_URL_STRIP_QUERY;
			$flags |= HTTP_URL_STRIP_FRAGMENT;
		}
		// HTTP_URL_STRIP_AUTH becomes HTTP_URL_STRIP_USER and HTTP_URL_STRIP_PASS
		else if ($flags & HTTP_URL_STRIP_AUTH)
		{
			$flags |= HTTP_URL_STRIP_USER;
			$flags |= HTTP_URL_STRIP_PASS;
		}

		// Parse the original URL
		$parse_url = parse_url($url);

		// Scheme and Host are always replaced
		if (isset($parts['scheme']))
			$parse_url['scheme'] = $parts['scheme'];
		if (isset($parts['host']))
			$parse_url['host'] = $parts['host'];

		// (If applicable) Replace the original URL with it's new parts
		if ($flags & HTTP_URL_REPLACE)
		{
			foreach ($keys as $key)
			{
				if (isset($parts[$key]))
					$parse_url[$key] = $parts[$key];
			}
		}
		else
		{
			// Join the original URL path with the new path
			if (isset($parts['path']) && ($flags & HTTP_URL_JOIN_PATH))
			{
				if (isset($parse_url['path']))
					$parse_url['path'] = rtrim(str_replace(basename($parse_url['path']), '', $parse_url['path']), '/') . '/' . ltrim($parts['path'], '/');
				else
					$parse_url['path'] = $parts['path'];
			}

			// Join the original query string with the new query string
			if (isset($parts['query']) && ($flags & HTTP_URL_JOIN_QUERY))
			{
				if (isset($parse_url['query']))
					$parse_url['query'] .= '&' . $parts['query'];
				else
					$parse_url['query'] = $parts['query'];
			}
		}

		// Strips all the applicable sections of the URL
		// Note: Scheme and Host are never stripped
		foreach ($keys as $key)
		{
			if ($flags & (int)constant('HTTP_URL_STRIP_' . strtoupper($key)))
				unset($parse_url[$key]);
		}


		$new_url = $parse_url;

		return 
			 ((isset($parse_url['scheme'])) ? $parse_url['scheme'] . '://' : '')
			.((isset($parse_url['user'])) ? $parse_url['user'] . ((isset($parse_url['pass'])) ? ':' . $parse_url['pass'] : '') .'@' : '')
			.((isset($parse_url['host'])) ? $parse_url['host'] : '')
			.((isset($parse_url['port'])) ? ':' . $parse_url['port'] : '')
			.((isset($parse_url['path'])) ? $parse_url['path'] : '')
			.((isset($parse_url['query'])) ? '?' . $parse_url['query'] : '')
			.((isset($parse_url['fragment'])) ? '#' . $parse_url['fragment'] : '')
		;
	}
}
