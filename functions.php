<?php

//include 'constants.php';
include_once('constants.php') ;


/* Picks a random index that is then used to access the word and clue*/
function PickWord(){
	$_SESSION["CLUE_IDX"] = mt_rand(0,2); // 0,1 -> an array of size 2
}

//Seeing if the user hit the submit button
function ifSubmit(){
	if(isset($_POST['submit']) && isset($_POST['letter']) ){ //trim($_POST['letter']) != ''
		return true;
	}else{return false;}
		
}

//Discards Old Values 
function discardOldValues(){
	//Discard Old Values
	$_POST['letter'] = null;
	$_POST['submit'] = null;
}

//Checking to See if the User Input is right
function ifUserInputNotCorrect(){
	$words = array("Carrot", "Banana", "Eggplant");
	
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!CHECK HERE IS IT SUPPOSED TO BE THREE === I AM CHANGING TO TWO ==!!!!!!!!!! )=== false){//
	if( stripos($words[$_SESSION["CLUE_IDX"]], $_POST['letter']) >= 0 ){
		return true;
	}else{return false;}		
}


function updateImgIndex(){
	$_SESSION["IMG_IDX"]++;
		//!!!!
}

function newSession(){
	$words = array("Carrot", "Banana", "Eggplant");
	
	if(!isset($_SESSION["CLUE_IDX"])){ // We dont want this variable to be reset everytime the page is refreshed, so we set it only 
														// when it is not set. i.e the first time
														
		$_SESSION["CLUE_IDX"] = mt_rand(0,2); // The Zero to One correspond to the size of the $words array(size = 2)
		$_SESSION["IMG_IDX"] = 0 ;
		
		$_SESSION["USR_OUT"] = array();
		
		for($i = 0; $i < strlen($words[$_SESSION["CLUE_IDX"]]); $i++){
				$_SESSION["USR_OUT"] [$i] = "_";
		}
	}
	
function replace_(){
	$words = array("Carrot", "Banana", "Eggplant");
	for($i =0; $i < strlen($words[$_SESSION["CLUE_IDX"]]); $i++){
			if($_POST['letter'] == $words[$_SESSION["CLUE_IDX"]]{$i}){
				$_SESSION["USR_OUT"] [$i] = $_POST['letter'];
			}
	}
}
	
	
}

?>