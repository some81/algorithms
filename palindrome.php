<?php

function checkPalindrome($string){
    $revString = "";
    
    $exclude = array("`","'",",","’",' ');
    $string = str_replace($exclude,'',$string);
    
    for($i = strlen($string)-1; $i >= 0; $i--){
        $revString .= $string[$i];
    }
    
    if($string == trim(str_replace($exclude,'',$revString))){
        echo "The string is a palindrome!";
    } else {
        echo "The string is not a palindrome!";
    }
}

checkPalindrome('MADAM, I’M ADAM');