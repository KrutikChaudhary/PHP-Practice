<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cookie Counter</title>
    <meta name="description" content="Registration Page (Loops)">
    <meta name="author" content="Gabriella Mosquera">
	<meta name="author2" content= "Krutik Chaudhary">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section id="container">
        <form action="welcome.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <input type="submit" value="Submit">
        </form>

        <?php
        $name=isset($_COOKIE['name']);
		$visits=isset($_COOKIE['visit']) ?  $_COOKIE['visits'] : 1;
		setcookie('visits',$visits,time() +3600*24*365);
		setcookie('name',$name,time()+3600*24*365);
        if (isset($visits)) {
            if ($visits > 1) {
                echo "<h1>Welcome back! This is visit number <span class='important'>$visits</span></h1>";
            } else {
                echo "<h1>Welcome to my site! This is your first visit!</h1>";
            }
        } 
        ?>
    </section>
</body>
</html>
