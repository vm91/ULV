<a id="newFeedToggle" href="">Skriv ny melding</a>

<div id="newFeed">
    <form onsubmit="sendMessage();return false;" id="forumForm" >	 
        <input id="feedHeader" type="text" 
                           placeholder="Overskrift" 
                           title="Please enter your course name" 
                           value=""
                           value="Overskrift"
                           tabindex="1"/>
        <textarea rows="4" cols="68" id="messageForum"></textarea>
        <br>
        <div id="statusPost"></div>
        <div id="statusPostError"></div>
        <input id="sendFeed" type="submit" value="Send">
        <br><br>
    </form>
</div>
