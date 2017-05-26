# DailyStory SDK for PHP
The files and examples here demonstrate how to integrate DailyStory into your PHP application. Documentation is available at [https://docs.dailystory.com/sdk/php](https://docs.dailystory.com/sdk/php).

## dailystory_webform.php
This is a PHP class that can be added to any PHP application to render DailyStory Web Forms. Please see [the examples](https://github.com/dailystory/SDKs/tree/master/PHP/examples) for uses of this PHP class.

## dailystory_webtolead.php
This is a PHP class that can be added to any PHP application to create new leads using the API.

Below is an example use of this class. This samples assumes a $post_data array of values (e.g. the values from a form):
```
// Perform DailyStory new lead submission  
$DS = new DailyStory('29770b6ca72b4e1f8e49e9c4fda7ac15');
$DS->setLeadSource('Sample Landing Page');
$DS->setCampaignId(33);
$DS->setPostData('email', $post_data['email']);
$DS->setPostData('firstname', $post_data['first_name']);
$DS->setPostData('lastname', $post_data['last_name']);
$DS->setPostData('company', $post_data['company']);
$DS->setPostData('description', $post_data['description']);
$DS->submit(); 
```