<?
///////////////////////////////////////
// Santizer.class.php
// Sanitization class for PHP
// based on sanitize.inc.php by: Gavin Zuchlinski, Jamie Pratt, Hokkaido
// this is an object-oriented version of their code
///////////////////////////////////////

class Sanitize {

  //define constants.  these will be available outside of the class as Sanitizer::PARANOID, Sanitizer::SQL, etc.
  const PARANOID = 1;
  const SQL = 2;
  const SYSTEM = 4;
  const HTML = 8;
  const INT = 16;
  const FLOAT = 32;
  const LDAP = 64;
  const UTF8 = 128;

  //function __construct is a "constructor function", which means it is called automatically when a new User object is created
  //this function has one optional argument, the userId of the user to load
	public function __construct() {
  } //end function __construct
  
  // internal function for utf8 decoding
  // thanks to Jamie Pratt for noticing that PHP's function is a little 
  // screwy
  function my_utf8_decode($string)
  {
    return strtr($string, 
      "???????¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ", 
      "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
  }

  // paranoid sanitization -- only let the alphanumeric set through
  function sanitize_paranoid_string($string, $min='', $max='')
  {
    $string = preg_replace("/[^a-zA-Z0-9]/", "", $string);
    $len = strlen($string);
    if((($min != '') && ($len < $min)) || (($max != '') && ($len > $max)))
      return FALSE;
    return $string;
  }

  // sanitize a string in prep for passing a single argument to system() (or similar)
  function sanitize_system_string($string, $min='', $max='')
  {
    $pattern = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i'; // no piping, passing possible environment variables ($),
                             // seperate commands, nested execution, file redirection, 
                             // background processing, special commands (backspace, etc.), quotes
                             // newlines, or some other special characters
    $string = preg_replace($pattern, '', $string);
    $string = '"'.preg_replace('/\$/', '\\\$', $string).'"'; //make sure this is only interpretted as ONE argument
    $len = strlen($string);
    if((($min != '') && ($len < $min)) || (($max != '') && ($len > $max)))
      return FALSE;
    return $string;
  }

  // sanitize a string for SQL input (simple slash out quotes and slashes)
  function sanitize_sql_string($string, $min='', $max='')
  {
    $pattern[0] = '/(\\\\)/';
    $pattern[1] = "/\"/";
    $pattern[2] = "/'/";
    $replacement[0] = '\\\\\\';
    $replacement[1] = '\"';
    $replacement[2] = "\\'";
    $len = strlen($string);
    if((($min != '') && ($len < $min)) || (($max != '') && ($len > $max)))
      return FALSE;
    return preg_replace($pattern, $replacement, $string);
  }

  // sanitize a string for SQL input (simple slash out quotes and slashes)
  function sanitize_ldap_string($string, $min='', $max='')
  {
    $pattern = '/(\)|\(|\||&)/';
    $len = strlen($string);
    if((($min != '') && ($len < $min)) || (($max != '') && ($len > $max)))
      return FALSE;
    return preg_replace($pattern, '', $string);
  }


  // sanitize a string for HTML (make sure nothing gets interpretted!)
  function sanitize_html_string($string)
  {
    $pattern[0] = '/\&/';
    $pattern[1] = '/</';
    $pattern[2] = "/>/";
    $pattern[3] = '/\n/';
    $pattern[4] = '/"/';
    $pattern[5] = "/'/";
    $pattern[6] = "/%/";
    $pattern[7] = '/\(/';
    $pattern[8] = '/\)/';
    $pattern[9] = '/\+/';
    $pattern[10] = '/-/';
    $replacement[0] = '&amp;';
    $replacement[1] = '&lt;';
    $replacement[2] = '&gt;';
    $replacement[3] = '<br>';
    $replacement[4] = '&quot;';
    $replacement[5] = '&#39;';
    $replacement[6] = '&#37;';
    $replacement[7] = '&#40;';
    $replacement[8] = '&#41;';
    $replacement[9] = '&#43;';
    $replacement[10] = '&#45;';
    return preg_replace($pattern, $replacement, $string);
  }

  // make int int!
  function sanitize_int($integer, $min='', $max='')
  {
    $int = intval($integer);
    if((($min != '') && ($int < $min)) || (($max != '') && ($int > $max)))
      return FALSE;
    return $int;
  }

  // make float float!
  function sanitize_float($float, $min='', $max='')
  {
    $float = floatval($float);
    if((($min != '') && ($float < $min)) || (($max != '') && ($float > $max)))
      return FALSE;
    return $float;
  }

  // glue together all the other functions
  public static function sanitize($input, $flags, $min='', $max='')
  {
    if($flags & Sanitize::UTF8) $input = Sanitize::my_utf8_decode($input);
    if($flags & Sanitize::PARANOID) $input = Sanitize::sanitize_paranoid_string($input, $min, $max);
    if($flags & Sanitize::INT) $input = Sanitize::sanitize_int($input, $min, $max);
    if($flags & Sanitize::FLOAT) $input = Sanitize::sanitize_float($input, $min, $max);
    if($flags & Sanitize::HTML) $input = Sanitize::sanitize_html_string($input, $min, $max);
    if($flags & Sanitize::SQL) $input = Sanitize::sanitize_sql_string($input, $min, $max);
    if($flags & Sanitize::LDAP) $input = Sanitize::sanitize_ldap_string($input, $min, $max);
    if($flags & Sanitize::SYSTEM) $input = Sanitize::sanitize_system_string($input, $min, $max);
    return $input;
  }
    
} //end class

?>