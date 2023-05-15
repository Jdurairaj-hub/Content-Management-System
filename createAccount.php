<?php
    session_start(); 
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
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            
                            <h1 class="fw-bolder">Create New Account</h1>
                            
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                
                            <?php
                            
                                require_once 'serverlogin.php';
                                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database,8889);
                                if ($conn->connect_error) {
                                    die("Connection failed" . mysqli_connect_error());
                                }
                                mysqli_select_db($conn,$db_database)
                                    or die("Unable to select database:".mysql_error());
                                        
                                        $name = "";
                                        $artist = "";
                                        $desc = "";
                                        $image = "";
                                        $username ="";
                                        $password ="";
                                        $imagePath = "";
                                        $errorMsg = "";
                                                
                                        if(isset($_POST['submit'])){
                                            if($_POST['submit']=='Submit'){
                                                $password = $_POST['password'];
                                
                                                //checks length
                                                if(!preg_match('/^.{7,}$/', $password)) {
                                                    $errorMsg .= "<br>Need atleast 7 characters.";
                                                }
                                
                                                //checks special characters
                                                if (!preg_match('/[!@#$%^&*]/', $password)) {
                                                    $errorMsg .=  "<br>Password must contain at least 1 special character";
                                                }
                                
                                                //checks uppercase letters
                                                if(!preg_match('/[A-Z]/', $password)) {
                                                    $errorMsg .= "<br>Need atleast 1 Capital Letter.";
                                                }
                                
                                                //checks numbers
                                                if(!preg_match('/[0-9]/', $password)) {
                                                    $errorMsg .= "<br>Need atleast 1 number.";
                                                }
                                
                                                //prints success message
                                                if(empty($errorMsg)) {
                                                    $errorMsg .= "<br>Password Successful!";

                                                    if(isset($_POST['submit'])){
                                                        if($_POST['submit']=='Submit'){
                                                            $name = $_POST['name'];
                                                            $artist = $_POST['artist'];
                                                            $desc = $_POST['description'];
                                                            $image = $_POST['image'];
                                                            $username = $_POST['username'];
                                                            $password = $_POST['password'];
                                                            $imagePath = "files/artists/".$image;
                                                                
                                                            $password_hass = password_hash($password, PASSWORD_DEFAULT);
                                                            
                                                            $myquery="SELECT Username FROM Signin WHERE Username = '$username'";
                                                            $result = $conn->query($myquery);
                                                            if ($result->num_rows >0) {
                                                                echo "Username exists";
                                                            }
                                                            else{
                                                                $statment = $conn->prepare("INSERT INTO Artists (Name, ArtistImage, Type, Description ) VALUES (?,?,?,?)");
                                                                $statment->bind_param("ssss",$name, $imagePath, $artist, $desc );
                                                                $statment->execute();
                                                                $statment->close();
            
                                                                $newData = $conn -> insert_id;
                                                                
                                                                $statmentNew = $conn->prepare("INSERT INTO Signin (ArtistID, Username, Password) VALUES (?,?,?)");
                                                                $statmentNew->bind_param("iss",$newData,$username,$password_hass);                                                                $statmentNew->execute();
                                                                $statmentNew->close();
                                                                $myquery1="SELECT UserID FROM Signin WHERE ArtistID = '$newData'";
                                                                $result1 = $conn->query($myquery1);
                                                                         
                                                                if ($result1 = $conn->query($myquery1)) {
                                                                    while ($row = $result1->fetch_assoc()) {
                                                                        $userID = $row['UserID'];
                                                                    }
                                                                }
                                                                        
                                                                $conn->close();
                                                                      
                                                                $_SESSION['UserID'] = $userID; 
                                                                $_SESSION['ArtistID'] = $newData;
                                                                $_SESSION['login'] = true;
                                                                header("Location: post.php");
                                                                exit();
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        

                                                
                            ?>




                                    <form id="contactForm" action ="createAccount.php" method = "post">
                                    <!-- Username input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" name="name"/>
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="artistType" type="text" name="artist" />
                                        <label for="artistType">Type of Artist</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="about" type="text" name="description" />
                                        <label for="about">Tell us about you</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="img" type="text" name="image" />
                                        <label for="img">Upload an image of yourself</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="username" type="text"  name="username" />
                                        <label for="username">Create a Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" type="password" name="password" />
                                        <label for="password">Create a Password</label>
                                    </div>
                                    <?php
                                        echo $errorMsg;
                                    ?>
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
