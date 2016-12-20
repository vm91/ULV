<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "ulv");

class user
{
    public $UserID;
    public $UserName;
    public $FirstName;
    public $Surname;
    public $email;
    public $phone;
    public $adress;
    public $zip;
    public $state;
    public $birth;
    public $Password;
     
    function getInfo() 
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "SELECT Fornavn, Etternavn
            FROM bruker
            WHERE Brukernavn like '$this->BrukerID'
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
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "SELECT BrukerID 
            FROM bruker
            WHERE Brukernavn like '$this->UserName' 
            AND Passord like '$this->Password'
            ";
        $query = $db->query($sql);
        if (!$query) return -1;
        
        $affectedRows = $db->affected_rows;
        if ($affectedRows > 0)
        {
            $row = $query->fetch_object();
            return $row->BrukerID;
        }
        return -1;
    }
    
    function checkPassword()
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "SELECT BrukerID 
            FROM bruker
            WHERE Brukernavn like '$this->Brukernavn' 
            AND Passord like '$this->Passord'
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
    // DENNE FUNKER IKKE MED DATABASE
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
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
    
    function addUser ()
    {
        if ($this->checkZip($this->zip) == "null")
            $this->addZip();
        $password = hash('sha256', $this->Password);
        
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql = "Insert into bruker (Fornavn, Etternavn, Brukernavn, Epost, Telefonnr, Adresse, Postnr, Fodselsnr, Passord)";
        $sql.= "Values ('$this->FirstName','$this->Surname','$this->UserName','$this->email', '$this->phone', '$this->adress', '$this->zip', '$this->birth', '$password')";
        $query = $db->query($sql);
        echo 'hello';
        if (!$query) 
            return "Feil , kunne ikke sette inn i databasen.";
        else 
        {
            echo 'hello';
            return;
        }
    }
    
    function checkZip($zip) {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "SELECT poststed
            FROM poststed
            WHERE postnr like '$zip'
            ";
        $query = $db->query($sql);
        if (!$query) return -1;
        
        $affectedRows = $db->affected_rows;
        if ($affectedRows > 0)
        {
            $row = $query->fetch_object();
            return $row->poststed;
        }
        else
        {
            return "null";
        }
    }
    
    function addZip () {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "Insert into poststed (postnr, poststed)
            VALUES ('$this->zip', '$this->state')
            ";
        $query = $db->query($sql);
        if (!$query) return -1;
    }
}

class course
{
    public $CourseID;
    public $CourseName;
    public $CourseAcsess;
    public $CourseMessageHeader;
    public $CourseMessage;
    
