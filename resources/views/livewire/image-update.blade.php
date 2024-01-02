<form wire:submit.prevent="updateImage" method="post" class="d-flex align-items-center" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="avatar-xxxl me-3">
                <img src="{{ Storage::url($user->image) }}" width="200"alt="image"
                    class="img-fluid d-block img-thumbnail">
            </div>
        </div>
        <div class="col-md-6">
            <input type="file" wire:model="image" name="image"
                class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <span class="error invalid-feedback text-danger">{{ $message }}</span>
            @enderror
            <div class="text-center mt-4 d-flex align-items-center">
                <button type="submit" class="btn btn-primary waves-effect waves-light">
                    <svg wire:loading wire:target="updateImage" width="20" height="20" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <style>
                            .spinner_7WDj {
                                transform-origin: center;
                                animation: spinner_PBVY .75s linear infinite
                            }

                            @keyframes spinner_PBVY {
                                100% {
                                    transform: rotate(360deg)
                                }
                            }
                        </style>
                        <path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,19a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z"
                            opacity=".25" />
                        <circle class="spinner_7WDj" cx="12" cy="2.5" r="1.5">
                    </svg>
                    Update Profile Image</button>
            </div>
        </div>
    </div>




</form>
