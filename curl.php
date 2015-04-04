<?
$data = <<<DATA
```ruby
require 'redcarpet'
markdown = Redcarpet.new("Hello World!")
puts markdown.to_html
```
DATA;

$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL=>           'https://api.github.com/markdown/raw', //Markdown/raw takes and returns plain text input and output
    CURLOPT_FAILONERROR=>   false,
    CURLOPT_FOLLOWLOCATION=>1,
    CURLOPT_RETURNTRANSFER=>1, //Return result as a string
    CURLOPT_TIMEOUT=>       300,
    CURLOPT_POST=>          1,
    CURLOPT_POSTFIELDS=>    $data, //Pull in the requested file
    CURLOPT_HTTPHEADER=>    array('Content-type: text/plain'), //Github expects the given data to be plaintext
    CURLOPT_SSL_VERIFYPEER=>0, //In case there are problems with the PHP ssl chain (often the case in Windows), ignore the error
    CURLOPT_USERAGENT=>     'Curl/PHP' //Github now requires a useragent to process the request
));

$result = curl_exec($ch);


print_r($result);
curl_close($ch);
?>