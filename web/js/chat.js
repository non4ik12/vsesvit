var PORT = 8008;
 
var options = {
//    'log level': 0
};
 
var currentUIDS = adminsIds = [];

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

Array.prototype.contains = function(k, callback) {
    var self = this;
    return (function check(i) {
        if (i >= self.length) {
            return callback(false);
        }

        if (self[i] === k) {
            return callback(true);
        }

        return process.nextTick(check.bind(null, i+1));
    }(0));
}


io.on('connection', function(socket){
    var address = socket.handshake.address, ip;
    ip = (address.address === undefined) ? address : address.address;

    // console.log('New connection from ' + ip + "(" + socket.id + ")");
    //console.log(socket.request.connection.remoteAddress);

    function showChat(uid) {
        io.to(currentUIDS[uid]).emit('show chat', '1');
    }

    socket.on('disconnect', function(){
        // console.log('user disconnected');
    });

    socket.on('to user', function(msg){
        socket.broadcast.emit('to user', msg);
        console.log(msg);
    });

    socket.on('to moderator', function(msg){
        socket.broadcast.emit('to moderator', msg);
        console.log(msg);
    });

    socket.on("userAuth", function(user) {
        currentUIDS[user.uid] = socket.id;
        if (currentUIDS[user.uid] !== undefined) {
            console.log('Пользователь зашел на страницу: ' +  user.page );
            showChat(user.uid);
        } else {
            console.log('Новый юзер.');
        }
    });

    socket.on("adminAuth", function(uid) {
        adminsIds.contains(uid, function(ex){
            if (ex) {
                console.log('Админ лазит по страницам.');
            } else {
                console.log('Пришел админ.')
                adminsIds.push(uid);
            }
        })
    });
});
