<div class="table-responsive">
    <table class="table" id="appointments-table">
        <thead>
        <tr>
        <th>Staff</th>
        <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($staffs as $staff)
            <tr>
                <td> 
                    <p class="bold">
                    {{ $staff->name }}
                    </p>
                    <small class="mute">
                        {{ $staff->email }}
                    </small>
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.staff.destroy', $staff->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.staff.show', [$staff->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.staff.edit', [$staff->id]) }}"
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
</div>
