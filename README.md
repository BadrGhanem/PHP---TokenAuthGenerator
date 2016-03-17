# PHP---TokenAuthGenerator

I have made this token authentication generator that can be used with cdnsun.com to secure your streams.



<b>HOW TO USE</b>:



require_once 'TokenAuthGenerator.php';


$encryption = new Ghanem;


$encryption->set_key("S9JjYqYzE9gFIZkD"); // Put your key here


$encryption->expire = strtotime(date('d-m-Y H:i:s')) + 60;  // optional add token expiration time +60 means token expire in 60 seconds

$encryption->allow = array( 'domain1.com', 'domain2.com', 'etc...'); // optional allow only the following domains

$encryption->deny = array( 'domain.com', 'MISSING' ); // optional deny following domain, blank or missing referrer


$token = $encryption->token(); // Generate a token


echo $token; // show it



<b>Then append the result to the end of the streaming CDN URL as in the following example</b>:

<code>rtmp://12345.r.cdnsun.net/_definst_/live?token=5a0d9342025758d4a5351d09e9cdc30cc498703245849ccdc11970c4a328faa77fc75dac3fafef0783e31f9d1d012d4f9dd2fd2659b194a2953d2ad22d8a94014887ca52bdf6796f760176712360c643
</code>



// You can also decrypt the token

echo $encryption->decrypt($token);




Enjoy!
