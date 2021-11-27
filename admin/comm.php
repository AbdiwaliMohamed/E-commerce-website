
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:index.php');
}
else{
    date_default_timezone_set('Africa/Addis_Ababa');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );
    if(isset($_GET['del']))
    {
        mysqli_query($con,"delete from productreviews where id = '".$_GET['id']."'");
        $_SESSION['delmsg']="Comments deleted !!";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| product Comments</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

<div class="wrapper" style="background-color: lightblue">
    <div class="container">
        <div class="row">
            <?php include('include/sidebar.php');?>
            <div class="span9">
                <div class="content">

                    <div class="module" style="background-color: lightblue">
                        <div class="module-head" style="background-color: lightblue">
                            <h3>Product Comments</h3>
                        </div>
                        <div class="module-body table" style="background-color: lightblue">
                            <?php if(isset($_GET['del']))
                            {?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                </div>
                            <?php } ?>

                            <br />


                            <table cellpadding="0" cellspacing="0" border="0" class=" table table-bordered table-striped	 display table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Id</th>
                                    <th> Name</th>
                                    <th>Summary</th>
                                    <th>Review</th>
                                    <th>quality stars</th>
                                    <th>price stars</th>
                                    <th>stars value</th>
                                    <th>Review Date </th>
                                    <th>Delete</th>


                                </tr>
                                </thead>
                                <tbody>

                                <?php $query=mysqli_query($con,"select * from productreviews");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt);?></td>
                                    <td><?php echo htmlentities($row['productId']);?></td>
                                    <td><?php echo htmlentities($row['name']);?></td>
                                    <td><?php echo htmlentities($row['summary']);?></td>
                                    <td> <?php echo htmlentities($row['review']);?></td>
                                    <td> <?php echo htmlentities($row['quality']);?></td>
                                    <td> <?php echo htmlentities($row['price']);?></td>
                                    <td> <?php echo htmlentities($row['value']);?></td>
                                    <td><?php echo htmlentities($row['reviewDate']);?></td>
                                   <td> <a href="comm.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>

                                    <?php $cnt=$cnt+1; } ?>

                            </table>
                        </div>
                    </div>



                </div><!--/.content-->
            </div><!--/.span9-->
        </div>
    </div><!--/.container-->
</div><!--/.wrapper-->

<?php include('include/footer.php');?>

<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    } );
</script>
</body>
<?php } ?>