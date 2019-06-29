<?php 
    include 'inc/header.php'; 
    include 'lib/Member.php';

?>
    <?php 

    $member = new Member();
    if(isset($_GET['id'])){

        $member->deleteMember($_GET['id']);
    }
    ?>
<?php include 'inc/js.php'; ?>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
<?php include 'inc/footer.php'; ?>
