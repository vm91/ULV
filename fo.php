<?php
    session_start();
    if(!isset($_SESSION['UID']))
        header('location: logginn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" type="text/css" href="style/styletopp.css" />
        <link rel="shortcut icon" href="bilder/wolfico.ico">
        <title>ULV</title>
        <script type="text/javascript" src="ajax.js"></script>
        <script type="text/javascript">
            lastReceived=0;
            
        function setUpdate () {
            updateInterval=setInterval("updateInfo()",3000);
        }
        function sendMessage(){
            setUpdate();
            data="message="+messageForm.message.value;
            serverRes.innerHTML="Sending";
            AjaxSend();
        }
        
        function AjaxSend(){
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    if(xmlhttp.responseText == "sentok")
                    {
                        messageForm.message.value="";
                        messageForm.message.focus();
                        serverRes.innerHTML="Sent";
                    }
                    else
                        serverRes.innerHTML = "Not sent";
                }
            }
            url="include/send.php?message="+messageForm.message.value;
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
        </script>
</head>

<body>
    <?php
    include 'include/html.php';
        $html = new html();
        $html->toppCourse();
        $html->courseStart();
        $html->showCourses();
        $html->courseEnd();
        $html->courseItem();
        
        $html->startContainer();
        $html->forum();
        $html->endContainer(); 
    ?>
</body>
</html>