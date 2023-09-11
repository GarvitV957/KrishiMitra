const express = require('express');
const app = express();
const cors = require('cors');
const http = require('http');
const { Server } = require('socket.io');

app.use(cors());            // use cors lib for connection
const server = http.createServer(app);

const io = new Server(server, {
    cors: {
        origin: 'http://localhost:3000',
        methods: ['GET', 'POST']
    }
});

//socket connection
io.on('connection', (socket) => {
    console.log('User connected', socket.id);

    socket.on('join_room', (data) => {              // join room
        socket.join(data);
        console.log(`User joined room: ${data} and user_id: ${socket.id}`);
    })

    socket.on('send_msg', (data) => {
        socket.to(data.room).emit('receive_msg', data);     // send msg to room
        console.log(data);
    })

    socket.on('disconnect', () => {
        console.log('user disconnected', socket.id);
    })
});



server.listen(3001, () => {
    console.log('server listening');
});