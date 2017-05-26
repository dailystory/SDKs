<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$siteId = 'ghg0ctulvdx7bu10';
$formId = 'z3b5e';

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
    <style>
        body {
            color: #373d3f;
        }

        h3 {
            color: #373D3F;
            font-size: 17px;
            font-weight: 400;
            margin-bottom: 5px;
        }

        input[type="text"], select {
            max-width: 225px;
            border: .75px solid #979797;
            font-size: 13px;
            border-radius: initial;
        }

        .field {
            padding-bottom: 10px;
        }

        label {
                color: #575758;
                font-size: 13px;
                margin-bottom: 3px;
                letter-spacing: .1px;
            }

        .image-container {
            margin-top: 67px;
        }

        .btn {
            border-radius: initial;
            margin-top: 20px;
            background-color: #007ad9;
            color: #fff;
        }

        label.optInLabel {
            padding-left: 5px;
            font-weight: normal;
        }

        .indicator {
            padding: 20px 0;
        }
        sup {
            padding-left: 3px;
        }
    </style>    
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
            <h1>Advanced CSS Form</h1>
            <p>Sample 2 column form layout with custom CSS and Bootstrap</p>

            <div class="row">
                <div class="col-md-4">
		            <?php echo $form ?>
                </div>
                <div class="col-md-8 image-container">
                    <img style="width:534px" src="../content/customform_01.jpg">
                </div>
            </div>
            
        <footer>
            <p>&copy; DailyStory</p>
        </footer>
    </div>
</body>
</html>

