<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include "includes/connection.php";
include "includes/header.php";

$data = "SELECT * from `notifications` ORDER BY id DESC";
$query = mysqli_query($conn, $data); 
?>
<link rel="stylesheet" href="css/notification.css">
<br><br><br><br>
<section class="PlcmntRcrd basic_mrgn">
    <div align="center">
        <h1>NOTIFICATION</h1>
    </div>
    <marquee direction="up" class="flex_arnd notices" id="myMarquee">
        <?php
        while ($notdata = mysqli_fetch_assoc($query)) {
            $noturl = $notdata['pdf'];
            $url = str_replace("../../", "", $noturl);
        ?>
            <h3>
                <a href="<?php echo $url; ?>">
                <?php echo $notdata['title']; ?></a> 

                <span><img src="https://bvec.ac.in/images/new.gif" alt=""></span>
            </h3>
        <?php } ?>
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