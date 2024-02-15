 <div class="card">
     <div class="card-body">
        
         <!-- end row -->
         <div class="mt-5">
             <h5>Comments</h5>

             <div class="row">


                 @forelse($comments as $comment)
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
                     <p>No comment authored for this appoinment</p>
                 @endforelse

             </div>

         </div>
     </div>
 </div>
