<div class="table-responsive" style="font-family: ui monospace;">
  <span style="background-color: #f7ff9f7d; padding: 21px 5px 5px 5px;">
    <span><b>DRAFT</b> <span style="background-color:#f3bcbc; border-radius: 50px;">&nbsp;&nbsp;&nbsp;&nbsp;</span></span> &nbsp;|&nbsp;
    <span><b>PUBLISHED</b> <span style="background-color:#93a9f5; border-radius: 50px;">&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
  </span>
  <table class="table table-bordered" id="table_news" width="100%" cellspacing="0" style="font-size: 15px;">
    <thead>
      <tr>
        <th>IMAGE</th>
        <th>TITLE</th>
        <th>AUTHOR</th>
        <th>DESCRIPTION</th>
        <th>DATE</th>
        <th>STATUS</th>
        <th width="7%"><center>Action</center></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($news as $key => $article): ?> 
      <?php 
      if ($article['status'] == 'draft') 
      {
        $style = ' style="background-color:#f9d3d3; border:3px solid red;" ';
      }
      else
      {
        $style = ' style="background-color:#b6c4f5;" ';
      }
       ?>
       <tr <?php echo $style; ?>>
        <td>
          <center>
            <img id="td_image<?php echo $article['id'];?>" data-data0="<?php echo $article["image"];?>" src="<?php echo $article["image"];?>" style="height:50px;width:50px;" class="img-rounded"> 
          </center>
        </td>
        <td>
          <div id="td_title<?php echo $article['id'];?>" data-data1="<?php echo $article['author']; ?>">
            <?php echo $article['author']; ?>
          </div>
        </td>
        <td>
          <div id="td_author<?php echo $article['id'];?>" data-data2="<?php echo $article['title']; ?>">
            <?php echo $article['title']; ?>
          </div>
        </td>
        <td>
          <div id="td_description<?php echo $article['id'];?>" data-data3="<?php echo $article['description']; ?>">

            <?php echo $article['description']; ?>
          </div>
        </td>
        <td>
          <div id="td_dateuploaded<?php echo $article['id'];?>" data-data1="<?php echo $article['dateuploaded']; ?>">
            <?php echo $article['dateuploaded']; ?>
          </div>
        </td>
        <td>
          <div id="td_status<?php echo $article['id'];?>" data-data1="<?php echo $article['status']; ?>">
            <?php echo $article['status']; ?>
          </div>
        </td>
        <td>
          <center>
            <div class="cell-button-alignment">
              <div class="cell-button btn-group">
                <button type="button" id="td_btn_edit" data-id_edit="<?php echo $article['id'];?>" data-toggle= "modal" data-target="#modalUpdateProduct" class="btn btn-md btn-primary">
                  <span class="fas fa-edit"></span>
                </button>
                
                <button type="button" id="td_btn_delete" data-id_delete="<?php echo $article['id'];?>" class="btn btn-md btn-danger">
                  <span class="fa fa-trash"></span>
                </button>
              </div>
            </div>
          </center>
        </td>

      </tr>
    <?php endforeach ?>    
  </tbody>
</table>
</div>


<!---------------------------------------------------- MODAL ADD------------------------------------------------------------------ -->
          <div id="modalAddProduct" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

              <form action="" onsubmit="insertData(); return false;">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title" style=" margin: 0 auto;">Add News</h4>
                  </div>
                  <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                     <center>
                        <img class="ml-2" src="../images/news.png" style="width: 170px; height: 170px; border-radius: 50%;" id="image_editProfile"><br>
                        <label class="btn btn-primary btn mt-2" style="width:150px;">
                        <span class="fa fa-picture"></span>&nbsp&nbspBrowse Image<input type="file" style="display: none;" id="file_editProfile">
                        </label>
                      </center>
                      Author:
                      <input type="text" class="form-control" id="author">
                      Title:
                      <input type="text" class="form-control" id="title" name="">
                    </div>
                    <div class="col-md-6">
                      Description:

                      <!-- <textarea id="noise" name="noise" class="widgEditor nothing"></textarea> -->
                      <!-- <textarea id="summernote"></textarea> -->

                      <div class="page-wrapper1 box-content">

                          <textarea class="content1" name="example"></textarea>

                      </div>



                    </div>
                  </div>


                  </div><!-- <div class="modal-body"> -->

                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                    <button type="submit" class="btn btn-success" id="btnInserNews">Save <i class="fas fa-check"></i></button>
                    <!-- <input type="submit" value="Check the submitted code" /> -->
                  </div>
                </div>
                <!-- <div class="modal-content"> -->
              </form>


            </div>
          </div>
<!---------------------------------------------------- MODAL ADD------------------------------------------------------------------ -->



<!--------------------------------------------------- MODAL EDIT------------------------------------------------------------------ -->
       <div id="modalEditProduct" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">

          <!-- <form action="" onsubmit="updateData(); return false;"> -->
            <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                  <h4 class="modal-title" style=" margin: 0 auto;">Update News</h4>
                </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-6">
                         <center>
                            <img class="ml-2" src="../images/news.png" style="width: 170px; height: 170px;" id="image_updateProfile"><br>
                            <label class="btn btn-primary btn mt-2" style="width:150px;">
                            <span class="fa fa-picture"></span>&nbsp&nbspBrowse Image<input type="file" style="display: none;" id="file_updateProfile">
                            </label>
                          </center>
                          Author:
                          <input type="text" class="form-control" id="editAuthor">
                          Title:
                          <input type="text" class="form-control" id="editTitle" name="">
                      </div>
                      <div class="col-sm-6">
                          Description:

                          <!-- <textarea id="editNoise" name="noise" class="widgEditor nothing"></textarea> -->
                          <!-- <textarea id="editSummernote"></textarea> -->
                           <div class="page-wrapper1 box-content">

                              <textarea class="content2" name="example"></textarea>

                          </div>

                          <br>
                          Publish:
                          <select class="form-control mt-3" name="newsStatus" id="newsStatus" style="width:60% !important;">
                            <option value="published" style="background-color: seagreen !important; color:white;">Publish <i class="fa fa-check"></i></option>
                            <option value="draft" style="background-color: red !important; color:white;">Draft <i class="fa fa-times"></i></option>
                          </select>
                      </div>
                    </div>


                  </div><!-- <div class="modal-body"> -->


                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                  <button type="button" class="btn btn-success" id="btnUpdateNews">Update <i class="fas fa-sync-alt"></i></button>
                  <!-- <input type="submit" value="Check the submitted code" /> -->
                </div>
              </div>

            <!-- </form> -->

          </div>
        </div>
