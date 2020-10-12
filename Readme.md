# API Request Automation

###### Specification and Requirement

* PHP >= 5.0
* Key and Secret Key


The service better works for server that has a security protocol like hmac authentication service.  The purpose this code is built is based by a gruesome feeling after you hit a postman for several times and nothing is finished in time.

In order to make the service work you need the match API key pairing with it's secret, in order the service can do authentication.  You can find the key configuration in `Config.php` 


> API Key and secret

`define('KEY', '{Your API Key');`

`define('SECRET', '{Your API Secret}');`

Also in configuration, you have to set the relative path of url that you want to request and full url of address.  The purpose of value in relative path is used by authentication method, then the full url is what service that you will have to request later.  You can set the value in key below

>Relative path and URL

`define('URL', '{Relative path of url}');`

`define('API_URL', '{Full URL you want to Request}');`

Last but not least, you can specify the input and the output path to begin.  The notepad path is the input log of every request and later will be parsed into input folder to be read by the code and turn into json file when it's running.

>Input and Notepad Path

`define('NOTEPAD_PATH', '\\notepad\\');`

`define('INPUT_PATH', '\\Input\\');`

After all the configuration is done, you can call it by entering the script command

`php -f main.php`

That is folks! if you happen to be shared by this script, please fork it then delete `.git` hidden folder.  Goodluck👍😊 