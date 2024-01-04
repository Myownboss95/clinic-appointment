 <div class="card">
     <div class="card-body">
         <div class="mt-5">

             <form action="{{ roleBasedRoute('comments.appointment.store', $appointment->id) }}" method="POST">
                 @csrf
                 <div class="row">
                     <div class="col-md-6">
                         <div class="mb-3">
                             <label for="body" class="form-label">Make your Comments</label>
                             <textarea name="body" class="form-control" id=""></textarea>
                         </div>


                         <div class=" mb-3">
                             <label for="stage" class="form-label">Stage</label>
                             <select class="form-select" id="stage" name="stage_id">
                                 <option value="">Select Stage</option>
                                 @foreach ($stages as $stage)
                                     <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                 </div>
                 <div>
                     <button type="submit" class="btn btn-primary waves-effect waves-light mt-2 me-1">Submit</button>
                 </div>
             </form>
         </div>
         <!-- end row -->
         <div class="mt-5">
             <h5>Your Comments</h5>

             <div class="row">


                 @forelse($yourComments as $comment)
                     <div class="col-md-6 col-sm-12">
                         <div class="mt-4 border p-4">

                             <div class="row">
                                 <div class="col-xl-3 col-md-5">
                                     <div>
                                         <div class="d-flex">
                                             <img src="{{ profilePicture($comment->author) }}"
                                                 class="avatar-sm img-fluid rounded-circle" width="50"
                                                 height="50" alt="img" style="width: 30px; height:30px;" />
                                             <div class="flex-1 ms-4">
                                                 <h5 class="mb-2 font-size-12 text-muted">
                                                     {{ $comment->author->last_name }}
                                                     {{ $comment->author->first_name }}</h5>

                                                 {{-- <p class="text-muted">65 Followers, 86 Reviews</p> --}}
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-9 col-md-7">
                                     <div>
                                         <p class="text-muted mb-2">
                                             <span class="">
                                                 {{ $comment->stage->name }} ~
                                                 <i
                                                     class="far fa-calendar-alt text-primary me-1"></i>{{ $comment->created_at->diffForHumans() }}</span>
                                         </p>

                                         <p class="text-muted">{{ $comment->body }}</p>


                                         <ul class="list-inline float-sm-end mb-sm-0">
                                             <li class="list-inline-item">
                                                 <a href="{{ roleBasedRoute('comments.edit', $comment->id) }}"
                                                     class="text-secondary"><i class="far fa-edit me-1"></i>
                                                     Edit</a>
                                             </li>
                                             <li class="list-inline-item">
                                                 <a href="{{ roleBasedRoute('comments.destroy', $comment->id) }}"
                                                     class="text-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash me-1"></i>
                                                     Delete</a>
                                             </li>
                                         </ul>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 @empty
                     <p>No comment authored by you for this appoinment</p>
                 @endforelse

             </div>

         </div>
         <div class="mt-5">
             <h5>Other Comments</h5>

             <div class="row">


                 @forelse($otherComments as $comment)
                     <div class="col-md-6 col-sm-12">
                         <div class="mt-4 border p-4">

                             <div class="row">
                                 <div class="col-xl-3 col-md-5">
                                     <div>
                                         <div class="d-flex">
                                             <img src="{{ profilePicture($comment->author) }}"
                                                 class="avatar-sm img-fluid rounded-circle" width="50"
                                                 height="50" alt="img" style="width: 30px; height:30px;" />
                                             <div class="flex-1 ms-4">
                                                 <h5 class="mb-2 font-size-12 text-muted">
                                                     {{ $comment->author->last_name }}
                                                     {{ $comment->author->first_name }}</h5>
                                                 <small class="text-muted">
                                                     {{ $comment->stage->name }} stage
                                                 </small>
                                                 {{-- <p class="text-muted">65 Followers, 86 Reviews</p> --}}
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-9 col-md-7">
                                     <div>
                                         <p class="text-muted mb-2">
                                             <span class=""><i
                                                     class="far fa-calendar-alt text-primary me-1"></i>{{ $comment->created_at->diffForHumans() }}</span>
                                         </p>

                                         <p class="text-muted">{{ $comment->body }}</p>

                                         @if (auth()->user()->can('is_admin') || $comment->author_id == auth()->user()->id)
                                             <ul class="list-inline float-sm-end mb-sm-0">
                                                 <li class="list-inline-item">
                                                     <a href="{{ roleBasedRoute('comments.edit', $comment->id) }}"
                                                         class="text-secondary"><i class="far fa-edit me-1"></i>
                                                         Edit</a>
                                                 </li>
                                                 <li class="list-inline-item">
                                                     <a href="{{ roleBasedRoute('comments.destroy', $comment->id) }}"
                                                         class="text-danger"><i class="fas fa-trash me-1"></i>
                                                         Delete</a>
                                                 </li>
                                             </ul>
                                         @endif

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 @empty
                     <p>No other comment for this appoinment</p>
                 @endforelse

             </div>

         </div>
     </div>
 </div>
