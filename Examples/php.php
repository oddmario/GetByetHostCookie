<?php
$r_GetCookie = file_get_contents("http://test.epizy.com"); // This is the JavaScript code.

$postdata = http_build_query(
    array(
        'jscode' => $r_GetCookie
    )
);
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);
$context  = stream_context_create($opts);

$r_GetCookie_2 = file_get_contents('https://getbyethostcookie.glitch.me/', false, $context); // This is the cookie! (__test=X, where X is the cookie.)
$__test_cookie = substr($r_GetCookie_2, strpos($r_GetCookie_2, "=") + 1); // Get the text after `=` sign (which is the __test cookie value)

$opts2 = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Cookie: __test=" . $__test_cookie
  )
);
$context2 = stream_context_create($opts2);

$r = file_get_contents("http://test.epizy.com", false, $context2);
echo $r;
?>
