import React, { useEffect } from 'react'
import { useState } from 'react'
import ScrollToBottom from 'react-scroll-to-bottom';

function Chat({socket, userName, room}) {
    const [msgList, setMsgList] = useState([]);    // list of msgs [array]
    const [currMsg, setcurrMsg] = useState('');
    const sendMsg = async () => {           // send msg to server and wait i.e async
        if (currMsg !== '') {
            const msg = {
                room: room,
                author: userName,
                message: currMsg,
                time: new Date(Date.now()).getHours() + ':' + new Date(Date.now()).getMinutes()
            }
            await socket.emit('send_msg', msg);    // send msg to server
            setMsgList((list) => [...list, msg]);  // add msg to list
            setcurrMsg("");
        }
    }

    useEffect(() => {
        socket.on('receive_msg', (data) => {        // receive msg from server
            setMsgList((list) => [...list, data]);
            console.log(data);
        })
    }, [socket]);

    return (
        <div className='chat-window'>
            <div className='chat-header'>
                <p>Krishi Chat</p>
            </div>
            <div className='chat-body'>
            <ScrollToBottom className="message-container">
            {msgList.map((content) => {
                return (
                    <div
                        className="message"
                        id={userName === content.author ? "you" : "other"}
                    >
                    <div>
                        <div className="message-content">
                            <p>{content.message}</p>
                        </div>
                        <div className="message-meta">
                            <p id="time">{content.time}</p>
                            <p id="author">{content.author}</p>
                        </div>
                    </div>
                </div>
                );
            })}
        </ScrollToBottom>
            </div>
            <div className='chat-footer'>
                <input 
                type='text'
                value={currMsg}
                placeholder='Type a message here...'
                onChange = {(e) => {s
                    setcurrMsg(e.target.value);
                }} 
                />
                <button onClick={sendMsg}>Send</button>
            </div>
        </div>
    )
}

export default Chat
// {socket, username, room}