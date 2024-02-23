<?php
if (!isset($_SESSION['user'])) {
      header('Location: /');
      die();
}
require "layouts/header.php";
require "layouts/navbar.php";
$user = $_SESSION['user'];
?>
<!-- Begin Page Content -->
<link rel="stylesheet" href="vendor/profile/main.css">


<div class="container emp-profile">
      <form method="post">
            <div class="row">
                  <div class="col-md-4">
                        <div class="profile-img">
                              <img width="30px" height="30px" class="rounded-circle" src="assets/profiles/<?= $user['image'] ?>" alt="">
                              <div class="file btn btn-lg btn-primary" data-toggle="modal" data-target="#editImage">
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="profile-head">
                              <h5>
                                    POS SYSTEM
                              </h5>
                              <h6>
                                    <?= $user[1]; ?>
                              </h6>
                        </div>
                        <div class="row">
                              <div class="col-md-12">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row">
                                                      <div class="col-md-5">
                                                            <label>Role</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <p><?= $user[5]; ?></p>
                                                      </div>
                                                      <br>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-5">
                                                            <label>Create at:</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <p><?= $user[7]; ?></p>
                                                      </div>
                                                      <br>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-5">
                                                            <label>Email</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <p><?= $user[2]; ?></p>
                                                      </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-5">
                                                            <label>Phone</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <p><?= $user[3]; ?></p>
                                                      </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-5">
                                                            <label>Profession</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <p>Web Developer and Designer</p>
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="row">
                                                      <div class="col-md-6">
                                                            <label>Experience</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <p>Expert</p>
                                                      </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-6">
                                                            <label>Hourly Rate</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <p>10$/hr</p>
                                                      </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-6">
                                                            <label>Total Projects</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <p>230</p>
                                                      </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-6">
                                                            <label>English Level</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <p>Expert</p>
                                                      </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-6">
                                                            <label>Availability</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <p>6 months</p>
                                                      </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-12">
                                                            <label>Your Bio</label><br />
                                                            <p>Your detail description</p>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

            </div>

      </form>
      <!-- The Modal create-->
      <div class="modal" id="editImage">
            <div class="modal-dialog">
                  <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header ">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body text-center">
                              <form action="controllers/profile/update.profile.controller.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?=$user['id']?>">
                                    <h4 class="modal-title text-center">UPDATE PROFILE PHOTO</h4>
                                    <br>

                                    <!-- <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width: 150px;" alt="Avatar" /> -->
                                    <img width="150px" height="150px" class="rounded-circle" src="assets/profiles/<?= $user['image'] ?>" alt="" id="img">

                                    <script>
                                          function readURL(input) {
                                                if (input.files && input.files[0]) {

                                                      var reader = new FileReader();
                                                      reader.onload = function(e) {
                                                            document.querySelector("#img").setAttribute("src", e.target.result);
                                                      };

                                                      reader.readAsDataURL(input.files[0]);
                                                }
                                          }
                                    </script>


                                    <div class="custom-file pmd-custom-file mb-3 mt-3">
                                          <input type="file" class="custom-file-input is-valid" name="imagePro" accept="image/*" onchange="readURL(this)">
                                          <label class="custom-file-label is-valid" for="validatecustomFile">Choose Photho</label>
                                    </div>


                                    <h5 class="mb-2"><strong><?= $user[1] ?></strong></h5>
                                    <p class="text-muted"><button type="submit" class="badge bg-primary">UPDATE</button></p>

                              </form>
                        </div>

                        <!-- Modal footer -->

                  </div>
            </div>
      </div>
</div>
<?php
require "layouts/footer.php";
?>