<?php
/**
 * Hook GitHub Post-Receive 
 *
 * @copyright (c)2005-2011, WDT Media INC (http://wdtmedia.com)
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link http://github.com/jadb/hook-github-post-receive
 * @author jadb
 */

if (!array_key_exists('payload', $_POST))
	return;

extract(json_decode(stripslashes($_POST['payload']), true));

if (!isset($commits) || !is_array($commits))
	return;

foreach ($commits as $commit) {
	if (!array_key_exists('modified', $commit) || !is_array($commit['modified']))
		continue;

	foreach ($commit['modified'] as $path) {
		if (!preg_match('/VERSION/i', $path) || !preg_match('/([0-9]{1}\.[0-9]{1}\.[0-9]{1})/i', $commit['message'], $version))
			continue;

		if (!$fh = fopen('VERSION', 'w'))
			return;

		fwrite($fh, $version[0]);
		fclose($fh);
		exit;
	}
}