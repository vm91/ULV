lastReceived=0;
            
function setUpdate () {
    updateInterval=setInterval("updateInfo()",10000);
}
function sendMessage(){
    //setUpdate();
    //data="message="+messageForm.messageForum.value;
    newPosts.innerHTML += '<div class="forumPost">' 
            + '<div class="forumPostUser"><img src="bilder/meg1.jpeg"/></br><a href="#">'
            + 'megsann</a></div>'
            + '<div class="forumPostMsg">'
            + forumForm.messageForum.value
            + '</div></div>';
    statusPost.innerHTML = "Sending...";
    AjaxSend();
    //forumForm.messageForum.value = "";
    //newPosts.innerHTML += '<div class="forumPostDate"><p>'
    
    //serverRes.innerHTML="Sending";
    
}

function AjaxSend(){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            
            if(xmlhttp.responseText == "feil")
            {
                statusPost.innerHTML = "";
                statusPostError.innerHTML = "Server feil. Prøv igjen senere";
            }
            else
            {
                forumForm.messageForum.value="";
                forumForm.messageForum.focus();
                statusPost.innerHTML = "";
                statusPostError.innerHTML = "";
            }
        }
    }; 
    url="send.php?message="+forumForm.messageForum.value;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

// Update info
function updateInfo(){
    serverRes.innerHTML="Updating";
    //Ajax_Send("POST","users.php","",showUsers);
    //Ajax_Send("GET","receive.php","lastreceived="+lastReceived,showMessages);
    AjaxMess();
}
function AjaxMess(){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            showMessages(xmlhttp.responseText);            
        }
    }
    url="receive.php?lastreceived="+lastReceived;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

// Update messages view
function showMessages(res){
    serverRes.innerHTML="";
    msgTmArr=res.split("<SRVTM>");
    lastReceived=msgTmArr[1];
    //alert(lastReceived);
    messages=document.createElement("span");
    messages.innerHTML=msgTmArr[0];
    chatBox.appendChild(messages);
    //chatBox.scrollTop=chatBox.scrollHeight;
}
