<!-- User Id Field -->
<div class="form-group col-sm-6">
    <label for="user">User</label>
    <select name="user_id" id="" class="form-control">
        <option>Select User</option>
        @foreach($users as $user)
            <option {{$appointment->user?->id === $user->id ? 'selected': null}}  value={{$user->id}}>{{$user->last_name .' '. $user->first_name}}</option>
        @endforeach
    </select> 
</div>

<!-- Sub Service Id Field -->
<div class="form-group col-sm-6">
<label for="user">Sub Service</label>
    <select name="sub_service_id" id="" class="form-control">
        <option>Select Subservice</option>
        
        @foreach($subServices as $subService)        
            <option {{$appointment->subService === $subService->id ? 'selected': null}}  value={{$subService->id}}>{{$subService->name}}</option>
        @endforeach
    </select> 
    
</div> 


<!-- Start Time Field -->
<div class="form-group col-sm-6">
    <label for="start_time">Start Time</label>
    <input type="date" name="start_time" id="start_time" class="form-control">
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
    <label for="end_time">Start Time</label>
    <input type="date" name="end_time" id="end_time" class="form-control">
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
    <label for="stages">Stages</label>
     <select name="stage_id" id="" class="form-control">
        <option>Select Stage</option>
        @foreach($stages as $stage)
            <option {{$appointment->stage?->id === $stage->id ? 'selected': null}}  value={{$stage->id}}>{{$stage->name}}</option>
        @endforeach
    </select>
 </div>