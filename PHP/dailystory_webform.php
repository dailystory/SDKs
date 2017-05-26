<?php
// ┌─────────────────────────────────────────
// │ DailyStory PHP WebForm | version 1.0 | May 2017														
// ├─────────────────────────────────────────
// │ Copyright © 2017 DailyStory (https://www.dailystory.com)           									
// ├─────────────────────────────────────────
// │ This PHP class enabled PHP developers to create
// │ web forms using the DailyStory API
// │ Documentation: https://docs.dailystory.com/sdk/php#dailystory-web-forms
// └─────────────────────────────────────────
class DailyStoryWebForm
{
	private $siteId = '';
	private $dataCenter = 'us-1';
	
	/* Get the post data array
	********************************************************************************/
	function renderWebForm($siteId, $webFormId) {
		
		// do we have a data center id	
		if (strpos($siteId, '-') !== false) {
			$pos = strpos($siteId, '-');
			$this->siteId = substr($siteId,0,$pos);
			$this->dataCenter = substr($siteId,$pos + 1);
		} else {
			$this->siteId = $siteId;	
		}
		
		// get the contents
		return $this->get_content('https://cms-1.dailystory.com/webform/' . $siteId . '/' . $webFormId,24);
	}
	
	/* Adds caching logic to webform retrieval
	********************************************************************************/
	function get_content($url,$hours = 24,$fn = '',$fn_args = '') {
		$refresh = false;
		
		// hash url to unqiue string
		$file = hash('ripemd160', $url) . '.txt';

		$current_time = time(); $expire_time = $hours * 60 * 60; $file_time = filemtime($file);

		// skip file cache?
		if ($_GET['__dsCache'] == 'refresh') {
			$refresh = true;
		}
		
		if(file_exists($file) && ($current_time - $expire_time < $file_time) && (!$refresh)) {
			//echo 'returning from cached file';
			return file_get_contents($file);
		}
		else {
			list($content, $cc_error)  = self::get_data($url);
			
			if($fn) { $content = $fn($content,$fn_args); }
				$content.= '<!-- cached:  '.time().'-->';
				file_put_contents($file,$content);
				//echo 'retrieved fresh from '.$url.':: '.$content;
				return $content;
		}
}
	
	// ──────────────────────────────────────────────
	// Returns the body content from a URL
	//
	// TODO: this is a candidate to move into the common function library
	// ──────────────────────────────────────────────
	public static function get_data($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, 0);
		$cc_result = curl_exec($ch);
		if (curl_errno($ch) || curl_error($ch)) {
			$cc_error = curl_errno($ch) . ": " . curl_error($ch);
		}
		curl_close($ch);
		return(array($cc_result, $cc_error));
	} // end get_data function	
}

?>