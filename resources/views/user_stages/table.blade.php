<div class="table-responsive">
    <table class="table" id="userStages-table">
        <thead>
        <tr>
            <th>User Id</th>
        <th>Sub Service Id</th>
        <th>Service Id</th>
        <th>Log</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userStages as $userStage)
            <tr>
                <td>{{ $userStage->user_id }}</td>
            <td>{{ $userStage->sub_service_id }}</td>
            <td>{{ $userStage->service_id }}</td>
            <td>{{ $userStage->log }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['userStages.destroy', $userStage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('userStages.show', [$userStage->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('userStages.edit', [$userStage->id]) }}"
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
