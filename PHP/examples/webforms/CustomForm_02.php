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
    <h1>Custom HTML Form</h1>
    <p>Sample 2 column form layout with custom form, custom CSS, and Bootstrap</p>

    <div class="row">
        <div class="col-md-4">
            <form method="POST" action="https://cms-1.dailystory.com/PostForm/<?php echo $siteId?>/<?php echo $formId?>">
                <input type="hidden" name="dsid" value="dsid" />
                <input type="hidden" name="tz" id="timezone" />
                <h3>Contact Info</h3>
                <div class="field">
                    <label>First Name <sup>*</sup></label>
                    <input name="FirstName" type="text" maxlength="32" id="txtFirstName" tabindex="210" size="20" class="form-control">
                </div>
                <div class="field">
                    <label>Last Name <sup>*</sup></label>
                    <input name="LastName" type="text" maxlength="32" id="txtLastName" tabindex="220" size="20" class="form-control">
                </div>
                <div class="field">
                    <label>Company Name</label>
                    <input name="Company" type="text" maxlength="30" id="txtCompanyName" tabindex="230" size="20" class="form-control">
                </div>

                <h3>Shipping Address</h3>
                <div class="field">
                    <label>Country</label>
                    <select name="Country" tabindex="235" class="form-control">
                        <option selected="selected" value="USA">USA</option>
                        <option value="CA">Canada</option>
                    </select>
                </div>
                <div class="field">
                    <label>Address 1 <sup>*</sup></label>
                    <input name="Address" type="text" maxlength="30" id="txtAddress1" tabindex="240" class="form-control" size="20">
                </div>
                <div class="field">
                    <label>Address 2 <sup>*</sup></label>
                    <input name="Address" type="text" maxlength="30" id="txtAddress1" tabindex="240" class="form-control" size="20">
                </div>
                <div class="field">
                    <label>City <sup>*</sup></label>
                    <input name="City" type="text" maxlength="30" id="txtAddress1" tabindex="240" class="form-control" size="20">
                </div>
                <div class="field">
                    <label>State <sup>*</sup></label>
                    <select name="Region" tabindex="270" class="form-control">
                        <option selected="selected" value="0">Select A State</option>
                        <option value="AA">AA - Armed Forces</option>
                        <option value="AE">AE - Armed Forces</option>
                        <option value="AK">Alaska</option>
                        <option value="AL">Alabama</option>
                        <option value="AP">AP - Armed Forces</option>
                        <option value="AR">Arkansas</option>
                        <option value="AZ">Arizona</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DC">District of Columbia</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="IA">Iowa</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MD">Maryland</option>
                        <option value="ME">Maine</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MO">Missouri</option>
                        <option value="MS">Mississippi</option>
                        <option value="MT">Montana</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="NE">Nebraska</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NV">Nevada</option>
                        <option value="NY">New York</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VA">Virginia</option>
                        <option value="VI">Virgin Islands</option>
                        <option value="VT">Vermont</option>
                        <option value="WA">Washington</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WV">West Virginia</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>
                <div class="field">
                    <label>Zip Code <sup>*</sup></label>
                    <input name="PostalCode" type="text" maxlength="12" tabindex="250" class="form-control">
                </div>
                <div class="field">
                    <label>Email Address <sup>*</sup></label>
                    <input name="Email" type="text" tabindex="260" class="form-control">
                </div>
                <span class="indicator"><sup>*</sup> Indicates a required field.</span>
                <div class="field">
                    <input type="checkbox" name="OptIn" checked="checked"> <label for="optInCheckBox" class="optInLabel">Yes, send me offers.</label>
                </div>
                <button class="btn btn-primary">Submit Request</button>
            </form>
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

