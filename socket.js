// const io = require('socket.io')(8090)    // local

// const users = {}

// io.on('connection', socket => {
//   console.log('user '+users[socket.id]+' connected');
//   // socket.on('new_user', name => {
//   //   users[socket.id] = name
//   //   socket.broadcast.emit('user_connected', name)
//   // })
//   socket.on('send_notif', message => {
//     socket.broadcast.emit('get_notif', { message: message})
//   })
//   socket.on('disconnect', () => {
//     socket.broadcast.emit('user_disconnected', users[socket.id])
//     console.log('user_disconnected', users[socket.id]);
//     delete users[socket.id]
//   })
// })

// const httpServer = require("http").createServer();
// const options = {};
// const io = require("socket.io")(httpServer, options, {
//     cors: {
//         origin: "http://pa-apps.local",
//         methods: ["GET", "POST"]
//       }
// });

// io.on("connection", socket => {
//     console.log('test socket on')
// });

// httpServer.listen(8090);