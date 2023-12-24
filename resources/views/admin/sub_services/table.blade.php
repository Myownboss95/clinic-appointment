<div class="table-responsive">
    <table class="table" id="subServices-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Service Id</th>
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
            <td>{{ $subService->price }}</td>
            <td>{{ $subService->description }}</td>
            <td><img src="{{asset('storage/images'. $subService->image)}}" width="50" alt=""></td>
            {{-- <td>{{  }}</td> --}}
                <td width="120">
                     <form action="{{roleBasedRoute('subServices.destroy', $subService->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <div class='btn-group'>
                        <a href="{{roleBasedRoute('subServices.show', $subService->id)}}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{roleBasedRoute('subServices.edit', [$subService->id])}}"
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
