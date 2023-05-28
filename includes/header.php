<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/notification.css">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="assets/images/bvec.jpg" type="image/x-icon">
    <title>BVEC Training and Placement</title>
</head>

<header class="">
    <nav id="navbar">
        <ul id="ul">
            <li><a href="index.php">Home</a></li>
            <li><a href="notification.php">Notification</a></li>
            <li><a href="internship.php">Internship</a></li>
            <li><a href="JavaScript:void(0)">For Students <i class="fas fa-caret-down"></i></a>
                <div class="dropdown_menu">
                    <ul><a href="users/students/login.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp Student Login</a></ul>
                    <ul><a href="forum.php"><i class="fa-regular fa-message"></i>&nbsp Forum</a></ul>
                    <ul><a href="https://www.overleaf.com/8646338143yhgpzszvpmxv" target="_blank">Resume Generator</a></ul>
                    <?php
                    if (session_status() !== PHP_SESSION_ACTIVE) {
                        session_start();
                    }
                    ?>
                    <ul><a href="NOC-form.php">NOC Apply</a></ul>
                    <ul><a href="https://drive.google.com/file/d/15CY83lWnHaGVrk8RpDufH_iYzoJfI-ME/view?usp=share_link " target="_blank">Placement Policies</a></ul>

                </div>
            </li>
            <li><a href="JavaScript:void(0)">For Recruiters <i class="fas fa-caret-down"></i></a>
                <div class="dropdown_menu">
                    <ul><a href="placementrecord.php">Placement Record</a></ul>
                    <ul><a href="#reach_us">Reaching BVEC</a></ul>
                    <ul><a href="#">Facilities</a></ul>
                    <ul><a href="https://drive.google.com/file/d/15CY83lWnHaGVrk8RpDufH_iYzoJfI-ME/view?usp=share_link " target="_blank">Placement Policies</a></ul>
                </div>
            </li>
            <li><a href="JavaScript:void(0)">Co-ordinator <i class="fas fa-caret-down"></i></a>
                <div class="dropdown_menu">
                    <?php
                    if (session_status() !== PHP_SESSION_ACTIVE) {
                        session_start();
                    }

                    if (isset($_SESSION['iscoordinator'])) {
                    ?>
                        <ul><a href="users/coordinator/coordinator.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp Dashboard</a></ul>
                    <?php
                    } else {
                    ?>
                        <ul><a href="users/coordinator/coordinator.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp Co-ordinator Login</a></ul>
                    <?php
                    } ?>

                    <ul><a href="users/coordinator/searchstudents.php">Verify Students</a></ul>
                </div>
            </li>
            <li><a href="JavaScript:void(0)">Alumni <i class="fas fa-caret-down"></i></a>
                <div class="dropdown_menu">
                    <ul><a href="users/alumni/login.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp Alumni Login</a></ul>
                    <ul><a href="users/coordinator/searchstudents.php"><i class="fa-solid fa-magnifying-glass"></i>&nbspSearch Students</a></ul>
                </div>
            </li>
            <li><a href="JavaScript:void(0)">Contact Us</i></a>
                <?php
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }

                if (isset($_SESSION['email']) && !isset($_SESSION['isalumni'])) {
                ?>
            <li><a href="users/dashboard/student.php" id="dashboard">
                    <?php $string = $_SESSION['photos'];
                    $author_img = str_replace("../../", "", $string);  ?>
                    <img style="border-radius: 50%;" src="<?php
                                                            echo $author_img ?>" alt="" width="30px" height="30px"></i>
                </a>
            <?php
                };
                if (isset($_SESSION['email']) && isset($_SESSION['isalumni'])) {
            ?>
            <li><a href="users/dashboard/alumni.php" id="dashboard">
                    <?php $string = $_SESSION['photos'];
                    $author_img = str_replace("../../", "", $string);  ?>
                    <img style="border-radius: 50%;" src="<?php
                                                            echo $author_img ?>" alt="" width="30px" height="30px"></i>
                </a>
            <?php
                };
            ?>
            </li>
            <li><a href="https://www.linkedin.com/company/training-and-placement-cell-barak-valley-engineering-college/about/" target="_blank">
                    <i class="fa fa-linkedin" aria-hidden="true" style="background-color: blue;padding: 5px;border-radius: 30%;"></i>
                </a>
            </li>
        </ul>
    </nav>
</header>