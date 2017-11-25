<?php $this->load->view('header') ?>;


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-2">
                <img src="<?php echo base_url('res/img/klogo.png')?>" alt="Koski" />
           
                    
                </div>
                <div class="col-lg-10">
               
                  <h1 class="page-header">Buildings-Rooms</h1>
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
                <th>View Rooms</th>
            </thead>
            <tbody>
                <?php foreach(get_data('tbl_buildings') as $value) { ?>
                    <tr>
                        <td><?php echo $value['building_name']?></td>
                        <td><?php echo $value['building_location']?></td>
                       <td><a href="<?php echo site_url()?>/buildings/rooms/<?php echo $value['building_id']?>">Rooms in <?php echo $value['building_name']?></a></td>
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
