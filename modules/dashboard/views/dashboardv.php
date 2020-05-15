<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-3 mt-3">
                <!-- Profile Image -->
                <div class="card-header bg-dark">
                    <h3 class="card-title">About Me</h3>
                </div>
                <div class="card card-outline">
                <div class="card-body box-profile pt-4">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="<?php echo base_url('gambar/admin.png')?>"
                        alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center"><?php echo ucfirst($this->session->userdata('username')); ?></h3>
                    <p class="text-muted text-center p-0">A22.2018.02631</p>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9 mt-3">
                <div class="card">
                <div class="card-header p-2 ">
                    <ul class="nav nav-pills ">
                    <li class="nav-item"><a class="nav-link active" href="#education" data-toggle="tab">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#notes" data-toggle="tab">Notes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                    <div class="active tab-pane" id="education">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>
                        <p class="text-muted">
                        Universitas Dian Nuswantoro - D3-TI
                        </p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                        <p class="text-muted">Jetak Kedungdowo, Kaliwungu Kudus, Jawa Tengah<br>Indonesia</p>
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                        <p class="text-muted">
                        <span class="tag tag-danger">UI Design</span>
                        <span class="tag tag-success">Coding</span>
                        <span class="tag tag-info">Javascript</span>
                        <span class="tag tag-warning">PHP</span>
                        </p>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="notes">
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputRePassword" class="col-sm-2 col-form-label">Re-Password</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputRePassword" placeholder="Re-Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>