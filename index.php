<?php @session_start();
require('control/crypto.php');
error_reporting(0);
if(!$_SESSION['id'] ){header('location:../index.php');} 
if($_SESSION['who'] !="stu" ){header('location:../index.php');} ?>
<head><meta http-equiv="refresh" content=""/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.3.min.css">
	<link rel="stylesheet" href="css/jqm-demos.css">
	<script src="js/jquery.js"></script>
	<script src="i/js/index.js"></script>
	<script src="js/jquery.mobile-1.4.3.min.js"></script>
	<!--
	<link rel="stylesheet" href="themes2/multi.min.css" />
	<link rel="stylesheet" href="themes2/jquery.mobile.icons.min.css" />
	-->
</head>
<script type="text/javascript">
/*$(function () {
       $(':text').bind('keydown', function (e) {
        //on keydown for all textboxes
           if (e.target.className != "searchtextbox")
     //excludes specific textbox like SearchTextBox
     {
               if (e.keyCode == 13) { //if this is enter key
                   e.preventDefault();
                   return false;
               }
               else
                  return true;
           }
           else
               return true;
       });
    });*/
</script>
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
</STYLE>
<script>
$(document).ready(function()
{

	
$("#simple-post").click(function()
{
	$("#ajaxform").submit(function(e)
	{
		$("#simple-msg").html("<center><img src='load.gif'/></center>");
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
			{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				$("#simple-msg").html('<pre><code class="prettyprint">'+data+'</code></pre>');

			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#simple-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	//STOP default action
	  
	});
		
	$("#ajaxform").submit(); //SUBMIT FORM
});

});
</script>
        <style>
            .olControlAttribution {
                bottom: 3px;
            }
			#header {
  position: fixed;
  width:100%;
}
#simple-msg{
}

        </style>
<div data-role="page" id="demo-page" data-url="demo-page" >
    <div data-role="header" id="header" data-position="fixed" style="background-color:#006CD9;">
        <h1><font color="white">GENERAL SEARCH</font></h1>
		<a href="#left-panel" data-icon="bars" data-iconpos="notext" data-shadow="true" data-iconshadow="true" data-theme="b">Menu</a>
		<br>

<div class="ui-grid-a">
<form name="ajaxform" id="ajaxform" action="ajax-form-submit.php" method="POST" >
<center>				
<div class="ui-block-a"  style="width:90%;padding-left:2%"><input type="search" name="search-2" id="NAME" value="" placeholder='Enter any lecturer cred To Search....eg(name,ID,Mail)'/></div><div class="ui-block-b"><button class="ui-btn ui-btn-inline" type="submit" value="search" id="simple-post">Search...</button></div>
</div><br>
</center>        
    </div><!-- /header -->

    <div role="main" class="ui-content" id="simple-msg" style="width:100%">

	<?php
$reg=$_SESSION['reg'];
$last=$_SESSION['last'];
//date("d", $last)==date("d", $reg)
 if(date("d", $last)==date("d", $reg)):
 $img="img/ser.jpg";$img= base64_encode(file_get_contents($img)); 
?>
<center><button STYLE="background-color:white;width:50%">GETTING STARTED</button><br><br><a><img src="data:image/png;base64,<?php echo $img; ?>"</a></center>
<?php
endif;
if(date("d", $last) !=date("d", $reg)){
echo "<center>
	<br><br><br><br><br>

<table border=\"0\">
<tr>
<td><a href=\"repo.php?act=\" style=\"text-decoration:none\" data-ajax=\"false\" ><p align=\"left\" class=\"ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini\"style=\"background-color:white;\"><img src=\"data:image/png;base64,$img width=\"107px\" height=\"127px\"/><font color=\"#006CD9\" style=\"float:right\">KOFI ASANA<BR><BR>COMPUTER SCIENCE<BR><BR> UNIVERSITY OF GHANA</font></p></a></td>
<td><a href=\"repo.php?act=\" style=\"text-decoration:none\" data-ajax=\"false\" ><p align=\"left\" class=\"ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini\"style=\"background-color:white;\"><img src=data:image/png;base64,mg width=\"107px\" height=\"127px\"/><font color=\"#006CD9\" style=\"float:right\">KOFI ASANA<BR><BR>COMPUTER SCIENCE<BR><BR> UNIVERSITY OF GHANA</font></p></a></td>
<td><a href=\"repo.php?act=\" style=\"text-decoration:none\" data-ajax=\"false\" ><p align=\"left\" class=\"ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini\"style=\"background-color:white;\"><img src=data:image/png;base64,mg width=\"107px\" height=\"127px\"/><font color=\"#006CD9\" style=\"float:right\">KOFI ASANA<BR><BR>COMPUTER SCIENCE<BR><BR> UNIVERSITY OF GHANA</font></p></a></td>

</tr>


</table>

	</center>
    	";
}?>
            </div><!-- /content -->
<?php require('footer.php');?>
<body oncontextmenu="return false; ">
<?php require('menu.php'); ?>
</body>
</body>
