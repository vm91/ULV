<?php
    session_start();
    if(!isset($_SESSION['UID']))
    {
        header('location: logginn.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <link rel="stylesheet" type="text/css" title="Standard" href="style/styletopp.css" />
		<link rel="stylesheet" type="text/css" title="Standard" href="style/style.css" />
		<link rel="alternate stylesheet" type="text/css" title="Hoykontrast" href="style/style1.css" />
		<link rel="alternate stylesheet" type="text/css" title="Hoykontrast" href="style/styletopp1.css" />
        <link rel="shortcut icon" href="bilder/wolfico.ico">
        <title>ULV</title>
<script type="text/javascript" src="js/newsfeed.js"></script>

<script type="text/javascript" src="js/kontrast.js"></script>
<script type="text/javascript" src="js/skriftstr.js"></script>		

</head>

<body>

<b><a href="#" onclick="changeStyle('Standard'); return false;">Standard</a> 
</b><b><a href="#" onclick="changeStyle('Hoykontrast'); return false;">Høykontrast</a>
</b> <b>
<a href="javascript:void(0);" onclick="setTextSize('small'); return false;" title="Reduser skriftstørrelse" style="font-size:15px;">A</a></b><b>
<a href="javascript:void(0);" onclick="setTextSize('medium'); return false;" title="Normal skriftstørrelse" style="font-size:20px;">A</a></b><b>
<a href="javascript:void(0);" onclick="setTextSize('large'); return false;" title="Øke skriftstørrelse" style="font-size:25px;">A</a></b>
   

<?php
    include 'include/html.php';
        $html = new html();
        $html->topp();
        $html->courseStart();
        $html->showCourses();
        $html->newCourseButton();
        $html->courseEnd();
        
        $html->startContainer();
        $html->newsfeed();
        $html->deadline();
        $html->endContainer();
        
    ?>
</body>
</html>