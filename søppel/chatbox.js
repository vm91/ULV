lastReceived=0;


// Update info
function updateInfo(){
serverRes.innerHTML="Updating";
Ajax_Send("POST","users.php","",showUsers);
Ajax_Send("POST","receive.php","lastreceived="+lastReceived,showMessages);
}

// update online users
function showUsers(res){
usersOnLine.innerHTML=res
}

// Update messages view
function showMessages(res){
serverRes.innerHTML=""
msgTmArr=res.split("<SRVTM>")
lastReceived=msgTmArr[1]
messages=document.createElement("span")
messages.innerHTML=msgTmArr[0]
chatBox.appendChild(messages)
chatBox.scrollTop=chatBox.scrollHeight
}

// Send message
function sendMessage(){
    alert('hei');
data="message="+messageForm.message.value;
serverRes.innerHTML="Sending";
Ajax_Send("POST","send.php",data,sentOk);
}

// Sent Ok
function sentOk(res){
if(res=="sentok"){
messageForm.message.value="";
messageForm.message.focus();
serverRes.innerHTML="Sent";
}
else{
serverRes.innerHTML="Not sent";
}
}