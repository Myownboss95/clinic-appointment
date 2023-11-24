<div class="table-responsive">
    <table class="table" id="generalSettings-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Value</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($generalSettings as $generalSetting)
                <tr>
                    <td>{{ $generalSetting->id }}</td>
                    <td>{{ $generalSetting->name }}</td>
                    <td>{{ $generalSetting->value }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['generalSettings.destroy', $generalSetting->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('admin.generalSettings.show', [$generalSetting->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.generalSettings.edit', [$generalSetting->id]) }}"
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
