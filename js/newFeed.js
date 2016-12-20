var id;
var nameDivVisible;
var lastClosed;

function newFeed (childid) {
    var deleteList = document.getElementsByClassName("deleteCourse");
    var i = deleteList[childid];
    i.setAttribute("style", "display: block;");
    hide (childid); 
    nameDivVisible = false;
}
        
function courseName (childid) {
    var nameDivList = document.getElementsByClassName("adminCourseName");
    var i = nameDivList[childid];
    i.setAttribute("style", "display: block;");
    hide (childid); 
    nameDivVisible = true;
}

function hide (childid){
    var tempid = id;
    id = childid;
    if (nameDivVisible == null) return;
    
    if (!nameDivVisible)
    {
        if (lastClosed == tempid)
        {
            lastClosed = -1;
            return;
        }
        var deleteList = document.getElementsByClassName("deleteCourse");
        var k = deleteList[tempid];
        k.setAttribute("style", "display: none;");
        lastClosed = tempid;
    }
    else 
    {
        if (lastClosed == tempid)
        {
            lastClosed = -1;
            return;
        }
        var nameDivList = document.getElementsByClassName("adminCourseName");
        var i = nameDivList[tempid];
        i.setAttribute("style", "display: none;");
        lastClosed = tempid;
    }
}