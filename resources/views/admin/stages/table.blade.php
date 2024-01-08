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
                                        <button type="button" class="btn btn-danger btn-xs" id="deleteButton"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                    </form>
                                </td>                            
                            </tr>
                            <x-delete-modal url="stages" :id="$stage->id" />
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