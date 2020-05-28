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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="stylesheet.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

  
<body>

    <img src="large/large_longteal.png" alt="teal floral strip" id="largeteal">
    <img src="med/med_teal.png" alt="teal floral strip" id="medteal">
    <img src="small/small_teal.png" alt="teal floral strip" id="smallteal">
        <header>
            <img src="small/small_whirlies.png" alt="teal loopy lines" id="whirlies">
            <div id="header_index">
                <h1 id="title">Quarantine Cook</h1>
                <h3 id="subtitle">because you have <br hidden> nothing else to do.</h3>
            </div>

            <form method="post">
            <div id="searchbar">
                <input class="search" placeholder="search" name="search" >
                <button type="submit" id="button"><i class="fa fa-search"></i></button>
            </div>
            </form>
            <div hidden>
            <?php
                print_r($_POST);
                $search = $_POST['search'];
            ?>
            </div>

            <a href="help.php" id="help">?</a>
        </header>
        <main id="index">
            <div id="filter_content">
                <button class="filters">all</button>
                <button class="filters">protein</button>
                <button class="filters">cook time</button>
                <button class="filters">servings</button>
                <button class="filters">calories</button>
            </div>


<?php  
if (isset($_POST['search'])) {
    $query = "SELECT *  FROM `recipes` WHERE `title` LIKE '%$search%'";
    $query .= "OR `subtitle` LIKE '%$search%'";
    $result = mysqli_query($connection, $query);
}
else {
$query = "SELECT * FROM recipes";
$result = mysqli_query($connection, $query);
}

if (!$result) {
    die ("Database query failed.");
  }
/*
    switch($set_row){
    case isset($_POST['submit']): $search_result;
    break;
    case is_null($_POST['submit']): $search;
    break;
    default: $set_row = $search;
    }
**/
    while ($row = mysqli_fetch_assoc($result)){  ?>
    <div class="recipes">
        <a href="recipe.php?id=<?php echo $row['id'];?>">
        <?php $link_name = "recipe page"; ?>
        <div class="tile">
            <img src="recipe_img/<?php echo $row['main_img']; ?>" class="tile_pic" alt="<?php echo $row['title']; ?>">
            <div class="tile_txt">
                <div class="grid">
                    <img src="small/small_mandala.png" alt="teal floral mandala" id="mandala">
                    <h7><?php echo $row['title']; ?></h7>
                </div>
                <p class="sub"><?php echo $row['subtitle']; ?></p>
            </div>
        </div>
        </a>
    </div>
<?php $current_row++; } ?>



    </main>
<script src="script.js"></script>
</body>
</html>