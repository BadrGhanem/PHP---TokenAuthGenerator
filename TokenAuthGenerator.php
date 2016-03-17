
 <?php
 
/* 
 * TokenAuthGenerator.php 1.0
 * made by Badr Ghanem (aka Riko)
 * 
 */


class Ghanem { 

 private $key = NULL;

 public $allow = array();

 public $deny = array();

 public $expire = NULL;



 public function set_key($key_secrect) {
              $this->key = $key_secrect;
   }



 private function pkcs5_pad($text,$blocksize){

    $pad = $blocksize - (strlen($text) % $blocksize);
    return $text.str_repeat(chr($pad),$pad);
}

 private function pkcs5_unpad($text){
    $pad = ord($text{strlen($text)-1});
    if ($pad > strlen($text)) return false;
    if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
    return substr($text, 0, -1 * $pad);
}



   public  function decrypt($ciphertext)  {

    $ciphertext = hex2bin ($ciphertext);

    $ivsize=mcrypt_get_iv_size(MCRYPT_BLOWFISH,MCRYPT_MODE_ECB);
    $iv=substr($crypttext,0,$ivsize);
    
    $plaintext=mcrypt_decrypt(MCRYPT_BLOWFISH,$this->key,$ciphertext,
        MCRYPT_MODE_ECB,$iv);


        return $plaintext;
    }



      public function token()  {




$allow_domains = NULL;

$deny_domains  = NULL;

$token  = NULL;

foreach($this->allow as $val) {


    if ($allow_domains != NULL){

        $allow_domains .= ",$val";

    }else{

        $allow_domains = $val;
    }

}



foreach($this->deny as $val) {


    if ($deny_domains != NULL){

        $deny_domains .= ",$val";

    }else{

        $deny_domains = $val;
    }

}






if ($this->expire !=NULL) {


      $token = "expire=".$this->expire;

      if (count($this->allow) > 0 && count($this->deny) > 0){

         $token .= "&ref_allow=".$allow_domains;

         $token .= "&ref_deny=".$deny_domains;

      }else if (count($this->allow) > 0) {

        $token .= "&ref_allow=".$allow_domains;

      } else if (count($this->deny) > 0) {

        $token .= "&ref_deny=".$deny_domains;

      }

}else{

     if (count($this->allow) > 0 && count($this->deny) > 0){

         $token .= "ref_allow=".$allow_domains;

         $token .= "&ref_deny=".$deny_domains;

      }else if (count($this->allow) > 0) {

        $token .= "ref_allow=".$allow_domains;

      } else if (count($this->deny) > 0) {

        $token .= "ref_deny=".$deny_domains;

      }
}



  
       $blockSize = mcrypt_get_block_size(MCRYPT_BLOWFISH,MCRYPT_MODE_ECB);

        //$cipher = mcrypt_ecb(MCRYPT_BLOWFISH,$key, $padded, MCRYPT_ENCRYPT);
        $cipher = mcrypt_encrypt("blowfish",$this->key,$this->pkcs5_pad($token,$blockSize),"ecb");

        $secure = sprintf('%s', bin2hex($cipher) );


        return $secure;
    }


} 



?>
