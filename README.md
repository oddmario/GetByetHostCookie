# GetByetHostCookie
This is a small project that can get the ( `__test` ) cookie of any ByetHost website.
## Contents
- [Contents](#contents)
    - [What's this project?](#whats-this-project)
    - [Tutorial](#tutorial)
    - [VERY IMPORTANT!](#very-important)
    - [Examples](#examples)
    - [Hosting your own GetByetHostCookie](#hosting-your-own-getbyethostcookie)

# What's this project?
A lot of people want to host APIs, etc. on ByetHost but they can't ...
Why? Because as ByetHost is free web hosting, they added a limitation which is `only the web browsers can access the ByetHost sites, you can't use it to host API service or the similar things`
So if you hosted an API on ByetHost, no one will be able to use it using cURL, Postman, etc. Because they will get a JavaScript code saying `This site requires Javascript to work, please enable Javascript in your browser or use a browser with Javascript support`.
**How can this be bypassed?** : This can be bypassed by adding a Cookie called `__test` in all your requests that you will do using cURL, Postman, etc.
But the value of this cookie is hard to get as it is highly encrypted by a secret key... __So,__ this project made it possible to get the `__test` cookie easily!

# Tutorial
__Assuming that the ByetHost site is http://example.com__
1. You've to do a request to the ByetHost site that you want ( http://example.com )... the response of the request that we created should be a JavaScript code like this:
```
<html><body><script type="text/javascript" src="/aes.js" ></script><script>function toNumbers(d){var e=[];d.replace(/(..)/g,function(d){e.push(parseInt(d,16))});return e}function toHex(){for(var d=[],d=1==arguments.length&&arguments[0].constructor==Array?arguments[0]:arguments,e="",f=0;f<d.length;f++)e+=(16>d[f]?"0":"")+d[f].toString(16);return e.toLowerCase()}var a=toNumbers("f655ba9d09a112d4968c63579db590b4"),b=toNumbers("98344c2eee86c3994890592585b49f80"),c=toNumbers("5d0828234733628dc4be8a604efd66ba");document.cookie="__test="+toHex(slowAES.decrypt(c,2,a,b))+"; expires=Thu, 31-Dec-37 23:55:55 GMT; path=/"; location.href="http://fakedto.epizy.com/?i=1";</script><noscript>This site requires Javascript to work, please enable Javascript in your browser or use a browser with Javascript support</noscript></body></html>
```
2. Simply, take this response and do a **POST** request to `https://getbyethostcookie.glitch.me/` ,
The POST variable should be:
```
jscode: The JavaScript code that we got in step 1.
```

Now you should get a response containing:
```
__test=1e27a81afa3459fc3f407befb92bce41
```

***Congratulations!*** This is the `__test` that we wanted!

Now you can do any request to http://example.com and add the cookie that we got in the HTTP headers of your requests - You'll notice that you won't get the JavaScript code but you will get the response that you wanted :)

# VERY IMPORTANT!
* The `__test` cookie differs from a device to another and changes by the time, so you've to get the cookie on every request you're doing to a ByetHost website.

# Examples
You can find examples of integrations of this project [here](https://github.com/mariolatiffathy/GetByetHostCookie/tree/master/Examples).

# Hosting your own GetByetHostCookie
You can find the Node.js server used by GetByetHostCookie [here](https://github.com/mariolatiffathy/GetByetHostCookie/tree/master/nodejs_server)
