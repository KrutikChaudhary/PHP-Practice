<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$studyComplete = false;

for($i=0; $i<3; $i++){
    echo "MATH-HUB MATH-HUB MATH-HUB <br>";
}

echo "<br>";

echo "Welcome to Math-Hub by Krutik Chaudhary B00929397 <br><br>";
echo "Today we will solve basic math word problems <br><br>";

echo "Question 1: James bought 30 mangos for his friends, he realised there are not enough mangos!!! <br> So he went to market and bought 40 apples. How many total fruits does James have? <br> <br>";
echo "To find out total number of fruits we need to do addition <br>";

$mangos = 30;
$apple = 40;


echo "Total number of mangos with James are:" .$mangos. "<br>";
echo "Total number of apple with James are:" .$apple. "<br>";

$sum= $mangos + $apple;

echo "So, Total fruits is ";
echo "Mangos + Apples = " .$mangos. "+" .$apple. " = " .$sum. "<br><br>";

echo "Question 2: James has now 70 fruits, he has to give those fruits to 35 friends <br> How many fruits will each of his friends get? <br><br>";
$friends= 35;

echo "We need to use division to find out <br> <br>";
echo "We will divide total number of fruits by total number of friends <br>";
echo "Fruit per friend = Total fruits/total friends <br>";

$fruitPerFriend = $sum/$friends;

echo "Fruit per friend = " .$sum. "/" .$friends. "= " .$fruitPerFriend. "<br><br>";

$studyComplete = true;

if($studyComplete){
    echo "Math-Hub session is over <br>";
}

?>

</body>
</html>







