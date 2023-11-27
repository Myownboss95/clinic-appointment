{{-- <!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- City Id Field -->
<div class="col-sm-12">
    {!! Form::label('city_id', 'City Id:') !!}
    <p>{{ $user->city_id }}</p>
</div>

<!-- State Id Field -->
<div class="col-sm-12">
    {!! Form::label('state_id', 'State Id:') !!}
    <p>{{ $user->state_id }}</p>
</div>

<!-- Country Id Field -->
<div class="col-sm-12">
    {!! Form::label('country_id', 'Country Id:') !!}
    <p>{{ $user->country_id }}</p>
</div>

<!-- Role Id Field -->
<div class="col-sm-12">
    {!! Form::label('role_id', 'Role Id:') !!}
    <p>{{ $user->role_id }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Gender Field -->
<div class="col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $user->gender }}</p>
</div>

<!-- Balance Field -->
<div class="col-sm-12">
    {!! Form::label('balance', 'Balance:') !!}
    <p>{{ $user->balance }}</p>
</div>

<!-- Life Time Balance Field -->
<div class="col-sm-12">
    {!! Form::label('life_time_balance', 'Life Time Balance:') !!}
    <p>{{ $user->life_time_balance }}</p>
</div>

<!-- Referral Code Field -->
<div class="col-sm-12">
    {!! Form::label('referral_code', 'Referral Code:') !!}
    <p>{{ $user->referral_code }}</p>
</div>

<!-- Referred By User Id Field -->
<div class="col-sm-12">
    {!! Form::label('referred_by_user_id', 'Referred By User Id:') !!}
    <p>{{ $user->referred_by_user_id }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div> --}}



 

            <div class="row">
                <div class="col-xl-12">
                    <div class="profile-user"></div>
                </div>
            </div>

            <div class="row">
               <div class="profile-content">
                   <div class="row align-items-end">
                        <div class="col-sm">
                            <div class="d-flex align-items-end mt-3 mt-sm-0">
                                <div class="flex-shrink-0">
                                    <div class="avatar-xxl me-3">
                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid rounded-circle d-block img-thumbnail">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-16 mb-1">{{ auth()->user()->name }}</h5>
                                        <p class="text-muted font-size-13 mb-2 pb-2">Full Stack Developer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                   </div>
               </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                   <div class="card bg-transparent shadow-none">
                       <div class="card-body">
                            <ul class="nav nav-tabs-custom card-header-tabs border-top mt-2" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <h3><a class="nav-link px-3" href="#post">Post</a></h3>
                                </li>
                            </ul>
                       </div>
                   </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="tab-content">
                         
                        <!-- end tab pane -->

                        <div>
                            <div class="card">
                                <div class="card-body"> 
                                        <div class="blog-post">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-lg me-3">
                                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="img-fluid rounded-circle d-block">
                                                </div>
                                                <div class="flex-1">
                                                    <h5 class="font-size-15 text-truncate"><a href="#" class="text-dark">Michael Smith</a></h5>
                                                    <p class="font-size-13 text-muted mb-0">08 Mar, 2021</p>
                                                </div>
                                            </div>
                                            <div class="pt-3">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item me-3">
                                                        <a href="javascript: void(0);" class="text-muted">
                                                            <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Development
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item me-3">
                                                        <a href="javascript: void(0);" class="text-muted">
                                                            <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08 Comments
                                                        </a>
                                                    </li>
                                                </ul>
                                                <p class="text-muted">Aenean ornare mauris velit. Donec imperdiet, massa sit amet porta maximus, massa justo faucibus nisi,
                                                     eget accumsan nunc ipsum nec lacus. Etiam dignissim turpis sit amet lectus porttitor eleifend. Maecenas ornare molestie metus eget feugiat.
                                                     Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>

                                            </div>
                                            <div class="position-relative mt-3">
                                                <img src="assets/images/profile-bg-2.jpg" alt="" class="img-thumbnail">
                                            </div>
                                            <div class="pt-3">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3">
                                                    <div >
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item me-3">
                                                                <a href="javascript: void(0);" class="text-muted">
                                                                    <i class="bx bx-purchase-tag-alt text-muted me-1"></i> Project
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item me-3">
                                                                <a href="javascript: void(0);" class="text-muted">
                                                                    <i class="bx bx-like align-middle text-muted me-1"></i> 12 Like
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item">
                                                                    <a href="javascript: void(0);" class="d-inline-block">
                                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-sm">
                                                                    </a>
                                                                </div>
                                                                <div class="avatar-group-item">
                                                                    <a href="javascript: void(0);" class="d-inline-block">
                                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-sm">
                                                                    </a>
                                                                </div>
                                                                <div class="avatar-group-item">
                                                                    <a href="javascript: void(0);" class="d-inline-block">
                                                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-sm">
                                                                    </a>
                                                                </div>
                                                                <div class="avatar-group-item">
                                                                    <a href="javascript: void(0);" class="d-inline-block">
                                                                        <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-sm">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="ms-2" >
                                                                <button type="button" class="btn btn-outline-primary btn-sm waves-effect">Share <i class="bx bx-share-alt align-middle ms-1"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-muted mt-4">Praesent fringilla neque vestibulum, consectetur arcu quis, rutrum arcu. Vivamus vitae pulvinar dolor,
                                                        sit amet lacinia dolor. Mauris tincidunt lacinia nisi, non molestie leo consequat a.
                                                        Sed varius lobortis leo, vitae venenatis tortor ullamcorper condimentum.</p>

                                                <div class="mt-4 pt-2">
                                                    <h5 class="f-18">2 Comments</h5>
                            
                                                    <div class="mt-4 pt-2">
                                                        <div class="comment-section border-bottom pb-4">
                                                            <div class="d-flex">
                                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-md" alt="img-missing">
                                                                <div class="flex-1 ms-4">
                                                                    <div class="post-meta float-end">
                                                                        <span><i class="mdi mdi-calendar me-2"></i>Feb 13, 2021</span>
                                                                    </div>
                                                                    <h5 class="font-size-15">Natasha Andrews</h5>
                                                                    <p class="text-muted w-75 mb-0">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                            
                                                        <div class="comment-section pt-4 ps-5 ms-4">
                                                            <div class="d-flex">
                                                                <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-md" alt="img-missing">
                                                                <div class="flex-1 ms-4">
                                                                    <div class="post-meta float-end">
                                                                        <span><i class="mdi mdi-calendar me-2"></i>Feb 13, 2021</span>
                                                                    </div>
                                                                    <h5 class="font-size-15">Pranav Gamewala</h5>
                                                                    <p class="text-muted w-75">Donec non nisl dui. Integer pellentesque nibh mi, elementum pellentesque purus tincidunt ut. Suspendisse venenatis feugiat elit sed risus ornare laoreet.</p>
                                                                    <div class="mt-4">
                                                                        <a href="" class="btn btn-primary btn-sm"><i class="mdi mdi-reply me-1"></i> Reply</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end blog post --> 
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
                <!-- end col -->

                <div class="col-xl-4 col-lg-4">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Friends</h5>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap">
                                    <tbody>
                                        <tr>
                                            <td style="width: 50px;"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-sm" alt=""></td>
                                            <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Daniel Canales</a></h5></td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">Frontend</a>
                                                    <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">UI</a>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="mdi mdi-circle-medium font-size-18 text-success align-middle me-1"></i> Online
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-sm" alt=""></td>
                                            <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Jennifer Walker</a></h5></td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">UI / UX</a>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="mdi mdi-circle-medium font-size-18 text-warning align-middle me-1"></i> Buzy
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                        C
                                                    </span>
                                                </div>
                                            </td>
                                            <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Carl Mackay</a></h5></td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">Backend</a>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="mdi mdi-circle-medium font-size-18 text-success align-middle me-1"></i> Online
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-sm" alt=""></td>
                                            <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Janice Cole</a></h5></td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">Frontend</a>
                                                    <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">UI</a>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="mdi mdi-circle-medium font-size-18 text-success align-middle me-1"></i> Online
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                        T
                                                    </span>
                                                </div>
                                            </td>
                                            <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Tony Brafford</a></h5></td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary font-size-11">Backend</a>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="mdi mdi-circle-medium font-size-18 text-secondary align-middle me-1"></i> Offline
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
          