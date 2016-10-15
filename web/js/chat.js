var PORT = 8008;
 
var options = {
//    'log level': 0
};
 
var clients = [],  admins = [];

var express = require('express');
var app = express();
var http = require('http');
var server = http.createServer(app);
var io = require('socket.io').listen(server, options);
server.listen(PORT);
 
app.use('/static', express.static(__dirname + '/static'));
 
app.get('/', function (req, res) {
    res.sendfile(__dirname + '/index.html');
});


io.on('connection', function(socket){
    var address = socket.handshake.address, ip;
    ip = (address.address === undefined) ? address : address.address;

    // console.log('New connection from ' + ip + "(" + socket.id + ")");
    //console.log(socket.request.connection.remoteAddress);

    function showChat(uid) {
        io.to(clients[uid]).emit('show chat', '1');
    }

    function getModerator() {
        var ak = Object.keys(admins);
        return ak[Math.floor(Math.random()*ak.length)];
    }

    socket.on('disconnect', function(){
        // console.log('user disconnected');
    });

    socket.on('to user', function(data){
        console.log('(Admin): Send message to: ' + data.uid);
        io.sockets.to(clients[data.uid]).emit('to user', {
            msg: data.msg,
            uid: data.aid 
        });
    });

    socket.on('to moderator', function(data){

        if (data.moderatorUid !== undefined) {
            // Если клиенту назначен модератор
            console.log('(User): Send message to defined: ' + data.moderatorUid);
            io.sockets.to(admins[data.moderatorUid]).emit(data);
        } else {
            // Назначаем модератора
            var modUid = getModerator();
            console.log('(User): Send message to: ' + modUid);
            io.sockets.to(admins[modUid]).emit("to moderator", data);
        }
    });

    socket.on("userAuth", function(user) {
        if (clients[user.uid] !== undefined) {
            console.log('Пользователь зашел на страницу: ' +  user.page );
            showChat(user.uid);
        } else {
            console.log('Новый юзер.');
        }
        clients[user.uid] = socket.id;
    });

    socket.on("adminAuth", function(mod) {
        console.log(admins);
        if (admins[mod.uid] !== undefined) {
            console.log('Админ лазит по страницам.');
        } else {
            console.log('Пришел админ.');
        }
        admins[mod.uid] = socket.id;
        console.log(admins);
    });
});
