var noVNC = require('../novnc'),
    http = require('http'),
    WebSocket = require('wspp'),
    WebSocketServer = WebSocket.Server;
    
    
var srv = http.createServer(noVNC.webServer);
srv.listen(5101);
console.log('noVNC http server listening on 5101');

var wss = new WebSocketServer({server: srv, path: '/peervnc'});
wss.on('connection', noVNC.tcpProxy({host: '151.225.4.216', port: 5901}));
console.log('please access http://localhost:5101/peervnc');
