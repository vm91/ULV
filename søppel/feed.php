<script language="javascript">  
    <?php $course = $_REQUEST['courseid']; ?>
    
function sendMessage(){
    //AjaxSend();
}

function AjaxSend(){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            /*
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
            */
        }
    }; 
    courseid = "<?= $course ?>"; 
    url="ajax/sendfeed.php?courseid="+courseid+"&message="+forumForm.messageForum.value;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

</script>