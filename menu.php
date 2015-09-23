    <STYLE>
	
/* Adjust the width of the left reveal menu. */
#demo-page #left-panel.ui-panel {
    width: 15em;
	background-color:#006CD9;
}
#demo-page #left-panel.ui-panel-closed {
    width: 0;
	background-color:#006CD9;
}
#demo-page .ui-panel-page-content-position-left,
.ui-panel-dismiss-open.ui-panel-dismiss-position-left {
    left: 15em;
    right: -15em;
}
#demo-page .ui-panel-animate.ui-panel-page-content-position-left.ui-panel-page-content-display-reveal {
    left: 0;
    right: 0;
    -webkit-transform: translate3d(15em,0,0);
    -moz-transform: translate3d(15em,0,0);
    transform: translate3d(15em,0,0);
}
/* Listview with collapsible list items. */
.ui-listview > li .ui-collapsible-heading {
  margin: 0;
}
.ui-collapsible.ui-li-static {
  padding: 0;
  border: none !important;
}
.ui-collapsible + .ui-collapsible > .ui-collapsible-heading > .ui-btn {
  border-top: none !important;
  background-color:#006CD9;
}
/* Nested list button colors */
.ui-listview .ui-listview .ui-btn {
    /*background: #fff;*/
	background-color:#006CD9;
}
.ui-listview .ui-listview .ui-btn:hover {
   +/* background: #f5f5f5;*/
	background-color:#006CD9;
}
.ui-listview .ui-listview .ui-btn:active {
   /* background: #f1f1f1;*/
   background-color:#006CD9;
}
/* Reveal panel shadow on top of the listview menu (only to be used if you don't use fixed toolbars) */
#demo-page .ui-panel-display-reveal {
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
#demo-page .ui-panel-page-content-position-left {
    -webkit-box-shadow: -5px 0px 5px rgba(0,0,0,.15);
    -moz-box-shadow: -5px 0px 5px rgba(0,0,0,.15);
    box-shadow: -5px 0px 5px rgba(0,0,0,.15);
}
/* Setting a custom background image. */
#demo-page.ui-page-theme-a,
#demo-page .ui-panel-wrapper {
    background-color: #fff;
    background-image: url("img/bg-pattern.png");
    background-repeat: repeat-x;
    background-position: left bottom;
}
/* Styling of the page contents */
.article p {
    margin: 0 0 1em;
    line-height: 1.5;
}
.article p img {
    max-width: 100%;
}
.article p:first-child {
    text-align: center;
}
.article small {
    display: block;
    font-size: 75%;
    color: #c0c0c0;
}
.article p:last-child {
    text-align: right;
}
.article a.ui-btn {
    margin-right: 2em;
}
@media all and (min-width:769px) {
    .article {
        max-width: 994px;
        margin: 0 auto;
        padding-top: 4em;
        -webkit-column-count: 2;
        -moz-column-count: 2;
        column-count: 2;
        -webkit-column-gap: 2em;
        -moz-column-gap: 2em;
        column-gap: 2em;
    }
    /* Fix for issue with buttons and form elements
    if CSS columns are used on a page with a panel. */
    .article a.ui-btn {
        -webkit-transform: translate3d(0,0,0);
    }
}
dd.ui-collapsible-heading-collapsed >.ui-collapsible-heading-toggle{
background-image:url('../img/5e.jpg');
 }
</STYLE>
	<?php error_reporting(1);
@session_start();

require_once('control/query.php'); //INCLUDING STATEMENT TO INSERT SQL QUERY
 $qid="rel";  //det query 
 $path="../model/";	
 $dbase=$_SESSION['db'];
 $db= new ASK($path,$qid,$dbase);
      $sql=$db -> execute();
	   $ret= $db->query($sql);
 
	 //echo $ret;
    if(!$ret){//read error log
	  $fil_name=$db->path."readlec";
      $ab1=$db->lastErrorMsg();
	   require('log/error_log.php');
       openerror($ab1,$fil_name);
	   
   }
//collect data
$x5=0;


    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	if($_SESSION['id']==$row['FOLLOWER']  ){//COLLECTION RELATED LECTURERS
	       //$xO++;
		  
	       $class_ids[$x5]=$row['SLD_ID'];
		  
		   
	 $x5++;	   
	}   
   } 
//if(1){$ed=$class_ids[1];}
   $db->close();
   $xx=0;
