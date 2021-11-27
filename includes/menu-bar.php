<div class="header-nav animate-dropdown" style="background-color: #0c3a83">
    <div class="container" >
        <div class="yamm navbar navbar-default" role="navigation" style="background-color: lightblue">
            <div class="navbar-header" style="background-color: #0c3a83">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class" style="background-color: #0c3a83">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
	<div class="nav-outer">
		<ul class="nav navbar-nav" style="background-color: #0c3a83">
			<li class="active dropdown yamm-fw" style="background-color: #0c3a83">
				<a href="index.php" data-hover="dropdown" class="dropdown-toggle">Home</a>
				
			</li>
              <?php $sql=mysqli_query($con,"select id,categoryName  from category ");
while($row=mysqli_fetch_array($sql))
{
    ?>

			<li class="dropdown yamm">
				<a href="category.php?cid=<?php echo $row['id'];?>"> <?php echo $row['categoryName'];?></a>
			
			</li>
			<?php } ?>

			
		</ul><!-- /.navbar-nav -->
		<div class="clearfix"></div>				
	</div>
</div>


            </div>
        </div>
    </div>
</div>