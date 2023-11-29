<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Email</th>
        <th>City Id</th>
        <th>State Id</th>
        <th>Country Id</th>
        <th>Role Id</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Balance</th>
        <th>Life Time Balance</th>
        <th>Referral Code</th>
        <th>Referred By User Id</th>
        <th>Email Verified At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->city_id }}</td>
            <td>{{ $user->state_id }}</td>
            <td>{{ $user->country_id }}</td>
            <td>{{ $user->role_id }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->balance }}</td>
            <td>{{ $user->life_time_balance }}</td>
            <td>{{ $user->referral_code }}</td>
            <td>{{ $user->referred_by_user_id }}</td>
            <td>{{ $user->email_verified_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['staff.users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('staff.users.show', [$user->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('staff.users.edit', [$user->id]) }}"
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