foreach($class_ids as $classdds){
	
$qid="mail*$classdds"."msg";  //det query 
 $path="../model/";	
 $dbase=$_SESSION['db'];
 $db= new ASK($path,$qid,$dbase);
      $sql=$db -> execute();
	   $ret= $db->query($sql);
 
	 //echo $ret;
    if(!$ret){//read error log
	  $fil_name=$db->path."readlec";
      $ab1=$db->lastErrorMsg();
	   require('log/error_log.php');
       openerror($ab1,$fil_name);
	   
   }
$font_color="white";
//collect data
$mit="u";
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	if($_SESSION['id']==$row['resid'] && $row['stat']==$mit   ){//COLLECTION unread mails
	      
	     $hit=1;  
	 $xx++;	   
	 $font_color="white";
	}   
   } 
   $db->close();			

		

   }

   ?>
   <style>#left-panel {
  position: fixed;
  
}</style>
<?php
$insti=$_SESSION['db'];
$stuid=$_SESSION['id'];
//check for profile pic
$img="../model/stu_img/no.jpg";
//$mg="../model/fl_img/repo.jpg";
$part=$_SESSION['who'];
if(file_exists("../model/".$part ."_img/".$insti."_img/$stuid.jpg")){$img="../model/".$part ."_img/".$insti."_img/$stuid.jpg";}
if(file_exists("../model/".$part ."_img/".$insti."_img/$stuid.jpeg")){$img="../model/".$part."_img/".$insti."_img/$stuid.jpeg";}
if(file_exists("../model/".$part ."_img/".$insti."_img/$stuid.png")){$img="../model/".$part."_img/".$insti."_img/$stuid.png";}
if(file_exists("../model/".$part ."_img/".$insti."_img/$stuid.jpe")){$img="../model/".$part."_img/".$insti."_img/$stuid.jpe";}
if(file_exists("../model/".$part ."_img/".$insti."_img/$stuid.gif")){$img="../model/".$part."_img/".$insti."_img/$stuid.gif";}
/*if(file_exists("../model/stu_img/".$insti."_img/$stuid.png")){$img="../model/stu_img/".$insti."_img/$stuid.png";}
if(file_exists("../model/stu_img/".$insti."_img/$stuid.jpe")){$img="../model/stu_img/".$insti."_img/$stuid.jpe";}
if(file_exists("../model/stu_img/".$insti."_img/$stuid.gif")){$img="../model/stu_img/".$insti."_img/$stuid.gif";}*/
$img= base64_encode(file_get_contents($img));
$font_color ="white";
?>
	<div data-role="panel" id="left-panel"  style="background-color:#006CD9;"  >	
	
        <ul data-role="listview"  >
		                <li data-icon="delete" ><a  style="background-color:#006CD9;" href="#" data-rel="close"><font color="white">Close</font></a></li>
           <li data-role="list-divider" data-theme="b"><img  alt="MENU IMAGE" class="img-circle" src="data:image/png;base64,<?php echo $img; ?>" width="100%" height="100%"/><font color="white" size=3 face=segeo>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $_SESSION['fname']	;?>&nbsp <?php echo $_SESSION['lname'];?></font></li>
               
              
                <li data-icon="search"><a href="index.php"  rel="external" data-transition="flip"  style="background-color:#006CD9;"><font color="white">General Search</font></a></li>
          
                <li data-icon="bullets"><a href="repo.php" data-transition="fade" rel="external"  style="background-color:#006CD9;"><font color="white">Repository</font></a></li>
				<li data-icon="comment"><a href="frm.php" rel="external"  style="background-color:#006CD9;" ><font color="white">Forum</font></a></li>
				<li data-icon="mail" ><a   href="mail.php"rel="external" style="background-color:<?php if($hit==1){echo "red";}else{echo "#006CD9";}?>">
				<font color="<?php  echo $font_color;?>">Messenger</font><font size=3 color="<?php if($hit==1){echo "yellow";}?>"><?php if($hit==1){echo "&nbsp($xx &nbsp New)";}?></font></a></li>
                <li data-icon="phone"><a  style="background-color:#006CD9;" href="vcon.php" rel="external" ><font color="white">Lecturer Listing</font></a></li>
				<li data-icon="user"><a  style="background-color:#006CD9;" href="prof.php"rel="external"><font color="white">Profile</font></a></li>
				
				<li id="dd" data-role="collapsible" data-inset="false" data-iconpos="right" data-theme="b">
              <h3  style="background-color:#006CD9;">Support</h3>
              <ul data-role="listview">
                
                <li><a href="hpp.php" rel="external"  style="background-color:#006CD9;"><font color="white">Help</font></a></li>
				<li><a href="faqs.php" rel="external" style="background-color:#006CD9;" ><font color="white">FAQs</font></a></li>
				<li><a href="abt.php"rel="external" style="background-color:#006CD9;"><font color="white">About</font></a></li>
                <li><a href="lp.php" rel="external" ><font color="white">Legals and Privacy</font></a></li>
				              </ul>
			 <li data-icon="action"><a style="background-color:#006CD9;" href="../regmin.php?out=ysout" rel="external"><font color="white">Logout</font></a></li>
            </li><!-- /collapsible -->
              </ul>
			  
            
			
        
		             
		<br>	
		<center><h1><font color="white"><img src="../img/AIEDEC.png" width=150 height=150/></font></h1>
		<font color="white">CopyRight &copy; 2014</font></center>
		<!--<img src='pan2.gif'/>-->
		<div data-role="footer" data-position="fixed" data-theme="b" style="background-color:#006CD9;">
<center><h6<font color="white"></font>
		<font color="white" size=2></font></h6></center>
		</div>
    </div><!-- /panel -->
    
</div>







