 

 {{-- tables --}}
 <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Staff</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        @foreach ($staffs as $staff)
                            <tr>
                                <th scope="row">
                                    {{ $staff->first_name . ' '. $staff->last_name }}
                                </th>
                                <td> 
                                    {{ $staff->email }}
                                </td> 
                                <td >
                                    
                                     <div class='btn-group'>
                                        <a href="{{ route('admin.users.show', [$staff->id]) }}"
                                           class='btn btn-default btn-xs'>View 
                                            <i class="far fa-eye"></i>
                                        </a>
                                         <button type="button" class="btn btn-danger btn-xs" id="deleteButton"  data-id="{{ $staff->id }}">
                                            Remove Admin <i class="bx bx-user"></i>
                                        </button>
                                    </div>
                                    
                                </td>                            
                            </tr>
                            <x-remove-staff :id="$staff->id" />
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
@push('scripts')
    <script>
         const deleteButtons = document.querySelectorAll('.deleteButton');
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                console.log('yes')
                const deleteModal = document.getElementById('deleteModal');
                const modal = new bootstrap.Modal(deleteModal);
                modal.show();
            });
        }); 
    //     const deleteButtons = document.querySelectorAll('#deleteButton');
    //     deleteButtons.forEach(button => {
    //     button.addEventListener('click', () => {
    //         const deleteModal = document.getElementById('deleteModal');
    //         const modal = new bootstrap.Modal(deleteModal);
    //         modal.show();
    // });
    // });

        // document.getElementById('deleteButton').addEventListener('click', () => {
        //     const deleteModal = document.getElementById('deleteModal');
        //     const modal = new bootstrap.Modal(deleteModal);
        //     modal.show();
            
        // });
    </script>
@endpush