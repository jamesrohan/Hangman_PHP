<?php
					
					
					//Array of Images
					$images = array('./img/1.png', './img/2.png', './img/3.png', './img/4.png', './img/5.png', './img/6.png', './img/7.png');
					//Array of "words and clues" their index's correspond 1 to 1
					//Dictionary of Words to pick from
					$words = array("Carrot", "Banana", "Eggplant");
					//$GLOBALS[w] = $words;
					$clues = array('Vegetable','Fruit','Vegetable');
					
					//Picking a random word from the above defined Word dictionary
					if(!isset($_SESSION["CLUE_IDX"])){ // We dont want this variable to be reset everytime the page is refreshed, so we set it only 
														// when it is not set. i.e the first time
														
						$_SESSION["CLUE_IDX"] = mt_rand(0,2); // The Zero to One correspond to the size of the $words array(size = 2)
						$_SESSION["IMG_IDX"] = 0 ;
					}
					
				

?>