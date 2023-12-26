 {{-- tables --}}
 <div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Stages</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">

                        <thead>
                            <tr>
                                <th>Name</th>
                        
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        @foreach ($stages as $stage)
                            <tr>
                                <th scope="row">{{ $stage->name }}</th>
                                 <td width="120">
                                    <form action="{{roleBasedRoute('stages.destroy', $stage->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                     <div class='btn-group'>
                                        <a href="{{ roleBasedRoute('stages.show', [$stage->id]) }}"
                                           class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ roleBasedRoute('stages.edit', [$stage->id]) }}"
                                           class='btn btn-default btn-xs'>
                                            <i class="far fa-edit"></i>
                                        </a>
                                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                    </div>
                                    </form>
                                </td>                            
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
    {{-- <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Follow Up Appointments</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Appointment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($followUpAppointments as $followUpAppointment)
                                <tr>
                                    <th scope="row">{{format_datetime($followUpAppointment->start_time)}}</th>
                                   
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div> --}}
    <!-- end col -->
</div>