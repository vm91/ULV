window.onload = function() {
    var a = document.getElementById("newFeedToggle");
    a.onclick = function() {
        newFeed();
        return false;
    };
};

function sendMessage(){
    AjaxSend();
    //window.location.reload();
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
    var oldurl = document.URL;
    var param = oldurl.split("php?");
    url="ajax/coursefeed.php?"+param[1]+"&message="+forumForm.messageForum.value+"&header="+forumForm.feedHeader.value;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

var show;
function newFeed () {
    if (!show)
    {
        var i = document.getElementById("newFeed");
        i.setAttribute("style", "display: block;");
        show = true;
    }
    else 
    {
        var i = document.getElementById("newFeed");
        i.setAttribute("style", "display: none;");
        show = false;
    }
}

