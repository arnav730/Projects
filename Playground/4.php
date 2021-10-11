

<form>
    <p>Type a number?</p>
    <input name="number" type="number">
    <input type="submit" value="Go!">

</form>    

<?php

if($_GET["number"]%2==0)
echo $_GET["number"]." is a Even Number";
else
echo $_GET["number"]." is a  Odd Number";  

?>