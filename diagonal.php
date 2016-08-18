<?php
    $array = array(
        array(1,2,3),
        array(4,5,6),
        array(7,8,9)
);



for($i = 0;$i <= 4;$i++){

    //if($i == 0)
      //  print $array[$i][0] . '<br>';
    //else {
        $str = $array[$i][0] . " ";

        //if(isset($array[$i-1][1])){
            $str .= $array[$i-1][1] . " ";
          //  if(isset($array[$i-2][2])){
                $str .= $array[$i-2][2];
                $str .= '<br>';
            //} else {
             //$str .= '<br>';
            //}
        //}

        print $str;
        $str = '';
     //}
}
