<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$siteId = 'ghg0ctulvdx7bu10';
$formId = 'rskd7';

require_once('../../dailystory_webform.php');

// Create an instance of the web form
$webform = new DailyStoryWebForm();

// Get the web form
$form = $webform->renderWebForm($siteId,$formId);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyStory PHP SDK Samples</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cms-1.dailystory.com/Scripts/ds-landingpages.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../content/Site.css">
    <link rel="stylesheet" id="ds-webform-css" href="https://cms-1.dailystory.com/Content/base_webform-horizontal.css?ver=1.0.2" type="text/css" media="all">
    <!-- DailyStory -->
    <script type="text/javascript">
    (function (d, a, i, l, y, s, t, o, r, y) {
        d._dsSettings = i;
        r = a.createElement('script');
        o = a.getElementsByTagName('script')[0];
        r.src = '//us-1.dailystory.com/ds/ds' + i + '.js';
        r.async = true;
        r.id = 'ds-sitescript';
        o.parentNode.insertBefore(r, o);
    })(window, document, '<?php echo $siteId ?>');
    </script>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../" class="navbar-brand">Home</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="../webforms/" class="navbar-brand">Web Forms</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container body-content">
        <h1>Basic Web Form Horizontal with labels</h1>
		<?php echo $form ?>
        <hr />
        <footer>
            <p>&copy; DailyStory</p>
        </footer>
    </div>
</body>
</html>

