@extends('layouts.app')

@section('content')
   <div>

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Appointment</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{roleBasedRoute('appointments.index')}}">Appointment</a></li>
                                            <li class="breadcrumb-item active">Appointment Detail</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="product-detai-imgs">
                                                    <div class="row">
                                                        <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                                    <div>
                                                                        <img src="{{asset('lineone/images/product/img-7.png')}}" alt="" class="img-fluid mx-auto d-block">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center d-flex justify-content-center">
                                                                <a href="{{roleBasedRoute('appointments.edit', [$appointment->id])}}" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                                    <i class="bx bx-edit me-2"></i> Edit
                                                                </a>
                                                                <form action="{{roleBasedRoute('appointments.destroy', [$appointment->id])}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger waves-effect  mt-2 waves-light" onclick="return confirm('Are you sure?')">
                                                                    <i class="bx bx-trash"></i>Delete 
                                                                </button>
                                                                </form>
                                                                
                                                                {{-- {!! Form::open(['route' => ['staff.appointments.destroy', $appointment->id], 'method' => 'delete']) !!}
                                                                
                                                                    {!! Form::button('<i class="far fa-trash-alt"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger waves-effect  mt-2 waves-light', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                                                
                                                                {!! Form::close() !!} --}}
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-xl-6">
                                                <div class="mt-4 mt-xl-3">
                                                    <a href="javascript: void(0);" class="text-primary"></a>
                                                    <h4 class="mt-1 mb-3">{{ $appointment->subService?->first()?->name}}</h4>
                                                    <p class="text-muted mb-4">{{ $appointment->subService?->first()?->description}}</p>
                                                    <h5 class="mb-4">Client:<span class="badge rounded-pill bg-primary-subtle text-primary"></span> <b>{{ $appointment->user->last_name}} {{ $appointment->user->first_name}}</b></h5>
                                                    <h5 class="mb-4">Stage:<span class="badge rounded-pill bg-primary-subtle text-primary "></span> <b>{{ $appointment->stage->name}}</b></h5>
                                                    <h5 class="mb-4">Total Transactions:<span class="badge rounded-pill bg-primary-subtle text-primary "></span> <b>{{ number_format($appointment->transactions?->first()->amount, 2)}}</b></h5>
                                                    <h5 class="mb-4">State:<span class="badge rounded-pill bg-primary-subtle text-primary "></span> <b>{{ $appointment->user?->state}}</b></h5>
                                                    <h5 class="mb-4">City:<span class="badge rounded-pill bg-primary-subtle text-primary "></span> <b>{{ $appointment->user?->city}}</b></h5>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <p class="text-muted"><i class="bx bx-calendar-event font-size-16 align-middle text-primary me-1"></i>Start Time: <span class="btn btn-info">{{date_format($appointment->start_time, "l jS \of F Y h:i:s A")}}</span></p>
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div>
                                                                <p class="text-muted"><i class="bx bx-calendar-event font-size-16 align-middle text-primary me-1"></i> End Time: <span class="btn btn-info">{{date_format($appointment->end_time, "l jS \of F Y h:i:s A")}}</span></p>
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <h5 class="mb-3">Comment Here :</h5>
    
                                                <form action="{{roleBasedRoute('comments.store')}}" method="POST">
                                                    @csrf
                                                    <textarea name="body" class="form-control" id=""></textarea>
                                                    <input type="hidden" name="user_id" id="" value="{{auth()->user()->id}}">
                                                    <input type="hidden" name="appointment_id" id="" value="{{$appointment->id}}">
                                                    <input type="hidden" name="appointment_stage_id" id="" value="{{$appointment->stage->id}}">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light mt-2 me-1">Submit</button>
                                                    </div>
                                                </form>
                                        </div>
                                        <!-- end row -->
                                        <div class="mt-5">
                                            <h5>Comments :</h5>
    
                                            
                                            @forelse($comments as $comment)
                                            <div class="mt-4 border p-4">

                                                <div class="row">
                                                    <div class="col-xl-3 col-md-5">
                                                        <div>
                                                            <div class="d-flex">
                                                                <img src="/lineone/images/users/avatar-2.jpg" class="avatar-sm rounded-circle" alt="img" />
                                                                <div class="flex-1 ms-4">
                                                                    <h5 class="mb-2 font-size-15 text-muted">{{$comment->user->last_name}} {{$comment->user->first_name}}</h5>
                                                                    <h5 class="text-muted font-size-15">{{$comment->user->state}}, {{$comment->user->country}}</h5>
                                                                    {{-- <p class="text-muted">65 Followers, 86 Reviews</p> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-9 col-md-7">
                                                        <div>
                                                            <p class="text-muted mb-2">
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <span class="ms-3"><i class="far fa-calendar-alt text-primary me-1"></i>{{$comment->created_at->diffForHumans()}}</span>
                                                            </p>
                                                            
                                                            <p class="text-muted">{{$comment->body}}</p>
                                                            {{-- <ul class="list-inline float-sm-end mb-sm-0">
                                                                <li class="list-inline-item">
                                                                    <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                                                </li>
                                                            </ul> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                                <p>NO comment for this appoinment</p>
                                            @endforelse

                                            
                                            
                                        </div>
    
    
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                        <!-- end row -->

                        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
               
            </div>
@endsection
