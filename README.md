# GetByetHostCookie
This is a small project that can get the ( `__test` ) cookie of any ByetHost website.

# Usage
1. You've to do a request to the ByetHost site that you want... the response should be a JavaScript code like this:
```
<html><body><script type="text/javascript" src="/aes.js" ></script><script>function toNumbers(d){var e=[];d.replace(/(..)/g,function(d){e.push(parseInt(d,16))});return e}function toHex(){for(var d=[],d=1==arguments.length&&arguments[0].constructor==Array?arguments[0]:arguments,e="",f=0;f<d.length;f++)e+=(16>d[f]?"0":"")+d[f].toString(16);return e.toLowerCase()}var a=toNumbers("f655ba9d09a112d4968c63579db590b4"),b=toNumbers("98344c2eee86c3994890592585b49f80"),c=toNumbers("5d0828234733628dc4be8a604efd66ba");document.cookie="__test="+toHex(slowAES.decrypt(c,2,a,b))+"; expires=Thu, 31-Dec-37 23:55:55 GMT; path=/"; location.href="http://fakedto.epizy.com/?i=1";</script><noscript>This site requires Javascript to work, please enable Javascript in your browser or use a browser with Javascript support</noscript></body></html>
```
Simply, take this response and do a **POST** request to `https://edgy.faked.to/getbyethostcookie.php` ,
The POST variable should be:
```
jscode: The JavaScript code that we got in step 1.
```

Now you should get a response containing:
```
__test=1e27a81afa3459fc3f407befb92bce41
```

***Congratulations!*** This is the `__test` that we wanted!

# VERY IMPORTANT!
* The `__test` cookie differs from a device to another and changes by the time, so you've to get the cookie on every request you're doing to a ByetHost website.
