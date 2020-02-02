const express = require('express');
const app = express();
var bodyParser = require('body-parser');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
const jsdom = require("jsdom");
const { JSDOM } = jsdom;

app.get('/', function(req, res) {
    res.send("ok.");
});

app.post('/', function(req, res) {
    var jscode = req.body.jscode;
    jscode = jscode.replace("/aes.js", "https://pastebin.com/raw/pKrFHFzf");
    jscode = jscode.replace("location.href", "var uselessvar12345");
    jscode = new JSDOM(jscode, { runScripts: "dangerously", resources: "usable" });
    setTimeout(function() {
    res.send(jscode.window.document.cookie)}, 500);
    return;
});

const listener = app.listen(process.env.PORT, function() {
  console.log('Your app is listening on port ' + listener.address().port);
});
