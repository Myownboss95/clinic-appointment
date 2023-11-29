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
                                        <h5 class="font-size-16 mb-1">{{ $user->name }}</h5>
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
                                            @foreach ($user->comments as $comment)
                                                
                                            
                                            <div class="pt-3">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item me-3">
                                                        <a href="javascript: void(0);" class="text-muted">
                                                            <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> {{$comment->model_name}}
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item me-3">
                                                        <a href="javascript: void(0);" class="text-muted">
                                                            <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08 Comments
                                                        </a>
                                                    </li>
                                                </ul>
                                                <p class="text-muted">{{$comment->body}}</p>

                                            </div>
                                            @endforeach
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
 
            </div>
            <!-- end row -->
          