 <div class="row">
     <div class="col-md-6">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary"> <i class="fas fa-reply"></i> Go Back</a>
         <div class="mb-3">
             <label for="body" class="form-label">Make your Comments</label>
             <textarea name="body" class="form-control" id="comment-body">
             </textarea>
         </div>


         <div class=" mb-3">
             <label for="stage" class="form-label">Stage</label>
             <select class="form-select" id="stage" name="stage_id">
                 <option value="">Select Stage</option>
                 @foreach ($stages as $stage)
                     <option value="">Select Stage</option>
                     <option value="{{ $stage->id }}" @if ($stage->id == $commentStage->id) selected @endif>
                         {{ $stage->name }}</option>
                 @endforeach
             </select>
         </div>
     </div>
 </div>

 @push('scripts')
     <script>
         document.getElementById('comment-body').value = "{{ $comment?->body ?? '' }}";
     </script>
 @endpush
