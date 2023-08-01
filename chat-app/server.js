import express from 'express';
import http from 'http';
import {Server} from 'socket.io';
import {createServer} from 'http';
const app = express(); 


const server = http.createServer(app); 
const io = new Server(server, {   
     cors: { origin: "*"} });  
     app.get('/', (req, res) => {     
          res.send('<h1>Hello world</h1>');   
});     
io.on('connection',(socket)=>{     
     console.log(socket.id);   
     
     socket.on('message',msg => {
          console.log(msg);
     });
     socket.emit('server', 'Send message from server');
     socket.on('disconnect',(socket)=>{             
        console.log('Disconnect');     
}); 
})  
     
server.listen(3000, () => {   
     console.log('Server is running'); 
});