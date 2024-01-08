<div>

     <div class="page-content">
         <div class="container-fluid">
 

               <div class="col-xl-6">
                    <div class="mt-4 mt-xl-3">
                         <h4 class="mt-1 mb-3">{{$service->name}}</h4>                                           
                    <div class="d-flex align-items-center">
                         <p class="text-xs text-muted">status:</p>  <h6 class="text-uppercase btn btn-sm btn-{{$service->status === 1 ? 'success': 'danger'}}">{{$service->status === 1 ? 'Active': 'Inactive'}}</h6>
                    </div>
                    </div>
               </div>
           
             
         </div> <!-- container-fluid -->
     </div>
     <!-- End Page-content -->

    
 </div>

