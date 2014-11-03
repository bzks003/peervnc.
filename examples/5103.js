
var noVNC = require('../novnc'),
    http = require('http'),
    WebSocket = require('wspp'),
    WebSocketServer = WebSocket.Server;
    
    
var srv = http.createServer(noVNC.webServer);
srv.listen(5103);
console.log('noVNC http server listening on 5103');

var wss = new WebSocketServer({server: srv, path: '/peervnc'});
wss.on('connection', noVNC.tcpProxy({host: '192.168.0.202', port: 5902}));
console.log('please access http://localhost:5103/peervnc');
