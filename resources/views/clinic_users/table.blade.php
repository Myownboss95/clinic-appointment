<div class="table-responsive">
    <table class="table" id="clinicUsers-table">
        <thead>
            <tr>
                <th>User Id</th>
                <th>Clinic Id</th>
                <th>Role</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clinicUsers as $clinicUser)
                <tr>
                    <td>{{ $clinicUser->user_id }}</td>
                    <td>{{ $clinicUser->clinic_id }}</td>
                    <td>{{ $clinicUser->role }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['clinicUsers.destroy', $clinicUser->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('staff.clinicUsers.show', [$clinicUser->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('staff.clinicUsers.edit', [$clinicUser->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => "return confirm('Are you sure?')",
                            ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
