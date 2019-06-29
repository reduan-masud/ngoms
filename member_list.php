<?php 
    include 'inc/header.php'; 
    include 'lib/Member.php';
?>


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Member List
                </h2>
            </div>
            <?php
            $member = new Member();
            $rows = $member->getAllMember();

            ?>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List of All Member
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SL.No.</th>
                                            <th>Name</th>
                                            <th>Book No</th>
                                            <th>Mobile No</th>
                                            <th>Admission date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SL.No.</th>
                                            <th>Name</th>
                                            <th>Book No</th>
                                            <th>Mobile No</th>
                                            <th>Admission date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                        $i = 0;
                                        foreach ($rows as $row) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $member->getBookNoByMemberId($row['id']);?></td>
                                            <td><?php echo $row['mobile'];?></td>
                                            <td><?php echo $row['admission_date'];?></td>
                                            <td><a class="btn btn-success" href="member_profile.php?id=<?php echo $row['id'];?>">View</a> <a href="delete_member.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a></td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
<?php include 'inc/js.php'; ?>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>


    <!-- Demo Js -->
    <script src="js/demo.js"></script>
<?php include 'inc/footer.php'; ?>