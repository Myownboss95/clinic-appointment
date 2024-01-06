 

 {{-- tables --}}
 <div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Services</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        @foreach ($services as $service)
                            <tr>
                                <th scope="row">{{ $service->name }}</th>
                                <td class="btn btn-{{$service->status == 1 ? 'success':'danger'}}">{{ $service->status == 1 ? 'active':'inactive' }}</td> 
                                <td width="120">
                                    
                                     <div class='btn-group'>
                                        <a href="{{ roleBasedRoute('services.show', [$service->id]) }}"
                                           class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ roleBasedRoute('services.edit', [$service->id]) }}"
                                           class='btn btn-default btn-xs'>
                                            <i class="far fa-edit"></i>
                                        </a>
                                         <button type="button" class="btn btn-danger btn-xs" id="deleteButton"><i class="far fa-trash-alt" ></i></button>
                                    </div>
                                    
                                </td>                            
                            </tr>
                            <x-delete-modal url="services" :id="$service->id" />
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


    
</div>
