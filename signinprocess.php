<?php

                                    require_once 'serverlogin.php';
                                    
                                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database,8889);
                                    if ($conn->connect_error) {
                                        die("Connection failed" . mysqli_connect_error());
                                    }
                              

                                        if($_POST['submit'] == 'Submit'){
                                            $username = $_POST['name'];
                                            $password = $_POST['password'];

                                            $myquery = "SELECT * FROM Signin WHERE Username='$username'";
                                            $result = $conn->query($myquery);
        

                                            if($result->num_rows > 0){
                                                
                                                if($result = $conn->query($myquery)) {
                                                    while ($rows = $result->fetch_assoc()) {
                                                        $userID = $rows['UserID'];
                                                        $artistID = $rows['ArtistID'];
                                                        $un = $rows['Username'];
                                                        $pw = $rows['Password'];
                                                    }
                                                }
                                                $conn->close();
                                                if(password_verify($password, $pw) ){
                                                    $_SESSION["username"] = $username;
                                                    $_SESSION["password"] = $password;
                                                    $_SESSION['UserID'] = $userID;
                                                    $_SESSION['ArtistID'] = $artistID;
                                                    $_SESSION["login"] = true;
                                                    if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
                                                        header('Location: post.php');
                                                        exit();
                                                    
                                                        }
                                                    exit();
                                                }
                                                else{
                                                    $errorMessage = "Sorry password is incorrect, please try again";
                                                    $_SESSION['error'] = $errorMessage;
                                                }
                                            } 
                                            
                                            else{
                                            
                                                   $errorMessage = "Username is incorrect, please try again";
                                                   $_SESSION['error'] = $errorMessage;
                                            }
                                        }
                                        
                                        
                                    
                                    
                                ?>