<?php

    session_start();
        $_SESSION["login"] = $_SESSION["login"];
        $_SESSION["username"] = $_SESSION["username"];
        $_SESSION["password"] = $_SESSION["password"];
        $_SESSION["UserID"] = $_SESSION["UserID"];
        $_SESSION["ArtistID"] = $_SESSION["ArtistID"];

    if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
        header("location: signin.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Art by You</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.php">Art by You</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                            <li class="nav-item"><a class="nav-link" href="artists.php">Artists</a></li>
                            <li class="nav-item"><a class="nav-link" href="collections_T.php">Collections</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Signin</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="signin.php">Sign in</a></li>
                                    <li><a class="dropdown-item" href="signin.php?signout=true">Sign Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                                
                            <?php
                            
                                require_once 'serverlogin.php';
                                                
                                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database,8889);
                                            
                                if ($conn->connect_error) { 
                                    die("Connection failed!" . mysqli_connect_error());
                                }

                                mysqli_select_db($conn,$db_database)
                                    or die("Database Unavailable: ". mysql_error());            
                                        
                                    $name = "";                             
                                    $title = "";
                                    $theme = "";
                                    $fileName = "";
                                    $filePath = "";
                                    $artistID = $_SESSION["ArtistID"];

                                if(isset($_POST['submit'])){
                                    if($_POST['submit'] == 'Submit'){
                                        
                                        $title = $_POST['artTitle'];
                                        $theme = $_POST['theme'];
                                        $fileName = $_POST['fileName'];
                                        $filePath = "files/".$theme."/".$fileName;
                                        

                                        // if($theme == "Animals"){
                                        //     $themeID = 1;
                                        // }else if($theme == "Architecture"){
                                        //     $themeID = 2;
                                        // }else if($theme == "Crafts"){
                                        //     $themeID = 3;
                                        // }else if($theme == "Flowers"){
                                        //     $themeID = 4;
                                        // }else if($theme == "Paintings"){
                                        //     $themeID = 5;
                                        // }else if($theme == "Water"){
                                        //     $themeID = 6;
                                        // }
                                        $myquery1 = "SELECT DISTINCT ThemeID FROM themes WHERE Theme = \"$theme\"";
                                        $result1 = mysqli_query ($conn,$myquery1);
                                        if($result1->num_rows > 0){
                                            while($rowa = $result1){
                                                $artTheme = $rowa["ThemeID"];
                                            }
                                        }else{

                                            $stmt = $conn->prepare("INSERT INTO themes (Theme, ThemeImage) VALUES (?,?)");
                                            $stmt ->bind_param("ss", $theme,$filePath);
                                            $stmt ->execute();
                                            $stmt ->close();

                                            $result1 = mysqli_query($conn,$myquery1);
                                            while($rowa = $result1 -> fetch_assoc()){
                                                $artTheme = $rowa("ThemeID");
                                            }
                                        }
                                        
                                        
                                    }
                                }
                                





                                $myquery = "SELECT * FROM Artists WHERE ArtistID = '$artistID'";
                                $result = $conn->query($myquery);
                                
                                if($result->num_rows > 0){
                                    
                                    while($row = $result->fetch_assoc()){
                                        $artistID = $row["ArtistID"];
                                        $name = $row["Name"];
                                        $artistImage = $row["ArtistImage"];
                                        $artistType = $row["Type"];
                                        $artistDecr = $row["Description"];
                                    }
                                    
                                    $output = <<<HTML

                                        <h1 class="fw-bolder">$name Upload New Art</h1>
                                    HTML;
                                    echo $output;
                                }




                                    $statement = $conn->prepare("INSERT INTO ArtWork (Title, ArtImage, ThemeID, ArtistID) VALUES (?, ?, ?, ?)");
                                    $statement->bind_param("ssii", $title, $filePath, $themeID, $artistID);
                                    
                                    $statement->execute();

                                    $sql = "INSERT INTO Artwork (Title, ArtImage, ThemeID, ArtistID ) VALUES ('$title', '$filePath', '$themeID', '$artistID')";
                                    $statement->close();
                                    $conn->close();
                                
                            ?>
                            </div>
                                <div class="row gx-5 justify-content-center">
                                <div class="col-lg-8 col-xl-6">



                                <form id="contactForm" action ="post.php" method = "post">
                                    <!-- Username input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="artTitle" type="text" name="artTitle"/>
                                        <label for="artTitle">Art Title</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="theme" type="text" name="theme"/>
                                        <label for="theme">Theme</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="fileName" type="text" name="fileName"/>
                                        <label for="fileName">File Name</label>
                                    </div>
                                    <div><button class="btn btn-primary btn-lg" id="submitButton" name = "submit" type="submit" value ="Submit">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
