<?php
// ┌─────────────────────────────────────────
// │ DailyStory PHP WebForm | version 1.0 | May 2017														
// ├─────────────────────────────────────────
// │ Copyright © 2017 DailyStory (http://dailystory.com)           									
// ├─────────────────────────────────────────
// │ This PHP class enabled PHP developers to create
// │ web forms using the DailyStory API
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
		list($cc_result, $cc_error) = self::get_data('https://cms-1.dailystory.com/webform/' . $siteId . '/' . $webFormId);
		
		return $cc_result;
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
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
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