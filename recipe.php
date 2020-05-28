<?php
// Step 1: Create Database Connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "idm232";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check the connection is good with no errors
if (mysqli_connect_errno()) {
  die ("Database connection failed: " .
    mysqli_connect_error() .
    " (" . mysqli_connect_errno() . ")"
  );
}

$id = $_GET['id'];
// Step 2: Preform Database Query
$query = "SELECT * FROM recipes WHERE id=$id";
$result = mysqli_query($connection, $query);

// Check there are no errors with our SQL statement
if (!$result) {
  die ("Database query failed.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="stylesheet.css" type="text/css" rel="stylesheet">
</head>

<?php 
while ($row = mysqli_fetch_assoc($result)){  ?>

<body>

    <img src="large/large_longteal.png" alt="teal floral strip" id="largeteal">
    <img src="med/med_teal.png" alt="teal floral strip" id="medteal">
    <img src="small/small_teal.png" alt="teal floral strip" id="smallteal">

    <main>

    <header id="header">
        <a href="index.php" id="home_btn"><img src="small/tiny_flower.png" alt="small yellow flower" id="tinyflower"></a>
        <div id="header_txt">
            <h1 id="title"><?php echo $row['title']?></h1>
            <h3 id="subtitle"><?php echo $row['subtitle']?></h3>
        </div>
        <div class="info">
             <div id="1" class="info_box">
                <h4>Cook Time</h4>
                <p><?php echo $row['cook_time']?></p>
            </div>
            <div id="2" class="info_box">
                <h4>Serves</h4>
                <p><?php echo $row['servings']?></p>
            </div>
            <div id="3" class="info_box">
                <h4>Calories</h4>
                <p><?php echo $row['calories']?></p>
            </div>
        </div>
    </header>
    
    <div id="largegrid">
        <div id="boxes">
            <div id="fix_it">
            <div id="ingredients" class="box">
                <h2>ingredients</h2>
                <ul>
                <?php $ing = $row['all_ingredients'];
                            $explode = explode("*", $ing);
                            foreach ($explode as $item) {
                              $output = '<li>' . $item . '</li>';
                              echo $output;
                            }
                            unset($steps);?>
                </ul>
            </div>
        </div>
            <div id="instructions" class="box">
                    <h2>instructions</h2>
                    <ol>
                    <?php   $steps = $row['all_steps'];
                            $explode = explode("*", $steps);
                            foreach ($explode as $item) {
                              $output = '<li>' . $item . '</li>';
                              echo $output;
                            }
                            unset($steps);
                            
                    ?>        
                    <ol>
            </div>
        </div>
        <div id="bottom">
        <p id="description"><?php echo $row['description']?></p>
        <img id="food" src="recipe_img/<?php echo $row['main_img']?>"> <!--should I leave a space? come back to src when php starts-->
    </div>
    </div>
        <!-- //Is there a way to tage these to group similar recipes?
        <img class="similar_recipes"/>
        <img class="similar_recipes"/>
        -->
<?php }?>

    </main>
</body>
</html>