<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {{-- {!! Form::label('service_id', 'Service Id:') !!}
    {!! Form::number('service_id', null, ['class' => 'form-control']) !!} --}}
    <label for="service">Service</label>
    <select name="service_id" id="service_id" class="form-control">
        <option value="">Choose Service</option>
        @foreach($services as $service)
            <option value="{{$service->id}}" @if ($subService != null && $subService->service->id === $service->id)
                    selected="selected"
            @endif
            >{{$service->name}}</option>
        @endforeach
    </select>
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 mb-4">
    {{-- <img src="{{asset('uploads/sub_service/1704312885.jpg')}}" class="img-fluid" alt=""> --}}
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control">
</div>