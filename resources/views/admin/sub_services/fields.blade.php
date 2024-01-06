
<div class="form-group col-sm-6">
    <label for="name">Name</label>
     <input type="text" name="name"  class="form-control  @error('name') is-invalid @enderror" value="{{old('name', $subService->name)}}">
    @error('name')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Service Id Field -->
<div class="form-group col-sm-6">
    
    <label for="service">Service</label>
    <select name="service_id" id="service_id" class="form-control @error('service_id') is-invalid @enderror">
        <option value="">Choose Service</option>
        @foreach($services as $service)
            <option value="{{$service->id}}" @if ($subService != null && $subService->service?->id === $service->id)
                    selected="selected"
            @endif
            >{{$service->name}}</option>
        @endforeach
    </select>
    @error('service_id')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    <label for="price">Price</label>
     <input type="text" name="price"  class="form-control  @error('price') is-invalid @enderror" value="{{old('price', $subService->price)}}">
    @error('price')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    <label for="description">Description</label>
     <textarea name="description"  class="form-control  @error('description') is-invalid @enderror">
        {{old('description', $subService->description)}}
     </textarea>
    @error('description')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 mb-4">
    {{-- <img src="{{asset('uploads/sub_service/1704312885.jpg')}}" class="img-fluid" alt=""> --}}
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control">
    <td> <img src="{{asset('storage/sub_service/' . $subService?->image)}}" alt="" width="100" class="img-fluid d-block rounded mt-3"> </td>
</div>