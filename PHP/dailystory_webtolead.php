<?php
// ┌─────────────────────────────────────────
// │ DailyStory PHP WebToLead | version 1.1 | Feb 2017														
// ├─────────────────────────────────────────
// │ Copyright © 2017 DailyStory (http://dailystory.com)           									
// ├─────────────────────────────────────────
// │ This PHP class enabled PHP developers to create
// │ new leads in DailyStory using the REST API
// └─────────────────────────────────────────
class DailyStory
{
	private $post_data = array();
	private $orgId = '';
	
	/* Constructor
	********************************************************************************/
	function __construct($id) {
		$this->orgId = $id;	
		$this->setPostData('dsId', str_replace('-', '', $_COOKIE['_ds']) );
		$this->setPostData('ip', $_SERVER['REMOTE_ADDR']);

		// Process HTTP post array
		foreach($_POST as $key => $val) {

			// Handle any special cases
			switch ($key) {
    			case "organization":
    				$this->setPostData('company', $val);
        			break;
			    default:
					$this->setPostData($key, $val);
			}

		}
	}
	
	/* Get the post data array
	********************************************************************************/
	function getPostData($name) {
		return $this->post_data[$name];
	}

	/* Set properties
	********************************************************************************/
	public function setLeadSource($val) { $this->setPostData('source', $val); }
	public function setCampaignId($val) { $this->setPostData('campaignid', $val); }
	
	/* Add to the post data array that will be sent to DailyStory
	********************************************************************************/
	public function setPostData($name, $val) {
		$val = $this->clean($val);
		$this->post_data[$name] = $val;
	}
	
	/* clean form input data
	********************************************************************************/
	function clean($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	/* Used for Http Redirect
	********************************************************************************/
	function redirect($url, $statusCode = 307) {
		header('Location: ' . $url, true, $statusCode);
		die();
	}
	
	/* DailyStory HTTP POST submission
	********************************************************************************/
	public function submit() {
		$dest = 'https://app.dailystory.com/API/Public/WebToLead/' . $this->orgId;
		
		$post_data_string = '';
		foreach ($this->post_data as $k => $v) {
			$post_data_string .= $k . "=" . urlencode($v) . "&";
		}
  
		$post_data_string = substr($post_data_string, 0, (strlen($post_data_string) - 1));		
		
		// Submit the form via CURL to avoid exposing our Salesforce OID.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $dest);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data_string);
		$cc_result = curl_exec($ch);
		if (curl_errno($ch) || curl_error($ch)) {
			$cc_error = curl_errno($ch) . ": " . curl_error($ch);
		}
		curl_close($ch);

		return(array($cc_result, $cc_error));
	}
	
}
?>