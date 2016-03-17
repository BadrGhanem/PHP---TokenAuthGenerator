# PHP---TokenAuthGenerator

I have made this token authentication generator that can be used with cdnsun.com to secure your streams.



<b>HOW TO USE</b>:



require_once 'TokenAuthGenerator.php';


$encryption = new Ghanem;


$encryption->set_key("S9JjfetE9gFIZkD"); // Put your key here


$encryption->expire = strtotime(date('d-m-Y H:i:s')) + 60;  // optional add token expiration time

$encryption->allow = array( 'domain1.com', 'domain2.com', 'etc...'); // optional allow only the following domains

$encryption->deny = array( 'domain.com', 'MISSING' ); // optional deny following domain, blank or missing referrer


$token = $encryption->token(); // Generate a token


echo $token; // show it


// You can also decrypt the token

echo $encryption->decrypt($token);




Enjoy!
