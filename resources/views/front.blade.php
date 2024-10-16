<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game view</title>
</head>
<body>
<h2>Welcome to Lucky7 Game</h2>
<br><br>

<a href="{{route('play')}}">Play</a>
<br>
<?php
if(isset($amt))
{
    echo "Amount Available: Rs." .$amt."<br>";
} 
else if(isset($set_amt))
{
    echo "Amount Available: Rs." .$set_amt."<br>";
}
else
{
    echo "Amount Available: Rs. 100 <br>";
}

?>

<?php if(isset($dice1) && isset($dice2)){ ?>
<label for="dice1">Dice1:</label>
<input type="text" name="dice1" id="dice1" value="{{$dice1}}">
<br><br>
<label for="dice1">Dice2:</label>
<input type="text" name="dice2" value="{{$dice2}}">
<br><br>
<label for="tot">Total: {{$sum}}</label>
<br><br>
@if($sum==7)
{{"You won the game!!"}}
@endif
<br><br>
<a href="{{route('reset')}}">Reset</a><br>
<a href="{{route('play_again')}}">Play Again</a>
<?php } ?>
</body>
</html>