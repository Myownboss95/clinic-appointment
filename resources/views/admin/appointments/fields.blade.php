<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
     {{-- {!! Form::text('user_id', $appointment->user->last_name .' '. $appointment->user->first_name , ['class' => 'form-control', 'readonly', 'disabled'])  !!} --}}
     <select name="user_id" id="" class="form-control">
        <option>Select Stage</option>
        @foreach($users as $user)
            <option {{$appointment->user?->id === $user->id ? 'selected': null}}  value="{{$user->id}}">{{$user->last_name .' '. $user->first_name}}</option>
        @endforeach
    </select>
</div>

<!-- Sub Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_service_id', 'Sub Service Id:') !!}
    {!! Form::number('sub_service_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_time', 'Start Time:') !!}
    {!! Form::text('start_time', null, ['class' => 'form-control','id'=>'start_time']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- End Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_time', 'End Time:') !!}
    {!! Form::text('end_time', null, ['class' => 'form-control','id'=>'end_time']) !!}
 </div>

@push('page_scripts')
    <script type="text/javascript">
        $('#end_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Stage Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stage_id', 'Stage:') !!}
    <select name="stage_id" id="" class="form-control">
        <option>Select Stage</option>
        @foreach($stages as $stage)
            <option {{$appointment->stage?->id === $stage->id ? 'selected': null}}  value="{{$stage->id}}">{{$stage->name}}</option>
        @endforeach
    </select>
    {{-- {!! Form::text('stage_id', $appointment->stage->name, ['class' => 'form-control','maxlength' => 11,'maxlength' => 11]) !!} --}}
</div>