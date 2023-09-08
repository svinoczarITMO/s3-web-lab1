<?php
    function validate($x, $y, $R){
        if(-4 <= $x && $x <= 4 && -3 <= $y && $y <= 5 && 1 <= $R && $R <= 5){
            return true;
        }
        return false;
    }
    
    function checkDot ($x, $y, $R) {
        if ($x < $R and $x > 0 and $y > 0 and $y < 0.5 * $R and $y >= 2 / $R * abs($x)) {
            return true;
        }
        if ($x < $R and $x > 0 and $y < 0 and $y > -0.5 * $R) {
            return true;
        }
        $dist  = sqrt($x**2 + $y**2);
        if($dist < $R and $x<0 and $y<0){
            return true;
        }
        return false;
    }

    function test1 ($x, $y, $R) {
        if (checkDot($x, $y, $R)){
            print("KAIF");
        } else {
            print("NE KAIF");
        }
        print("\n");
    }
?>