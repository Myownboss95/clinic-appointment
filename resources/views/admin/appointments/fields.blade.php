<!-- User Id Field -->
<div class="form-group col-sm-6 mb-3">
    <label for="user">User</label>
    <select name="user_id" id="user" class="form-control">
        <option>Select User</option>
        @foreach($users as $user)
            <option {{$appointment->user?->id === $user->id ? 'selected': null}}  value={{$user->id}}>{{$user->last_name .' '. $user->first_name}}</option>
        @endforeach
    </select> 
</div>

<!-- Sub Service Id Field -->
<div class="form-group col-sm-6 mb-3">
<label for="user">Sub Service</label>
    <select name="sub_service_id" id="" class="form-control">
        <option>Select Subservice</option>
        
        @foreach($subServices as $subService)        
            <option {{$subService_id === $subService->id ? 'selected': null}}  value={{$subService->id}}>{{$subService->name}}</option>
        @endforeach
    </select> 
    
</div> 


<!-- Start Time Field -->
<div class="form-group col-sm-6 mb-3">
    <label for="start_time">Start Time</label>
    {{-- <input type="date" name="start_time" id="start_time" class="form-control"> --}}
    <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{$appointment->start_time ?? ''}}">
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
<div class="form-group col-sm-6 mb-3">
    <label for="end_time">End Time</label>
    {{-- <input type="date" name="end_time" id="end_time" class="form-control"> --}}
    <input type="datetime-local" name="end_time" id="start_time" class="form-control" value="{{$appointment->end_time?? ''}}">

</div>

@push('page_scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.js-example-basic-single').select2({
        placeholder: "Search options",
        minimumInputLength: 2,
        caseSensitive: false
        });

</script>
@endpush

<!-- Stage Id Field -->
<div class="form-group col-sm-6 mb-3">
    <label for="stages">Stages</label>
     <select name="stage_id" id="" class="form-control">
        <option>Select Stage</option>
        @foreach($stages as $stage)
            <option {{$appointment->stage?->id === $stage->id ? 'selected': null}}  value={{$stage->id}}>{{$stage->name}}</option>
        @endforeach
    </select>
 </div>
 @push('page_scripts')
                        
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/2.8.0/slimselect.min.css" integrity="sha512-QhrDqeRszsauAfwqszbR3mtxV3ZWp44Lfuio9t1ccs7H15+ggGbpOqaq4dIYZZS3REFLqjQEC1BjmYDxyqz0ZA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/2.8.0/slimselect.min.js" integrity="sha512-mG8eLOuzKowvifd2czChe3LabGrcIU8naD1b9FUVe4+gzvtyzSy+5AafrHR57rHB+msrHlWsFaEYtumxkC90rg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    
                        <script>
                        new SlimSelect({
                            select: "#user"
                        });
                        </script>
                    @endpush