    function newCourse()
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql="Insert Into kurs (Kursnavn)
            Values ('$this->$CourseID')";
        $query = $db->query($sql);
        if (!$query) return -1;
        else 
        {
            $this->$CourseID = $db->insert_id;
            return $this->$CourseID;
        }
    }
    
    function showAllCourseNameInUlList()
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "Select Kursnavn, KursID 
            from kurs
            ";
        $query = $db->query($sql);
        if (!$query) return 0;
        $affectedRows = $db->affected_rows;
        
        for ($i = 0; $i < $affectedRows; $i++)
        {
            $row = $query->fetch_object();
            echo '<a href=\'course.php?courseid=';
            echo $row->KursID;
            echo '&amp;coursename=';
            $courseName = $row->Kursnavn;
            echo $courseName;
            echo '\'>' . "\n";
            echo $courseName;
            echo '</a>' . "\n";
        }
    }
    
    function adminCourse()
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "Select Kursnavn, KursID 
            from kurs
            ";
        $query = $db->query($sql);
        if (!$query) return 0;
        $affectedRows = $db->affected_rows;
        
        for ($i = 0; $i < $affectedRows; $i++)
        {
            $row = $query->fetch_object();
            $CourseName [] = $row->Kursnavn;
            $CourseID [] = $row->KursID;
        }
        
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<div class="editCourse">'."\n";
            echo '<div class="editCourseName" onclick="courseName('.$i.');">';
            echo $CourseName [$i];
            echo '</div>'."\n";
            echo '<div class="rightEditCourse">'."\n";
            echo '<img src="bilder/users.png"/>'."\n";
            echo '<img onclick="deleteCourse('.$i.');" src="bilder/trash.png"/>'."\n";
            echo '</div>'."\n";
            echo '</div>'."\n";
            // Delete Course
            echo '<div class="deleteCourse">'."\n";
            echo 'Vil du slette kurset'.$CourseName [$i]."?";
            echo '<div class="deleteCourseYes">Ja</div>'."\n";
            echo '<div class="deleteCourseNo">Nei</div>'."\n";
            echo '</div>'."\n";
            // Course Name
            echo '<div class="adminCourseName">'."\n";
            echo '<form action="" method="post">'."\n";
            echo '<input class="textEditCourseName" type="text" name="coursename" 
               placeholder="Course name" 
               title="Please enter your course name" 
               value="'.$CourseName[$i].'"'."\n";
            echo '<input type="submit" class="submitEditCourseName" name="createcourse" value="Endre Navn" />'."\n";
            echo '</form>'."\n";
            echo '</div>'."\n";
        }
        
        for ($i = 0; $i < $affectedRows; $i++)
        {
            
        }
    }
    
    function showCourseNameInUlList($userID) 
    // DENNE FUNKER IKKE MED DATABASE
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "Select k.Kursnavn 
            from kurs as k, courseacsess as ac  
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
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "
            Select Item
            from kursitem   
            where KursID = '$this->CourseID'
            ";
        $query = $db->query($sql);
        if (!$query) return;
        
        $affectedRows = $db->affected_rows;
        if ($affectedRows == 0) 
            return $this->CourseID;
        echo '<div id="courseValg">'. "\n";
        echo '<div id="courseValgList">'. "\n";
        for ($i = 0; $i < $affectedRows; $i++)
        {
            $row = $query->fetch_object();
            $courseURL= '.php?courseid='.$this->CourseID.
                    '&amp;coursename='.$this->CourseName.'">';
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
            echo '</a>'. "\n";
        }
        echo '</div>';
        echo '</div>';
    }
    
    function showAllMessageFromThisCourse ()
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "Select FeedID, Overskrift, Melding 
            from kursfeed
            where KursID = '$this->CourseID'
            ";
        $query = $db->query($sql);
        if (!$query) return 0;
        
        $affectedRows = $db->affected_rows;
        echo '<div id="newsfeedList">'. "\n";
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<div></div>'. "\n";
        }
        echo '</div>'. "\n";
        
        $feedId = array();
        $message = array();
        $header = array ();
        for ($i = 0; $i < $affectedRows; $i++)
        {
            $row = $query->fetch_object();
            $feedId [] = $row->FeedID;
            $message [] = $row->Melding;
            $header [] = $row->Overskrift;
        }
        echo '<div id="hiddenFeed">'. "\n";
        echo '<ul id="newsfeedID">'. "\n";
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<li>';
            echo $feedId[$i];
            echo '</li>'. "\n";
        }
        echo '</ul>'. "\n";; 
        echo '<ul id="newsfeedHeader">'. "\n";
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<li>';
            echo $header[$i];
            echo '</li>'. "\n";
        }
        echo '</ul>'. "\n";;
        echo '<ul id="newsfeedMessage">'. "\n";
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<li>';
            echo $message[$i];
            echo '</li>'. "\n";
        }
        echo '</ul>'. "\n";
        echo '</div>'. "\n";
        
        echo '<div id="newsfeedListFooter">'. "\n";
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<div class="footerh">';
            echo $header[$i];
            echo '<div class="footerp"></div></div>'. "\n";
        }
        echo '</div>'. "\n";
        echo '<div id="newsfeedListLink">'. "\n";
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<div class="feedsbox" onmouseover="hoverFooter('.$i;
            echo ');" onmouseout="outFooter('.$i.');"></div>'. "\n";
        }
        echo '</div>'. "\n";
        echo '</div>'. "\n";
    }
    
    function showAllMessageFromCourse ()
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "Select FeedID, Overskrift, Melding 
            from kursfeed
            ";
        $query = $db->query($sql);
        if (!$query) return 0;
        
        $affectedRows = $db->affected_rows;
        echo '<div id="newsfeedList">';
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<div></div>';
        }
        echo '</div>';
        echo '<div id="newsfeedListFooter">';
        $feedId = array();
        $message = array();
        $header = array ();
        for ($i = 0; $i < $affectedRows; $i++)
        {
            $row = $query->fetch_object();
            $feedId [] = $row->FeedID;
            $message [] = $row->Melding;
            $header [] = $row->Overskrift;
        }
        echo '<div id="hiddenFeed">';
        echo '<ul id="newsfeedID">';
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<li>';
            echo $feedId[$i];
            echo '</li>';
        }
        echo '</ul>';
        echo '<ul id="newsfeedHeader">';
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<li>';
            echo $header[$i];
            echo '</li>';
        }
        echo '</ul>';
        echo '<ul id="newsfeedMessage">';
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<li>';
            echo $message[$i];
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
        
        
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<div class="footerh">';
            echo $header[$i];
            echo '<div class="footerp"></div></div>';
        }
        echo '</div>';
        echo '<div id="newsfeedListLink">';
        for ($i = 0; $i < $affectedRows; $i++)
        {
            echo '<div class="feedsbox" onmouseover="hoverFooter('.$i;
            echo ');" onmouseout="outFooter('.$i.');"><div></div></div>';
        }
    }
    
    function getFeedMessage ($feedID)
    {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "Select Melding 
            from kursfeed
            Where FeedID = $feedID
            ";
        $query = $db->query($sql);
        if (!$query) return 0;
        
        $row = $query->fetch_object();
        return $row->Melding;
    }
            
    function newCoursefeed()
    {
        echo $this->CourseID+" "+$this->CourseMessageHeader+" "+$this->CourseMessage+" ";
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql="  Insert Into Kursfeed (KursID, Overskrift, Melding)
                Values ($this->CourseID, '$this->CourseMessageHeader', '$this->CourseMessage')";
        $query = $db->query($sql);
        if (!$query) return -1;
        else 
        {
            return "ok";
        }
    }
    
    function editCourse () {
        $db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if (!$db) die(); //Feilhåntering!
        $sql= "Select Kursnavn, KursID 
            from kurs
            ";
        $query = $db->query($sql);
        if (!$query) return 0;
        $affectedRows = $db->affected_rows;
        
        for ($i = 0; $i < $affectedRows; $i++)
        {
            $row = $query->fetch_object();
            echo '<div onclick="location.href=\'course.php?courseid=';
            echo $row->KursID;
            echo '&amp;coursename=';
            $courseName = $row->Kursnavn;
            echo $courseName;
            echo '\';">' . "\n";
            echo $courseName;
            echo '</div>' . "\n";
        }
    }
}
?>
