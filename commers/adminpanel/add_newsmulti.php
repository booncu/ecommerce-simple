<?php
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
	  include "php/left.php";
	  include "php/footer.php";
?>

<html>
<head>
<title>ReadBoy Administrator</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/home.css" />
<link rel="shortcut icon" href="images/favicon.png">
<!-- accordion styling -->	
	<link rel="stylesheet" type="text/css" href="css/tabs-accordion.css"/> 
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/jwplayer/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="BejWJLx1E+lZwDQ9+oYpcTrdeGastP1tN8w5pg==";</script>
<link rel="stylesheet" type="text/css" href="css/th.css" />

<script>
function functionDraft() {
	return confirm("Add news?");
}

function show() {
	var n = document.myform.jumfile.value;
	var i;
	var string = "";

	for (i=0; i<=n-1; i++)
	{
		string = string + "Choose File: <input name=\"image"+ i + "\" type=\"file\"><br>";
	}
 
	document.getElementById('selectfile').innerHTML = string;
	document.myform.n.value = n;
}

</script>

</head>

<body>
<?php
$left = printleft();

?>
		<div class="cc_right">

				<div class="cn_head">Add News</div>
				<div class="cn_cont">
                
					<p>
						<form name="myform" action="add_newsmulti_process.php" method="POST" enctype="multipart/form-data">
        					<fieldset class='fieldset'>
								<legend>Add News</legend>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Title</div>
									<input type="text" class="medium" name="title" />
								</p>
                                <p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Image:</div>
                                    <div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">Choose number of file: 
                                    	<select name="jumfile" onChange="show()">
                                        	<option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                                   	<div id="selectfile">
                                    </div>
	    							
            					</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:100px; font-size:13px;">Content</div>
									<textarea cols="70" rows="10" name="text" id="editor1" ></textarea>
									<script>CKEDITOR.replace( 'editor1',{uiColor:'#666',height:'360px'});</script>
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Status Published</div>
									<select name="news_status">
                                        <option value="unpublished">Do not publish now</option>
                                        <option value="published">Publish now</option>
                                    </select>
								</p>
								
								</fieldset>
                            <input type="hidden" name="n" />
    						<input type="submit" value="Submit" name="submit" onClick="return functionDraft()" />
						</form>
					</p>
				
            </div>
             
			</div> <!-- End of cc_right -->

<?php
$footer = printfooter();

?></body>
</html>