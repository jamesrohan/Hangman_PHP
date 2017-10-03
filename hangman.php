<?php
include 'constants.php';
include 'functions.php';
// Start the session
session_start();
newSession();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Hangman</title>
  <link rel="stylesheet" type="text/css" href=""> </link>	
  <style>
	<?php include './css/hangman.css'; ?>
  </style>

 </head>
 <body>
		
	<p>
		<h1> Hangman </h1>	 
	</p>
	
	<p>
		<form method="post">
					
			<p>Guess the Letter</p>
			
			<!-- Image Container -->
			<p>
				<?php
				//the "_" array.
					$p_arr = $_SESSION["USR_OUT"];
					$img_hang = "<img src=\" ". $images[$_SESSION["IMG_IDX"]] .  " \" >"."</img>";
					$out_arr = '<div style="font-size: 28px;">' . implode(" ", $p_arr) . "</div>";
					echo $img_hang;
					
					echo $out_arr;										
					
					//Giving the user the clue and the word size
					echo "<h3>"."The word has ".strlen($words[$_SESSION["CLUE_IDX"]])." letters and is a " .$clues[$_SESSION["CLUE_IDX"]] ."</h3>";				
				
					//Seeing if the User hit the Submit button. On the screen the button will show as "Enter". And making sure the User Input is not empty
					if (ifSubmit()){
						
							replace_();
							
							//Checking to see if the User Input Ltter is inside of the word. Update Image if user input is not found in the word
							//https://secure.php.net/manual/en/function.stripos.php
							if( ifUserInputNotCorrect() ){
								$_POST['letter']=null;
									//Index out of Bounds protection. 7 is the size of the image array
									if($_SESSION["IMG_IDX"] < 7){
										//echo "<img src=\" ". $images[$_SESSION["IMG_IDX"]] .  " \" >"."</img>";
										//echo $img_hang;
										// Update Image Index	
										updateImgIndex();
									}							
								
								
									if($_SESSION["IMG_IDX"] == 7){// 3 Corresponds to Size of Image Array, if user has run out of tries
										echo "<p>"."Game Over"."</p>";
										// remove all session variables
										session_unset(); 									

										// destroy the session 
										session_destroy();									
									}elseif($_SESSION["IMG_IDX"] > 7){
																			
									 
										$_SESSION = array();
									}
							} else{
								$_POST['letter']=null;
							}
							
						discardOldValues();
						
					}
										
				?>
			</p>			
			
			<!-- Letter Input Box -->
			<p><input name="letter" type="text" size="20" /></p>
			
			<!-- Enter Button -->
			<p>
				<input type="submit" value="Enter" name="submit"></input>
				<!-- <input type="submit" value="Enter" name="submit"></input> -->
			</p>
			
		</form>
	</p>
	
	
	
 
 </body>
</html>