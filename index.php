<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/utility.css">
  <link rel="shortcut icon" href="assets/images/bvec.jpg" type="image/x-icon">
  <title>BVEC Training and Placement</title>
</head>

<body>
  <!-- All href will open in new tab -->
  <!-- <base href="" target="_blank"> -->
  <div id="show"><i class="fas fa-solid fa-bars basic_mrgn" id="s" onclick="show()"></i></div>
  <div class="moving-clouds"></div>
  <div class="container">

    <header class="hero">
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
              <ul><a href="reachus.php">Reaching BVEC</a></ul>
            <ul><a href="facilities.php">Facilities</a></ul>
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
              <ul><a href="users/alumni/search.php"><i class="fa-solid fa-magnifying-glass"></i>&nbsp Alumni Search</a></ul>
            </div>
          </li>
          <li><a href="JavaScript:void(0)">Contact<i class="fas fa-caret-down"></i></a>
                <div class="dropdown_menu">
                    <ul><a href="contact.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp T&P officer</a></ul>
                    <ul><a href="coordinator-contact.php"><i class="fa-solid fa-magnifying-glass"></i>&nbsp coordinator</a></ul>
                </div>
            </li>
            <?php 
            if (isset($_SESSION['email']) && !isset($_SESSION['isalumni'])) {
              $string = $_SESSION['photos'];
              $author_img = str_replace("../../", "", $string);
            ?>
          <li><a href="users/dashboard/student.php" id="dashboard"><img style="border-radius: 50%;" src="<?php echo $author_img; ?>" alt="" width="30px" height="30px"></i></a>

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

    <section class="PlcmntRcrd basic_mrgn reveal">
      <div align="center" class="PlcmntRcrd_header">
        <h1><mark>Our Students Got Placed in</mark></h1>
      </div>
      <marquee class="cmpny_logo">
        <img src="./assets/images/sony.png" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/deloitte.webp" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/atlan.png" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/tcs.png" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/cognizant.png" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/Infosys.webp" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/mindtree.jpg" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/wipro.png" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/capegemini.png" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/cdac.jpg" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/B&B.jpg" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/xopuntech.png" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/boldtek.png" alt="" class="cmpnylogo mlr">
        <img src="./assets/images/tebixa.png" alt="" class="cmpnylogo mlr">
      </marquee>
    </section>
    <br>

    <section class="abt_bvec basic_mrgn reveal">
      <h1 align="center"><mark>About BVEC</mark></h1>
      <br>
      <div class="about_bvec">
        <img src="./assets/images/Home-transformed.png" alt="">
        <p class="about_bvec_para">
          Barak Valley Engineering College, Karimganj happens to be the fifth State Government Engineering College, was
          set up in the year 2017 for imparting and uplifting the technological mindset of students of Assam. The
          institute was set up with a motto of enhancing the academic as well as the holistic development of student
          fraternity. Barak Valley Engineering College aims to provide the ambience and culture for newer ideas to
          flourish and make the student acquaint with the modern cutting edge technology so that they transform into
          leaders of tomorrow.
          <br>
          <br>
          Furthermore, this Institute has emphasized on Industry Academia Collaboration and as a result of which we have
          Memorandum of Understanding (MoU) with Ziroh Labs, C-DAC, MSME to name a few where students can be exposed to
          the latest trends and techniques prevailing in industry along with curriculum. The institute tasted quite a
          success in terms of Placement Scenario as we had a large number of Multi-National Companies and Tech Giants
          recruiting our students along with some of the best startups of India. A few names to be spelt out are TCS,
          Cognizant, Mind tree, ATLAN along with many others. The highest package recorded till date is 10 LPA with an
          average package ranging from 3.6 LPA to 4.2 LPA every year.
        </p>
      </div>
    </section>
    <br>
    <section class="quick_links">
      <div class="grid reveal">
        <div class="grid-item-brochures ">
          <div class="card">
            <img src="./assets/images/brochurs.png" alt="" class="card-img">
            <div class="card-content">
              <h4 class="card-header">BROCHURES</h4>
              <p class="card-text">
                Brochures contains information about the programs, campus life, placements, and admissions process to
                prospective students. you can visit the link and download the college brochure.
              </p>
              <a href="https://drive.google.com/file/d/1wz1mrDCJLqgNO32ZY6q4UAEY3BRKD006/view?usp=sharing" target="_blank"><button class="card-btn">
                  Visit <span>&rarr;</span>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="grid reveal">
        <div class="grid-item ">

          <div class="card">
            <img src="./assets/images/placement.png" alt="" class="card-img">
            <div class="card-content">
              <h4 class="card-header">INTERNSHIP </h4>
              <p class="card-text">
                An internship and placement portal is a platform designed to connect students and job seekers with
                potential employers.
                Here students can check the current internship opportunities posted by the TPO.
              </p>
              <a href="internship.php" target="_blank"><button class="card-btn">
                  Visit <span>&rarr;</span>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="grid reveal">
        <div class="grid-item-policies">
          <div class="card">
            <img src="./assets/images/policies-card.png" alt="" class="card-img">
            <div class="card-content">
              <h4 class="card-header">POLICIES</h4>
              <p class="card-text">
                Policies typically outline the criteria for hiring. Placement policies can help ensure fairness,
                consistency, and transparency in the hiring process, and can help organizations attract and retain top
                talent
              </p>
              <a href="https://drive.google.com/file/d/15CY83lWnHaGVrk8RpDufH_iYzoJfI-ME/view?usp=share_link " target="_blank"><button class="card-btn">
                  Visit <span>&rarr;</span>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="grid reveal">
        <div class="grid-item-placement-coordinators">
          <div class="card">
            <img src="./assets/images/placement coordinators.png" alt="" class="card-img">
            <div class="card-content">
              <h4 class="card-header">PLACEMENT COORDINATORS</h4>
              <p class="card-text">
                Placement coordinators are professionals responsible for connecting job seekers with employment
                opportunities. They work with companies and organizations to identify job openings.
              </p>
              <a href="/contact.php" target="_blank"><button class="card-btn">
                  Visit <span>&rarr;</span>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="grid reveal">
        <div class="grid-item-placement-internship-noc">
          <div class="card">
            <img src="./assets/images/INTERNSHIP NOC APPLICATION.png" alt="" class="card-img">
            <div class="card-content">
              <h4 class="card-header">INTERNSHIP NOC APPLICATION</h4>
              <p class="card-text">
                An internship NOC (No Objection Certificate) application form is a document that interns can use to
                request permission from their academic institution or employer to pursue an internship with another
                organization
              </p>
              <a href="NOC-form.php" target="_blank"><button class="card-btn">
                  Visit <span>&rarr;</span>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="grid  reveal">
        <div class="grid-item-placement-placement-reports">
          <div class="card">
            <img src="./assets/images/placement reports.png" class="card-img">
            <div class="card-content">
              <h4 class="card-header">PLACEMENT REPORTS</h4>
              <p class="card-text">
                All the records of students getting placed along with company name, package details etc. will be displayed.
                .
              </p>
              <a href="placementrecord.php" target="_blank"><button class="card-btn">
                  Visit <span>&rarr;</span>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>

    </section>
    <br>
    <br>
    <br>
    <h1 align="center" class="msg_from_princ_h1 reveal"><mark>Message from the Principal</mark></h1>
    <section class="principal_msg reveal">

      <br>
      <div class="msg_from_princ basic_mrgn">
        <div>
          <img src="./assets/images/principal-sir.png" class="prncpl">
          <h4>Dr. Diganta Goswami</h3>
            <h5>Principal, BVEC</h5>
        </div>
        <p class="about_bvec_para">
          I am very much delighted to convey my warm greetings to all the Faculty, Staff and the newly admitted students
          of the Barak Valley Engineering College (BVEC). Owing to rapid social and technological changes taking place
          around us, there is an increasing need for quality engineers who can think creatively, apply their
          intelligence to solve problems and to create new designs and products for the ever changing world. Our mission
          is to mould highly competent technical professionals with wide range of analytic, strategic and leadership
          skills capable of facing the challenges of the technical world. Apart from academic activity, BVEC will also
          focus on the all-round development of students in extracurricular activities like sports and cultural
          activities. I envisage BVEC would play a central role in imparting skill development programmes to the youth
          of this region in particular, such that, it helps in local employment generation, prosperity and an overall
          development of the whole society. I hope this institute lives by the saying by Dr. Sarvepalli Radhakrishnan,
          "The true teachers are those who help us think for ourselves"-
        </p>

      </div>
    </section>
    <br>
    <br>
    <h1 align="center" class="reveal" "><mark>Message from Training & Placement Officer</mark></h1>
    <section class=" tp_msg ">
      <div class=" msg_from_tp basic_mrgn reveal">
      <div>
        <img src="./assets/images/nabarun-sir.png" class="tpo">
        <h4>Nabarun Chakraborty</h3>
          <h5>T&P Officer, BVEC</h5>
      </div>
      <br>
      <p class="about_bvec_para">The Training and Placement Cell is one of the integral part of our college. Training
        & Placement activities
        are organized throughout the year with a view to prepare the students to appear the campus recruitment process
        with confidence. Our aim is to place the maximum number of students through the campus & off campus interviews
        conducted by the companies. We assist the students in carrier planning and employment strategies and indulge
        the students to face competitive examination as well as interviews through training programs viz, aptitude
        tests, group discussions , mock interviews etc. We prepare the students to meet the industries recruitment
        process and invites the reputed companies to the college for organizing campus placement session. I am sure
        your visit to BVEC will be pleasant and fruitful. I wish my best wishes to you and your organisation.
      </p>
  </div>

  </section>
  <br>
  <br>
  <section class="reach_us basic_mrgn reveal">
    <section class="reach_us" id="reach_us">
      <div>
        <h1><mark>Reach Us</mark></h1>
        <br>
        <div class="ways2reach">
          <h2>By Air</h2>
          <br>
          <p>We are well connected by air to major cities like Guwahati, Kolkata and Bengaluru with the nearest airport
            being Silchar which is 45 Kms from the college.</p>
        </div>
        <br>
        <div class="ways2reach">
          <h2>By Rail</h2>
          <br>
          <p>Badarpur is the nearest major Railway station which is 17 Kms from the college.</p>
        </div>
        <br>
        <div class="ways2reach">
          <h2>By Road</h2>
          <br>
          <p>Our college is open to bus travel thanks to sprawling highways connected to Guwahati.</p>
        </div>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.954482983715!2d92.48193381500157!3d24.797012084083878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x374e2a23ec67508b%3A0xc81a2f646e8e4f46!2sBarak%20Valley%20Engineering%20College%20(BVEC)!5e0!3m2!1sen!2sin!4v1678824632883!5m2!1sen!2sin" width="30%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </section>
  </section>
  <?php
  include "includes/footer.php";
  ?>

</body>

</html>