<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $stage->name)}}">
    @error('name')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>