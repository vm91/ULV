window.onload = function() {
    var a = document.getElementById("newForumToggle");
    a.onclick = function() {
        newForum();
        return false;
    };
};

var show;
function newForum () {
    if (!show)
    {
        var i = document.getElementById("newForum");
        i.setAttribute("style", "display: block;");
        show = true;
    }
    else 
    {
        var i = document.getElementById("newForum");
        i.setAttribute("style", "display: none;");
        show = false;
    }
}

