<div class="viewinternships" style="background:#0cf050;padding:0.4rem;height:250px;overflow-x:scroll">
    <h1 align="center">View Open Internships</h1>
    <?php
include "../../includes/connection.php";

    $internshipsdata = "SELECT * from `internships` ORDER BY id DESC";
    $internshipsquery = mysqli_query($conn, $internshipsdata);
    while ($indata = mysqli_fetch_assoc($internshipsquery)) {
        $inurl = $indata['pdf'];
    ?>
        <h5 style="text-transform:capitalize;background:#000;padding:0.5rem" class="basic_mrgn">
            <a href="<?php echo $inurl; ?>" target="_blank" style="color:#fff">
                <?php echo $indata['title']; ?></a><span style="color:#e10cf0;font-size:0.7rem"><?php echo " On " . $indata['postdate']; ?></span>
        </h5> 
    <?php } ?>
</div>