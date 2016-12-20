function hoverFooter(childid){
    var footerList = document.getElementById("newsfeedListFooter").getElementsByClassName("footerh");
    var i = footerList[childid];
    i.setAttribute("style","margin-top:5px; height: 140px; Color: #F00;");
    
    y = document.getElementById("newsfeedMessage").getElementsByTagName("li")[childid];
    i = document.getElementById("newsfeedListFooter").getElementsByClassName("footerh")[childid];
    i.innerHTML = y.innerHTML.toString(); 
    
}

function outFooter(childid){
    var footerList = document.getElementById("newsfeedListFooter").getElementsByClassName("footerh");
    var i = footerList[childid];
    i.setAttribute("style","margin-top:110px; height: 35px;");
    y = document.getElementById("newsfeedHeader").getElementsByTagName("li")[childid];
    i = document.getElementById("newsfeedListFooter").getElementsByClassName("footerh")[childid];
    i.innerHTML = y.innerHTML.toString(); 
    
    
}