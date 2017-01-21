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
	return confirm("Edit news?");
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


 // Make sure an ID was passed
    if(isset($_GET['id'])) {
			  
    	// Get the ID
        $id = $_GET['id'];
     
        // Make sure the ID is in fact a valid ID
        if($id <= 0) {
            die('The ID is invalid!');
        }
        else {
            // Fetch the file information
            $query = "
                SELECT *
                FROM `news`
                WHERE `news_id` = '$id'";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
					
					$status = $row[news_status];
     
                    // Print data
					echo '
						<div class="cc_right">

				<div class="cn_head">Edit News</div>
				<div class="cn_cont">
					<p>
						<form name="myform" action="edit_news_process.php?id='.$row[news_id].'" method="POST" enctype="multipart/form-data">
        					<fieldset>
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Title</div>
									<input type="text" class="medium" name="newtitle" value="'.$row[news_title].'" />
								</p>
        						<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Change Image:</div>
									';
										
									$image = explode(", ", $row[news_img]);
									for($i=0; $i<10; $i++) {
										if ($image["$i"]!="") {
											echo '
											<img src="newspic/'.$image["$i"].'" width="100" />
											';
										}
									}
									
									echo '
            					</p>
								<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"></div>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">Choose number of file: 
                                    	<select name="jumfile" onchange="show()">
											<option value="" disabled selected>-select-</option>
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
									<textarea cols="70" rows="10" name="newtext" id="editor1">'.$row[news_text].'</textarea>
									<script>CKEDITOR.replace( "editor1",{uiColor:"#666",height:"360px"});</script>
								</p>  
								 <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Status Published</div>
									<select name="news_status">
                                    	<option selected value="'.$row[news_status].'">'.$row[news_status].'</option>
										';
										if ($row[news_status] == "published") {
											echo '<option value="unpublished">unpublished</option>';
										}
										else {
											echo '<option value="published">published</option>';
										}
									echo '
                                    </select>
								</p>
            				</fieldset>
                            <input type="hidden" name="n" />
    						<input type="submit" value="Save" name="submit" onclick="return functionDraft()" />
						</form>
					</p>
                    
                    
				</div>
					';
				
                // Free the mysqli resources
                mysqli_free_result($result);
            }
            else {
                echo "Error! Query failed: <pre>{$con->error}</pre>";
            }
            mysqli_close($con);
        }
    
    else 
        echo 'Error! No ID was passed.';
	
		}
	}

echo '
</div>
</div> <!-- End of cc_right -->
';

$footer = printfooter();
?>

   
   </body>
</html>
