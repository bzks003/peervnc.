var noVNC = require('../novnc'),
    http = require('http'),
    WebSocket = require('wspp'),
    WebSocketServer = WebSocket.Server;
    
    
var srv = http.createServer(noVNC.webServer);
srv.listen(5142);
console.log('noVNC http server listening on 5142');

var wss = new WebSocketServer({server: srv, path: '/peervnc'});
wss.on('connection', noVNC.tcpProxy({host: 'localhost', port: 5942}));
console.log('please access http://localhost:5142/peervnc');
