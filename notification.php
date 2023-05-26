<?php
include "includes/header.php";
?>
<link rel="stylesheet" href="css/notification.css">
<br><br><br><br>
<section class="PlcmntRcrd basic_mrgn">
    <div align="center">
        <h1>NOTIFICATION</h1>
    </div>
    <marquee direction="up" class="flex_arnd notices" id="myMarquee">
        <h3><a href="https://bvec.ac.in/upload/notification/1665655746.pdf">Notification for attending
                Orientation program for the B.Tech first semester students </a> <span><img src="https://bvec.ac.in/images/new.gif" alt=""></span></h3>
        <h3><a href="https://bvec.ac.in/upload/notification/1666853181.pdf">Spot admission notification for JLEE
                2022 appeared candidates </a></h3>
        <h3><a href="https://bvec.ac.in/upload/notification/1665403799.pdf">Notice of lateral admitted students
                through JLEE 2022 </a></h3>
        <h3><a href="https://bvec.ac.in/upload/notification/1664011942.pdf">Physical reporting of candidates
                allotted seat in the 2nd round counseling CEE & JLEE 2022</a></h3>
        <h3><a href="https://bvec.ac.in/upload/notification/1662983883.pdf">Notification for online payment for
                CEE 2022 counseling </a></h3>
    </marquee>
</section>
<br>


<?php
include "includes/footer.php";
?>
<script>
    const marquee = document.getElementById('myMarquee');
    const h3Elements = marquee.getElementsByTagName('h3');
    for (let i = 0; i < h3Elements.length; i++) {
        h3Elements[i].addEventListener('mouseover', function() {
            marquee.stop();
        });
        h3Elements[i].addEventListener('mouseout', function() {
            marquee.start();
        });
    }
</script>
</body>

</html>