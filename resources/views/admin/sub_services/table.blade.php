<div class="table-responsive">
    <table class="table" id="subServices-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Service</th>
        <th>Price</th>
        <th>Description</th>
        <th>Image</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subServices as $subService)
        {{-- @dd($subServices) --}}
            <tr>
            <td>{{ $subService->name }}</td>
            <td>{{ $subService->service->name }}</td>
            <td>{{ '₦'.$subService->price }}</td>
            <td>{{ $subService->description }}</td>
            <td> <img src="{{asset('storage/sub_service/' . $subService->image)}}" alt="" width="60" class="img-fluid mx-auto d-block rounded"> </td>
            {{-- <td>{{  }}</td> --}}
                <td width="120">
                    
                    <div class='btn-group'>
                        <a href="{{roleBasedRoute('subServices.show', $subService->id)}}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{roleBasedRoute('subServices.edit', [$subService->id])}}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        
                        <button class="btn btn-danger btn-xs" type="button" id="deleteButton">
                            <i class="far fa-trash-alt"></i>
                        </button>

                    </div>
                  
                     
                </td>
            </tr>
            <x-delete-modal url="subServices" :id="$subService->id" />
        @endforeach
        </tbody>
    </table>
</div>
