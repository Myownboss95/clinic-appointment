<div class="table-responsive">
    <table class="table" id="countryPhoneCodes-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Name</th>
        <th>Dial Code</th>
        <th>Dial Min Length</th>
        <th>Dial Max Length</th>
        <th>Code</th>
        <th>Currency Name</th>
        <th>Currency Code</th>
        <th>Currency Symbol</th>
        <th>Flag</th>
        <th>Active</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($countryPhoneCodes as $countryPhoneCode)
            <tr>
                <td>{{ $countryPhoneCode->id }}</td>
            <td>{{ $countryPhoneCode->name }}</td>
            <td>{{ $countryPhoneCode->dial_code }}</td>
            <td>{{ $countryPhoneCode->dial_min_length }}</td>
            <td>{{ $countryPhoneCode->dial_max_length }}</td>
            <td>{{ $countryPhoneCode->code }}</td>
            <td>{{ $countryPhoneCode->currency_name }}</td>
            <td>{{ $countryPhoneCode->currency_code }}</td>
            <td>{{ $countryPhoneCode->currency_symbol }}</td>
            <td>{{ $countryPhoneCode->flag }}</td>
            <td>{{ $countryPhoneCode->active }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['countryPhoneCodes.destroy', $countryPhoneCode->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('countryPhoneCodes.show', [$countryPhoneCode->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('countryPhoneCodes.edit', [$countryPhoneCode->id]) }}"
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
