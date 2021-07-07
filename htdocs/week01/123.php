<html>
<body>

<?php  
for ($x = 1; $x <= 100; $x++) {if($x%12==0){echo "*,";}else{echo "$x,";}
} 

echo "<br>";

for ($x = 2; $x<=100; $x+=2){if($x%12==0){echo "*,";}else{echo "$x,";}}
echo "<br>";
for ($x=3; $x<=100; $x+=3){if($x%12==0){echo "*,";}else{echo "$x,";}}
echo "<br>";
for($x=4;$x<=100;$x+=4){if($x%12==0){echo "*,";}else{if($x%8==0){echo "*,";}else{echo "$x,";}}}
echo "<br>";
for($x=6;$x<=100;$x+=6){if($x%12==0 or $x%5==0){echo "*,";}else{echo "$x,";}}
echo "<br>";
for($x=12;$x<=100;$x++){if($x%12==0){echo "$x,";}}
echo "<br>";
for($x=1;$x<=100;$x++){if($x%3==0 and $x%5==0){echo "Hello Word,";}else{if($x%5==0){echo "Word,";}else{if($x%3==0){echo "Hello,";}else{echo "$x,";}}}}
?>  
</body>
</html>
