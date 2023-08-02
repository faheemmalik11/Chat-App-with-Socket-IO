import express from 'express';
import http from 'http';
import {Server} from 'socket.io';
import {createServer} from 'http';
const app = express(); 


const server = http.createServer(app); 
const io = new Server(server, {   
     cors: { origin: "*"} });

app.get('/', (req, res) => {     
          res.send('Hello world');   
});     
io.on('connection',(socket)=>{     
     console.log('Connected');   
     
     socket.on('join', msg => {
        console.log(msg);
       socket.join(msg.group);
       io.to(msg.group).emit('joinMessage', msg.user + ' Joined the group');
     });

     socket.on('sendMessage', msg => {
        io.to(msg.group).emit('newMessage',msg.message);
     })

     socket.on('disconnect',(socket)=>{             
        console.log('Disconnect');     
}); 
})  
     
server.listen(3000, () => {   
     console.log('Server is running'); 
});