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

<div class="container-fluid">
      <style>
            body {
                  background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            }

            .emp-profile {
                  padding: 3%;
                  margin-top: 3%;
                  margin-bottom: 3%;
                  border-radius: 0.5rem;
                  background: #fff;
            }

            .profile-img {
                  text-align: center;
            }

            .profile-img img {
                  width: 70%;
                  height: 100%;
            }

            .profile-img .file {
                  position: relative;
                  overflow: hidden;
                  margin-top: -20%;
                  width: 70%;
                  border: none;
                  border-radius: 0;
                  font-size: 15px;
                  background: #212529b8;
            }

            .profile-img .file input {
                  position: absolute;
                  opacity: 0;
                  right: 0;
                  top: 0;
            }

            .profile-head h5 {
                  color: #333;
            }

            .profile-head h6 {
                  color: #0062cc;
            }

            .profile-edit-btn {
                  border: none;
                  border-radius: 1.5rem;
                  width: 70%;
                  padding: 2%;
                  font-weight: 600;
                  color: #6c757d;
                  cursor: pointer;
            }

            .proile-rating {
                  font-size: 12px;
                  color: #818182;
                  margin-top: 5%;
            }

            .proile-rating span {
                  color: #495057;
                  font-size: 15px;
                  font-weight: 600;
            }

            .profile-head .nav-tabs {
                  margin-bottom: 5%;
            }

            .profile-head .nav-tabs .nav-link {
                  font-weight: 600;
                  border: none;
            }

            .profile-head .nav-tabs .nav-link.active {
                  border: none;
                  border-bottom: 2px solid #0062cc;
            }

            .profile-work {
                  padding: 14%;
                  margin-top: -15%;
            }

            .profile-work p {
                  font-size: 12px;
                  color: #818182;
                  font-weight: 600;
                  margin-top: 10%;
            }

            .profile-work a {
                  text-decoration: none;
                  color: #495057;
                  font-weight: 600;
                  font-size: 14px;
            }

            .profile-work ul {
                  list-style: none;
            }

            .profile-tab label {
                  font-weight: 600;
            }

            .profile-tab p {
                  font-weight: 600;
                  color: #0062cc;
            }
      </style>

      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->

      <div class="container emp-profile">
            <form method="post">
                  <div class="row">
                        <div class="col-md-4">
                              <script>
                                    $(document).ready(function() {


                                          var readURL = function(input) {
                                                if (input.files && input.files[0]) {
                                                      var reader = new FileReader();

                                                      reader.onload = function(e) {
                                                            $('.avatar').attr('src', e.target.result);
                                                      }

                                                      reader.readAsDataURL(input.files[0]);
                                                }
                                          }


                                          $(".file-upload").on('change', function() {
                                                readURL(this);
                                          });
                                    });
                              </script>
                              <div class="text-center profile-img">
                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail rounded-circle" alt="avatar">
                                    <div class="file btn btn-lg btn-primary">
                                          <h6>Upload a photo here</h6>
                                          <input type="file" class="text-center center-block file-upload">
                                    </div>
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="profile-head">
                                    <h5>
                                          POS SYSTEM
                                    </h5>
                                    <h6>
                                          <?= $user[1] ?>
                                    </h6>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                          <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                          </li>
                                    </ul>
                              </div>
                        </div>
                        <div class="col-md-2">
                              <div class="text-center profile-img">
                                    <div class="file">
                                          <h6>Edit Profile</h6>
                                          <input type="file" class="text-center center-block file-upload">
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8">
                              <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                          <div class="row">
                                                <div class="col-md-6">
                                                      <label>User Role</label>
                                                </div>
                                                <div class="col-md-6">
                                                      <p><?= $user[4] ?></p>
                                                </div>
                                          </div>
                                          <div class="row">
                                                <div class="col-md-6">
                                                      <label>Name</label>
                                                </div>
                                                <div class="col-md-6">
                                                      <p><?= $user[1] ?></p>
                                                </div>
                                          </div>
                                          <div class="row">
                                                <div class="col-md-6">
                                                      <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                      <p><?= $user[2] ?></p>
                                                </div>
                                          </div>
                                          <div class="row">
                                                <div class="col-md-6">
                                                      <label>Phone</label>
                                                </div>
                                                <div class="col-md-6">
                                                      <p><?= $user[7] ?></p>
                                                </div>
                                          </div>
                                          <div class="row">
                                                <div class="col-md-6">
                                                      <label>Profession</label>
                                                </div>
                                                <div class="col-md-6">
                                                      <p>Web Developer and Designer</p>
                                                </div>
                                          </div>
                                    </div>

                              </div>
                        </div>
                  </div>
            </form>
      </div>
</div>
<?php
require "layouts/footer.php";
?>