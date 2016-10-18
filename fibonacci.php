<?php
function fibonacci2($n,$first = 0,$second = 1)
{
    $fib = [$first,$second];
    for($i=1;$i<$n;$i++)
    {
        $fib[] = $fib[$i]+$fib[$i-1];
    }
    return $fib;
}

echo "<pre>";
print_r(fibonacci2(10));

function generate_fibonacci_sequence($length)
{
   for( $l = array(0,1), $i = 1, $x = 0; $i < $length; $i++ )
        $l[] = $l[$x++] + $l[$x];
   return $l;
 }
 
 print_r(generate_fibonacci_sequence(5));

 function fibonacci($number){
    if($number > 2){
        return fibonacci($number-1) + fibonacci($number - 2);
    } else {
        return $number;
    }
}

print fibonacci(10);
 
?>