<?php $this->load->view('header') ?>;



    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Koski REMS v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

          
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                     
                        <li>
                            <a href="<?php echo site_url()?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-building-o"></i> Buildings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('buildings')?>">List</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('buildings/buildings_room')?>">Rooms</a>
                                </li>
                                <li>
                                    <a href="">Workorder</a>
                                </li>
                                <li>
                                    <a href="">Tenants</a>
                                </li>
                                <li>
                                    <a href="">Documents</a>
                                </li>
                                <li>
                                    <a href="">Actions</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-users"></i> Landlords<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Accounting</a>
                                </li>
                                <li>
                                    <a href="">Documents</a>
                                </li>
                                <li>
                                    <a href="">Reciepts</a>
                                </li>
                                <li>
                                    <a href="">Notes</a>
                                </li>
                                <li>
                                    <a href=""> Buildings</a>
                                </li>
                                  
								<li>
                                    <a href="">Actions</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-home"></i> Rooms<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">List</a>
                                </li>
                                <li>
                                    <a href="">Accounting</a>
                                </li>
                                <li>
                                    <a href="">Notes</a>
                                </li>
								
                                <li>
                                    <a href="">Actions</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-users"></i> Tenants<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">List</a>
                                </li>
                                <li>
                                    <a href="">Accounting</a>
                                </li>
                                <li>
                                    <a href="">Documents</a>
                                </li>
                                <li>
                                    <a href="">Reciepts</a>
                                </li>
                                <li>
                                    <a href="">Notes</a>
                                </li>
								
                                <li>
                                    <a href="">Actions</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                    <a href=""><i class="fa fa-edit fa-fw"></i> Accounting</a>
					<a href=""><i class="fa fa-gear fa-fw"></i> Workorder</a>
					<a href=""><i class="fa fa-phone fa-fw"></i> Contacts</a>
                </li>
				
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench -o"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Switch Month</a>
                                </li>
              
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                      
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-2">
                <img src="<?php echo base_url('res/img/klogo.png')?>" alt="Koski" />
           
                    
                </div>
                <div class="col-lg-10">
               
                  <h1 class="page-header">Buildings-Actions</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12 col-md-12">
                <button style="float: right;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Building</button>
          
                </div>
             </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <?php if(isset($name)) { ?>
    <h2>Edit building Records.</h2> 
   <form method="post" action="<?php echo site_url()?>/buildings/edit" data-abide>
        <label>building Name</label> &nbsp &nbsp &nbsp
        <input type="text" name="name" class="form-control" value="<?php echo $name ?>" required=""/>
      <br/>  <br/> 
        <label>Location</label>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <input type="text" name="location" class="form-control" value="<?php echo $location ?>" required=""/> <br/> <br/>              
        <label>building Description</label>  <br/>
        <textarea class="form-control" name="description"><?php echo $description ?></textarea> <br/><br/>
        
        <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>" required=""/>
        
        <input type="submit" value="Edit" class="button"/>
    </form>
       <?php  } else { ?>
        <table id="datatable">
            <thead>
                <th>Building Name</th>
                <th>Building Location</th>
                <th>Building Description</th>
                <th>Action</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php foreach(get_data('tbl_buildings') as $value) { ?>
                    <tr>
                        <td><?php echo $value['building_name']?></td>
                        <td><?php echo $value['building_location']?></td>
                        <td><?php echo $value['building_description']?></td>
                        <td><a href="<?php echo base_url()?>index.php/buildings/delete_building/<?php echo $value['building_id']?>"<?php echo $value['building_id'];?> onclick="return confirm('Are you sure you want to delete this record?');">Delete</a></td>
                      <td><a href="<?php echo site_url()?>/buildings/update/<?php echo $value['building_id']?>">Edit</a></td>
                    </tr>              
                <?php } ?>
            </tbody>
            <?php } ?>
        </table>
                </div>
              
            
                </div>
          
            </div>
            
        </div>
        <!-- /#page-wrapper -->

   <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3>Create new building.</h3>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url()?>/buildings/create" data-abide>
        <label>Building Name</label> &nbsp &nbsp &nbsp
        <input type="text" name="building_name" class="form-control" placeholder="e.g Rehema building" required=""/>
      <br/>  <br/> 
        <label>Location</label>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <input type="text" name="location" class="form-control" placeholder="e.g. 5th Street Ngara" required=""/> <br/> <br/>              
        <label>Building Description</label>  <br/>
        <textarea name="desc" class="form-control" placeholder="A brief description about the building"></textarea> <br/><br/>
        
        <input type="submit" value="Create" class="btn btn-success"/>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- /#wrapper -->

  
<?php $this->load->view('footer');?>
