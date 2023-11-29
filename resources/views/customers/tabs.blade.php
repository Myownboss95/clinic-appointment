
    <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Customers</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                @if ($stages)
                                                    @foreach ($stages as $stage )
                                                    
                                                        <a class="nav-link mb-2 @if ($stage->id == $defaultStage->id) active  @endif" id="v-pills-home-tab" data-bs-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true" href="{{ route('staff.customers.index', ['category' => $stage->slug]) }}">{{ $stage->name }}</a>
                                                    
                                                    
                                                    @endforeach
                                                @endif
                                              
                                                 </div>
                                            </div><!-- end col -->
                                            <div class="col-md-9">
                                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                       
                                                        <div class="table-responsive">
                                                            <table class="table" id="users-table">
                                                                <thead>
                                                                <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Balance</th>
                                                                <th>Life Time Balance</th>
                                                                <th colspan="3">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($customers as $customer)
                                                                    <tr>
                                                                        <td>{{ $customer->name }}</td>
                                                                    <td>{{ $customer->email }}</td>
                                                                    <td>{{ $customer->balance }}</td>
                                                                    <td>{{ $customer->life_time_balance }}</td>
                                                                        <td width="120">
                                                                            {!! Form::open(['route' => ['users.destroy', $customer->id], 'method' => 'delete']) !!}
                                                                            <div class='btn-group'>
                                                                                <a href="{{ route('staff.users.show', [$customer->id]) }}"
                                                                                class='btn btn-default btn-xs'>
                                                                                    <i class="far fa-eye"></i>
                                                                                </a>
                                                                                <a href="{{ route('users.edit', [$customer->id]) }}"
                                                                                class='btn btn-default btn-xs'>
                                                                                    <i class="far fa-edit"></i>
                                                                                </a>
                                                                                @can('is_admin')
                                                                                    
                                                                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                                                                @endcan
                                                                            </div>
                                                                            {!! Form::close() !!}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div><!--  end col -->
                                        </div><!-- end row -->
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div><!-- end col -->







