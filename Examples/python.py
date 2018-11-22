import requests
r_GetCookie = requests.get("http://test.epizy.com")
r_GetCookie_Response = r_GetCookie.text

r_GetCookie_2 = requests.post("https://edgy.faked.to/getbyethostcookie.php", data={"jscode":r_GetCookie_Response})
r_GetCookie_2_Response = r_GetCookie_2.text # This is the cookie! (__test=X, where X is the cookie.)

test_cookie = r_GetCookie_2_Response.split("=")[1]

r = requests.get("http://test.epizy.com", cookies={"__test":test_cookie})
r_Response = r.text

print(r_Response)
