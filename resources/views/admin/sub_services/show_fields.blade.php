<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $subService->name }}</p>
</div>

<!-- Service Id Field -->
<div class="col-sm-12">
    {!! Form::label('service_id', 'Service:') !!}
    <p>{{ $subService->service->name }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $subService->price }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $subService->description }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <p><img src="{{$subService->image}}" width="100" alt=""></p>
</div>

