<?php require_once 'function php/fetchUsersData.php'; ?>

<!-- page-content  -->
<main class="page-content pt-2">
  <div id="overlay" class="overlay"></div>
    <div class="container-fluid p-5">

	<div class="row">
        <div class="col-md-12 mt-2">
            <center><h2>Public User Accounts</h2></center>

             <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-table"></i> User Management
              </div>
              <div class="card-body">
                <div class="table-responsive" style="font-family: ui monospace;">
                  <table class="table table-bordered" id="result1" width="100%" cellspacing="0" style="font-size: 15px;">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Birthday</th>
                        <th>Status</th>
                        <th>Date Registered</th> 
                        <th width="7%"><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $key => $user): ?>  
                      <tr>

                        <td>
                          <div id="td_name<?php echo $user['id'];?>" data-data0="<?php echo $user['lastname'].','.$user['firstname'].','.$user['middlename']; ?>">
                            <?php echo $user['firstname'].' '.$user['middlename'].' '.$user['lastname']; ?>
                          </div>
                        </td>

                        <td>
                          <div id="td_address<?php echo $user['id'];?>" data-data1="<?php echo $user['address']; ?>">
                            <?php echo $user['address']; ?>
                          </div>
                        </td>

                        <td>
                          <div id="td_mobile<?php echo $user['id'];?>" data-data2="<?php echo $user['mobile']; ?>">
                             <?php echo $user['mobile']; ?>
                          </div>
                        </td>

                        <td>
                          <div id="td_birthday<?php echo $user['id'];?>" data-data3="<?php echo $user['birthday']; ?>">
                             <?php echo $user['birthday']; ?>
                          </div>
                        </td>

                        <td>
                          <div id="td_status<?php echo $user['id'];?>" data-data4="<?php echo $user['status']; ?>">
                             <?php echo $user['status']; ?>
                          </div>
                        </td>

                        <td><?php echo $user['dateUploaded']; ?></td>

                        <?php if ( $user['status'] == 'approved' ) { ?>
                          <td>
                            <center>
                              <div class="cell-button-alignment">
                                <div class="cell-button btn-group">
                                  <button style="width:60px;" type="button" id="td_btn_edit" data-id_edit="<?php echo $user["id"]; ?>" data-toggle= "modal" data-target="#modalUpdate" class="btn btn-md btn-primary">
                                  <span class="fa fa-edit"></span></button>
                                  <button style="width:60px;" type="button" id="td_btn_delete" data-id_delete="<?php echo $user["id"]; ?>" class="btn btn-md btn-warning" data-toggle="modal" data-target="#residentsModal">
                                  <span class="fa fa-times-circle"></span></button>
                                  <button style="width:60px;" type="button" id="td_btn_remove" data-id_remove="<?php echo $user["id"]; ?>" class="btn btn-md btn-danger">
                                  <span class="fa fa-trash"></span></button>
                                </div>
                              </div>
                            </center>
                          </td>
                        <?php } else { ?>
                          <td>
                            <center>
                              <div class="cell-button-alignment">
                                <div class="cell-button btn-group">
                                  <button style="width:60px;" type="button" id="td_btn_approve" data-id_approve="<?php echo $user["id"]; ?>" data-toggle= "modal" data-target="#modalEditExam" class="btn btn-md btn-success">
                                  <span class="fa fa-check"></span></button>
                                  <button style="width:60px;" type="button" id="td_btn_edit" data-id_edit="<?php echo $user["id"]; ?>" data-toggle= "modal" data-target="#modalUpdate" class="btn btn-md btn-primary">
                                  <span class="fa fa-edit"></span></button>
                                  <button style="width:60px;" type="button" id="td_btn_remove" data-id_remove="<?php echo $user["id"]; ?>" class="btn btn-md btn-danger">
                                  <span class="fa fa-trash"></span></button>
                                </div>
                              </div>
                            </center>
                          </td>
                        <?php } ?>
                      </tr>
                      <?php endforeach ?> 

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer small text-muted"></div>
            </div>


      </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title text-white" id="exampleModalLabel" style="margin: 0 auto;">Update User <i class="fa fa-users-cog"></i></h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              Lastname:
              <input type="text" class="form-control" id="updateLastname">
            </div>
            <div class="col-md-4">
              Firstname:
              <input type="text" class="form-control" id="updateFirstname">
            </div>
            <div class="col-md-4">
              Middlename:
              <input type="text" class="form-control" id="updateMiddlename">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              Mobile Number:
              <input type="text" class="form-control" id="updateMobile">
            </div>
            <div class="col-md-6">
              Address:
              <input type="text" class="form-control" id="updateAddress">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              Birthday:
              <input type="date" class="form-control" id="updateBirthday">
            </div>
            <div class="col-md-6">
              Status:
              <select name="updateStatus" id="updateStatus" class="form-control">
                <option value="pending">Pending</option>
                <option value="approved">Approve</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnUpdateUser">Save changes <i class="fa fa-check"></i></button>
        </div>
      </div>
    </div>
  </div>

  </div><!-- container -->
</main>
<!-- page-content" -->

<?php include 'users.js'; ?>