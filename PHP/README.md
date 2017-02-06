# PHP Samples
The samples in this repository show how to connect and use the DailyStory APIs using PHP.

## dailystory_webtolead.php
This is a PHP class that can be added to any PHP application, such as WordPress ([see our WordPress plugin for easier WordPress integration](/dailystory/WordPress)).

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

## License
The code and samples in this repository are licensed under MIT License.

## Contributing
If you use this code and find bugs or want to add features (or contribute in other ways) we'd love it. Just submit a pull request and we'll review the changes. 

We're also open to suggestions, bug reports and more. Anything we can do to make this more useful for our users.

If you have [questions or ideas about this code we would love to talk](https://www.dailystory.com/contact-us).