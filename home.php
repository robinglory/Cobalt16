<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auctionmate</title>
    <link rel="stylesheet" href="home.css">
    <script defer src="homeScript.js"></script>
    <!---------------Font awesome------------------->
    <script src="https://kit.fontawesome.com/3199f86940.js" crossorigin="anonymous"></script>
    
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- bootstrap link -->
    
    <!-- icons -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- icons -->

    <!---------font family--------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">


</head>
<body>
    <!-- navbar top -->
    <div class="container">
        <div class="navbar-top">
            <!--At the left side-->
            <div class="logo">
                <img src="img/logo.png" alt="COBALT 16 Logo" style="width: 270px; height: auto;">
            </div>


            <!--At the right side-->
            <!-- <div class="search"> 
              <form>
                  <input type="text" placeholder="Search..." class="searchInput">
                  <button type="button" class="btn" id="searchbut"><i class="fa-solid fa-magnifying-glass"></i></button>
              </form>
          </div>       -->
        </div>
    </div>
    <!-- navbar top -->

    <!-- navbar bottom -->
    <nav class="navbar navbar-expand-md" id="navbar-color">
           <div class="container">
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span><i class="fa-solid fa-bars" style="color: #fff !important;"></i> <!---menu icon-->
            </button>
          
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="analysis.php">Analysis</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="survey.php">Survey</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ai_chatbot.php">Ask Chatbot</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="aboutUs.php"> About Us</a>
                </li>
                <!-- <li class="nav-item">
                    <button class="nav-link login-btn"><i class="fa-regular fa-user"></i> &nbsp;Log In</button>
                </li> -->
              </ul>
            </div>
           </div> 
    </nav>
     <!-- navbar bottom -->
        <!-- home page content -->
        <div class="container home-content">
            <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="des">What is SMR and why we need it in Myanmar?</h2>
                <p class="subDes">Small modular reactors (SMRs) are advanced nuclear reactors that have a power capacity of up to 300MW(e) per unit.
During this time, Myanmar has been faced lots of power loss and black outs which results to affect our economy and sustainability and the one and only solutions for it is installing SMRs in our country.</p>
            </div>



                <!-- Right side image -->
                <div class="col-md-6">
                    <img src="img/bg.png" alt="auction" class="img-fluid">
                </div>
            </div>
        </div>
        <!-- home page content -->
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "atom";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch articles from the database
        $sql = "SELECT id, title, description, image_url FROM articles ORDER BY created_at DESC";

        $result = $conn->query($sql);
        ?>
        <!-- New iframe section -->
    <section class="iframe-section my-5" style="margin-bottom:0px !important;padding: 60px 0;background-color: #f7f7f7;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Explore the SMR Reactor Simulator</h2>
                    <p>Experience a virtual tour of a Small Modular Reactor.</p>
                    <iframe src="https://3d.energyencyclopedia.com/npp-smr/reactor?mode=iframe" 
                            frameborder="0" allowfullscreen 
                            style="width: 100%; aspect-ratio: 1280/720;">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
        <!-- Articles Section -->
        <section class="articles-section">
    <div class="container">
        <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="section-title">Explore Our Articles</h2>
            <p class="section-subtitle">Delve into articles focusing on the four key dimensions for building Small Modular Reactors (SMRs).</p>
        </div>

        </div>
        <div class="row">
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-3 col-md-6">'; // Adjusted for four articles per row
                        echo '    <div class="card" style="height:300px;">';
                        echo '        <img src="' . $row["image_url"] . '" class="card-img-top" alt="' . $row["title"] . '">';
                        echo '        <div class="card-body">';
                        echo '            <h5 class="card-title">' . $row["title"] . '</h5>';
                        // echo '            <p class="card-text">' . $row["description"] . '</p>';
                        echo '            <a href="article.php?id=' . $row["id"] . '" class="btn btn-primary">Read More</a>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No articles found.</p>';
                }
            ?>
        </div>
    </div>
</section>



<?php
$conn->close();
?>

<!-- Footer -->
<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container">
        <div class="row">
            <!-- About Us -->
            <div class="col-md-4">
                <h5>About COBALT 16</h5>
                <p>COBALT 16 is your dedicated platform for exploring innovative solutions in the nuclear energy sector, particularly focused on Small Modular Reactors (SMRs). </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Home</a></li>
                    <li><a href="analysis.php" class="text-white">Analysis</a></li>
                    <li><a href="survey.php" class="text-white">Survey</a></li>
                    <li><a href="ai_chatbot.php" class="text-white">Ask AI</a></li>
                    <li><a href="#" class="text-white">About Us</a></li>
                </ul>
            </div>

            <!-- Contact Us -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p><i class="fa-solid fa-envelope"></i> info@COBALT16.com</p>
                <p><i class="fa-solid fa-phone"></i> +95 123 456 789</p>
                <p><i class="fa-solid fa-map-marker-alt"></i> Insein Road, Yangon, Myanmar</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 COBALT 16. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>


</body>
</html>