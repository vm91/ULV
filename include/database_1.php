<?php

class user
{
    public $UserID;
    public $UserName;
    public $FirstName;
    public $Surname;
    public $Password;
    public $UserAcsess;
    
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "ulv";
     
    function getInfo() 
    {
        $db = new mysqli($this->host, $this->user, $this->password, $this->database);
        if (!$db) die(); //Feilhåntering!
        $sql= "SELECT Firstname, Surname
            FROM user
            WHERE Username like '$this->UserID'
            ";
        $query = $db->query($sql);
        if (!$query) return -1;
        
        $affectedRows = $db->affected_rows;
        if ($affectedRows > 0)
        {
            $row = $query->fetch_object();
            return $row->Firstname." ".$row->Surname;
        }
        return -1;
    } 
    function login()
    {
        $db = new mysqli($this->host, $this->user, $this->password, $this->database);
        if (!$db) die(); //Feilhåntering!
        $sql= "SELECT UID 
            FROM user
            WHERE Username like '$this->UserName' 
            AND Password like '$this->Password'
            ";
        $query = $db->query($sql);
        if (!$query) return -1;
        
        $affectedRows = $db->affected_rows;
        if ($affectedRows > 0)
        {
            $row = $query->fetch_object();
            return $row->UID;
        }
        return -1;
    }
    
    function checkPassword()
    {
        $db = new mysqli($this->host, $this->user, $this->password, $this->database);
        if (!$db) die(); //Feilhåntering!
        $sql= "SELECT UID 
            FROM user
            WHERE Username like '$this->UserName' 
            AND Password like '$this->Password'
            ";
        $query = $db->query($sql);
        if (!$query) return false;
        
        $affectedRows = $db->affected_rows;
        if ($affectedRows > 0)
        {
            return true;
        }
        return false;
    }
    
    function changePassword ()
    {
    }
    
    function isTeacher()
    {
        $db = new mysqli($this->host, $this->user, $this->password, $this->database);
        if (!$db) die(); //Feilhåntering!
        $sql= "SELECT Level 
            FROM acsess
            WHERE UID = '$this->UserID' 
            ";
        $query = $db->query($sql);
        if (!$query) return false;
        
        $affectedRows = $db->affected_rows;
        if ($affectedRows > 0)
            return true;
        return false;
    }
}

class course
{
    public $CourseID;
    public $CourseName;
    public $CourseAcsess;
    
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "ulv";
    
    function newCourse()
    {
        $db = new mysqli($this->host, $this->user, $this->password, $this->database);
        if (!$db) die(); //Feilhåntering!
        $sql="Insert Into course (Coursename)
            Values ('$this->CourseName')";
        $query = $db->query($sql);
        if (!$query) return -1;
        else 
        {
            $this->CourseID = $db->insert_id;
            return $this->CourseID;
        }
    }
    
    function showAllCourseNameInUlList()
    {
        $db = new mysqli($this->host, $this->user, $this->password, $this->database);
        if (!$db) die(); //Feilhåntering!
        $sql= "Select Coursename, CID 
            from course
            ";
        $query = $db->query($sql);
        if (!$query) return 0;
        
        $affectedRows = $db->affected_rows;
        
        /*$width = $affectedRows * 170;
        if ($width > 1200)
        {
            $width = 1200;
            $two = true;
            if ($affectedRows > 12)
                $affectedRows = 12;
        }
        
        echo '<ul id="headerValgList" style="width:'; 
        echo $width;
        echo 'px; height:';
        if ($two)
            echo '190px';
        else
            echo '100px';
        echo ';">';
         * 
         */
        
        for ($i = 0; $i < $affectedRows; $i++)
        {
            $row = $query->fetch_object();
            echo '<li> <a href="course.php?courseid=';
            echo $row->CID;
            echo '&coursename=';
            echo $row->Coursename;
            echo '">';
            echo $row->Coursename;
            echo '</li> </a>';
        }
        
        echo '</ul>';
    }
    
    function showCourseNameInUlList($userID)
    {
        $db = new mysqli($this->host, $this->user, $this->password, $this->database);
        if (!$db) die(); //Feilhåntering!
        $sql= "Select c.Coursename 
            from course as c, courseacsess as ac  
            where c.CID = ac.CID 
            and UID = '$userID'
            ";
        $query = $db->query($sql);
        if (!$query) return 0;
        
        $affectedRows = $db->affected_rows;
        for ($i = 0; $i < $affectedRows; $i++)
        {
            $row = $query->fetch_object();
            echo '<li> <a href="#"> ';
            echo $row->Coursename;
            echo '</li> </a>';
        }
    }
    
    function showCourseItemInUlList()
    {
        
        /*
         * 1 = fagstoff
         * 2 = Forum
         * 3 = Prøver
         * 4 = ?
         */
        $db = new mysqli($this->host, $this->user, $this->password, $this->database);
        if (!$db) die(); //Feilhåntering!
        $sql= "
            Select Item
            from courseitem   
            where CID = '$this->CourseID'
            ";
        $query = $db->query($sql);
        if (!$query) return;
        
        $affectedRows = $db->affected_rows;
        if ($affectedRows == 0) 
            return $this->CourseID;
        echo '<div id="courseValg">';
        echo '<ul id="courseValgList">';
        for ($i = 0; $i < $affectedRows; $i++)
        {
            $row = $query->fetch_object();
            echo '<li>';
            $courseURL= '.php?courseid='.$this->CourseID.
                    '&coursename='.$this->CourseName.'">';
            $item = $row->Item;
            switch ($item){
                case 1: 
                    echo '<a href="fagstoff';
                    echo $courseURL;
                    echo 'Fagstoff';
                    break;
                case 2: 
                    echo '<a href="forum';
                    echo $courseURL;
                    echo 'Forum';
                    break;
                case 3: 
                    echo '<a href="prover';
                    echo $courseURL;
                    echo 'Prøver';
                    break;
            }
            echo '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    }
    
    function showAllMessageFromCourse ()
    {
        $db = new mysqli($this->host, $this->user, $this->password, $this->database);
        if (!$db) die(); //Feilhåntering!
        $sql= "Select header, message 
            from coursemessage
            where CID = '$this->CourseID'
            ";
        $query = $db->query($sql);
        if (!$query) return 0;
        
        $affectedRows = $db->affected_rows;
        echo '<ul id="newsfeedList">';
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<li></li>';
        }
        echo '</ul>';
        echo '<ul id="newsfeedListFooter">';
        for ($i = 0; $i < $affectedRows; $i++)
        {
            $row = $query->fetch_object();
            echo '<li>';
            echo $row->header;
            echo '<div class="footerp"></div></li>';
        }
        echo '</ul>';
        echo '<ul id="newsfeedListLink">';
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<a href="#"> <li onmouseover="hoverFooter('.$i;
            echo ');" onmouseout="outFooter('.$i.');"><div></div></li> </a>';
        }
    }
}
?>
