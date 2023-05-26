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
                    <ul><a href="users/students/signup.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp Student Login</a></ul>
                    <ul><a href="forum.php"><i class="fa-regular fa-message"></i>&nbsp Forum</a></ul>
                    <ul><a href="https://www.overleaf.com/8646338143yhgpzszvpmxv" target="_blank">Resume Generator</a></ul>
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
                    <ul><a href="#">Co-ordinator Login</a></ul>
                </div>
            </li>
            <li><a href="JavaScript:void(0)">Alumni <i class="fas fa-caret-down"></i></a>
            <div class="dropdown_menu">
              <ul><a href="#"><i class="fa-solid fa-right-to-bracket"></i>&nbsp Alumni Login</a></ul>
              <ul><a href="#"><i class="fa-solid fa-magnifying-glass"></i>&nbsp Alumni Search</a></ul>
            </div>
          </li>
            <li><a href="JavaScript:void(0)">Contact Us</i></a>
            <?php
            session_start();
                if (isset($_SESSION['email'])) {
                ?>
            <li><a href="users/dashboard/student.php" id="dashboard">Dashboard</i></a>
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