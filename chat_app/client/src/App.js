import './App.css';
import { useState } from 'react';
import Chat from './Chat';

// import socket.io-client
import io from 'socket.io-client';
const socket = io.connect('http://localhost:3001');

function App() {
  
  const [room, setRoom] = useState('');
  const [showChat, setShowChat] = useState(false);    // show chat window [true/false]
  const [userName, setUserName] = useState('');

  // function to join room
  const joinRoom = () => {
    if (room !== '' && userName !== '') {
      socket.emit('join_room', room);
      setShowChat(true);
    }
  }

  return (
    <div className="App">
      {!showChat ? (
      <div className='joinChatContainer'>
        <h4>Krishimitra Chat App</h4>
        <input
          type="text"
          placeholder="User Name"
          onChange = {(e) => {
            setUserName(e.target.value);
          }}
        />

        <input 
          type="text" 
          placeholder="Room ID" 
          onChange = {(e) => {
            setRoom(e.target.value);
          }} 
        />

        <button onClick = {joinRoom}>Join Room</button>
      </div>
      ) : (
      <Chat socket={socket} userName={userName} room={room} />
      )}
    </div>
  );
}

export default App;
