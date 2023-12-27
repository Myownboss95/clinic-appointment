{{-- <div class="table-responsive">
    <table class="table" id="appointments-table">
        <thead>
        <tr>
            <th>User Id</th>
        <th>Sub Service Id</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Stage Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->user->last_name . ' '. $appointment->user->first_name   }}</td>
            <td>{{ $appointment->sub_service_id }}</td>
            <td>{{ $appointment->start_time }}</td>
            <td>{{ $appointment->end_time }}</td>
            <td>{{ $appointment->stage->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['staff.appointments.destroy', $appointment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('staff.appointments.show', [$appointment->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('staff.appointments.edit', [$appointment->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div> --}}


<div>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Appointments</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{roleBasedRoute('appointments.index')}}">Appointments</a></li>
                                <li class="breadcrumb-item active">All Appointments</li>
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
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h5 class="card-title">Appointment List <span class="text-muted fw-normal ms-2">({{$appointments->count()}})</span></h5>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                     
                                        <div>
                                            <a href="{{roleBasedRoute('appointments.create')}}" class="btn btn-light"><i class="bx bx-plus me-1"></i> Add New</a>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                            <!-- end row -->
    
                            <div class="table-responsive mb-4">
                                
                                <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check font-size-16">
                                                <input type="checkbox" class="form-check-input" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th scope="col">User</th>
                                        <th scope="col">Sub service</th>
                                        <th scope="col">Stage</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">End Time</th>
                                        <th style="width: 80px; min-width: 80px;">Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($appointments as $appointment)
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check font-size-16">
                                                    <input type="checkbox" class="form-check-input" id="{{$appointment->id}}">
                                                    <label class="form-check-label" for="{{$appointment->id}}"></label>
                                                </div>
                                            </th>
                                            <td>
                                                <img src="{{asset('/storage/'.$appointment->user->image)}}" alt="" class="avatar-sm rounded-circle me-2">
                                                <p href="#" class="text-body">{{ $appointment->user->last_name . ' '. $appointment->user->first_name }}</p>
                                            </td>
                                            <td>{{$appointment->subService}}</td>
                                            <td>{{$appointment->stage->name}}</td>
                                            <td>{{$appointment->start_time}}</td>
                                            <td>{{$appointment->end_time}}</td>
                                            
                                            <td width="120">
                                                {!! Form::open(['route' => ['staff.appointments.destroy', $appointment->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>
                                                    <a href="{{ route('staff.appointments.show', [$appointment->id]) }}"
                                                       class='btn btn-default btn-xs'>
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('staff.appointments.edit', [$appointment->id]) }}"
                                                       class='btn btn-default btn-xs'>
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                               
                                <!-- end table -->
                            </div>
                            <!-- end table responsive -->
                       </div>
                   </div>
               </div>
           </div>
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    
    
</div>
