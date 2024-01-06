
<div class="form-group col-sm-6">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $service->name)}}">
    @error('name')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror


<div class="form-group">
    <label for="name">Status</label>
    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
        <option>Choose Status</option>
        <option value="1" {{$service->status === 1 ? 'selected': ''}}>Active</option>
        <option value="0" {{$service->status === 0 ? 'selected': ''}}>Inactive</option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
</div>

