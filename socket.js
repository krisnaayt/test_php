const httpServer = require("http").createServer();
const io = require("socket.io")(httpServer,
    {
    cors: {
      origin: "http://localhost:8080",
      methods: ["GET", "POST"]
    }
  }
);

var users = [];

io.on("connection", socket => {
    users[socket.id] = socket.id;

    var user = users[socket.id]
    console.log('user connected : '+user)

    socket.on('sendMessage', message => {
        socket.broadcast.emit('getMessage', { message: message})
    })

    socket.on("disconnect", (reason) => {
        console.log('user disconnected : '+user+' -> '+reason)
        delete users[user]
    });
});

httpServer.listen(8090);