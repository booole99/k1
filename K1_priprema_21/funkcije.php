<?php
function poruke($string, $tip=0){
    if($tip==0)echo "<p class='error'>$string</p>";
    if($tip==1)echo "<p class='info'>$string</p>";
    if($tip==2)echo "<p class='success'>$string</p>";
}