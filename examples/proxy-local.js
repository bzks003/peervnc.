var Proxy = require('../index');


var server = new Proxy(['192.188.1.168:5901'], function(err, proxyURL){
    console.log('VNC                   Proxy URL(please open it on browser)');
    for (var k in proxyURL) {
        console.log(k+'        '+proxyURL[k]);
    }
});
