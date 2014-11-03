var noVNC = require('../novnc'),
    http = require('http'),
    WebSocket = require('wspp'),
    WebSocketServer = WebSocket.Server;
    
    
var srv = http.createServer(noVNC.webServer);
srv.listen(5102);
console.log('noVNC http server listening on 5102');

var wss = new WebSocketServer({server: srv, path: '/peervnc'});
wss.on('connection', noVNC.tcpProxy({host: '192.168.0.203', port: 5901}));
console.log('please access http://localhost:5102/peervnc');
