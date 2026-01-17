<?php

require "header.php";


$id = $_GET['id'];

$sql = "SELECT * FROM why_choose_us where id = '$id'";
$res = mysqli_query($con,$sql);
$whyChooseUs = mysqli_fetch_assoc($res);

?>

<section class="page-title" style="background-image:url(home/images/background/5.jpg)">
        <div class="auto-container">
            <h2><?= $whyChooseUs['title'] ?></h2>
            <ul class="bread-crumb clearfix">
                <li><a href="index">Home</a></li>
                <li><?= $whyChooseUs['title'] ?></li>
            </ul>
        </div>
</section>
<section>
    <?php echo str_replace("../../","",str_replace("Prefinet", $company_name,$whyChooseUs['body'])) ?>

</section>



<?php

require "footer.php";

?>

