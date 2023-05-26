<?php
include "includes/header.php";
include "includes/connection.php";
$data = "SELECT * from `session22`";
$query = mysqli_query($conn, $data);
?>
<link rel="stylesheet" href="css/session.css">
<br><br><br><br>
<section class=" basic_mrgn">
  <h1 class="heading">SESSION 2018-2022 DATA</h1>

  <table class="styled-table">
    <thead>
      <tr>
        <th>Sl. No.</th>
        <th>Name</th>
        <th>Branch</th>
        <th>Company</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_assoc($query)) {
      ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['branch']; ?></td>
          <td><?php echo $row['company']; ?></td>
        </tr>
      <?php
      };
      ?>
    </tbody>
  </table>

</section>
<br>

<?php
include "includes/footer.php";

?>