 @extends('layouts.app')
 @section('content')
     <style>
         .table-responsive .table td,
         .table-responsive .table th {
             font-size: 0.75rem;
         }
     </style>
     <div class="page-content">
         <div class="container-fluid">

             <div class="row">
                 <div class="col-xl-12">
                     <div class="profile-user"></div>
                 </div>
             </div>

             <div class="row">
                 <div class="profile-content">
                     <div class="row align-items-end">
                         <div class="col-sm">
                             <div class="d-flex align-items-end mt-3 mt-sm-0">
                                 <div class="flex-shrink-0">
                                     <div class="avatar-xxl me-3">
                                         <img src="{{ profilePicture($user) }}" alt=""
                                             class="img-fluid rounded-circle d-block img-thumbnail">
                                     </div>
                                 </div>
                                 <div class="flex-grow-1">
                                     <div>
                                         <h5 class="font-size-16 mb-1">{{ $user->first_name . ' ' . $user->last_name }}</h5>
                                         <p class="text-muted font-size-13">{{ $user->email }}</p>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col-lg-12">
                     <div class="card bg-transparent shadow-none">
                         <div class="card-body">
                             <ul class="nav nav-tabs-custom card-header-tabs border-top mt-2" id="pills-tab" role="tablist">
                                 <li class="nav-item">
                                     <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview"
                                         role="tab">Overview</a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link px-3" data-bs-toggle="tab" href="#appointments"
                                         role="tab">Appointments</a>
                                 </li>
                                 <li class="nav-item">

                                     <a class="nav-link px-3" data-bs-toggle="tab" href="#transactionstab"
                                         role="tab">Transactions</a>

                                 </li>
                                 <li class="nav-item">

                                     <a class="nav-link px-3" data-bs-toggle="tab" href="#referrals"
                                         role="tab">Referrals</a>

                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col-xl-12 col-lg-12">
                     <div class="tab-content">
                         <div class="tab-pane active" id="overview" role="tabpanel">
                             <div class="row">
                                 <div class="col-md-10">
                                     <div class="card p-3">
                                         <div class="card-header">
                                             <h5 class="card-title mb-0">Overview</h5>
                                         </div>
                                         <div class="row">
                                             <div class="col-md-4">
                                                 <div class="card-body">
                                                     <div>
                                                         <div class="pb-3">
                                                             <div class="text-muted">
                                                                 <ul class="list-unstyled mb-0">
                                                                     <li class="py-1"><i
                                                                             class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Phone
                                                                         Number: {{ $user->phone_number }}</li>
                                                                     <li class="py-1"><i
                                                                             class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Age: {{ age($user->dob) }}</li>
                                                                         @if ($user->country && $user->city && $user->state)
                                                                             
                                                                         <li class="py-1"><i
                                                                                 class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Location:
                                                                             {{ $user->city }}, {{ $user->state }}, {{ $user->country }}.
                                                                             </li>
                                                                         @endif
                                                                     <li class="py-1"><i
                                                                             class="mdi mdi-circle-medium me-1 text-success align-middle"></i> Ref
                                                                         Code: <br> {{ refCode() }} </li>
                                                                     <li class="py-1"><i
                                                                             class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Date
                                                                         Joined: {{ $user->created_at->diffForHumans() }}
                                                                     </li>
                                                                     <li class="py-1"><i
                                                                             class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Balance: {{ formatMoney($user->balance) }}
                                                                     </li>
                                                                     <li class="py-1"><i
                                                                             class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Lifetime Balance: {{ formatMoney($user->life_time_balance) }}
                                                                     </li>
                                                                 </ul>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-md-8">
                                                <div class="row pt-1">

                                                    @include('admin.users.update_user')
                                                </div>
                                             </div>
                                         </div>

                                         <!-- end card body -->
                                         <!-- end card body -->
                                     </div>
                                 </div>
                             </div>

                             <!-- end card -->
                         </div>
                         <!-- end tab pane -->

                         <div class="tab-pane" id="appointments" role="tabpanel">
                             <div class="card">
                                 <div class="card-body">
                                     <div class="row">
                                         <livewire:user-appointment-table userId="{{ $user->id }}" />
                                     </div>
                                 </div>
                                 <!-- end card body -->
                             </div>

                         </div>
                         <!-- end tab pane -->
                         <div class="tab-pane" id="transactionstab" role="tabpanel">
                             <div class="card">
                                 <div class="card-header">
                                     <h4 class="card-title">Transactions</h4>
                                 </div>
                                 <div class="card-body">
                                     <livewire:user-transactions-table userId="{{ $user->id }}" />
                                 </div>
                                 <!-- end card body -->
                             </div>
                         </div>
                         <!-- end tab pane -->
                         <div class="tab-pane" id="referrals" role="tabpanel">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="card p-2">
                                         <div class="card-body">
                                             <div class="table-responsive">
                                                 <table class="table align-middle table-nowrap">
                                                     <tbody>
                                                         <tr>
                                                             @if ($user->referrals()->count() > 0)
                                                                 @foreach ($user->referrals as $referral)
                                                                     <td style="width: 50px;"><img
                                                                             src="{{ profilePicture($referral) }}"
                                                                             class="rounded-circle avatar-sm"
                                                                             alt=""></td>
                                                                     <td>
                                                                         <h5 class="font-size-14 m-0"><a
                                                                                 href="javascript: void(0);"
                                                                                 class="text-dark">{{ $referral->first_name }}</a>
                                                                         </h5>
                                                                     </td>

                                                                     <td>
                                                                         <i
                                                                             class="mdi mdi-circle-medium font-size-18 text-success align-middle me-1"></i>
                                                                         {{ '₦' . number_format($refBonus, 2, '.', ',') }}
                                                                     </td>
                                                                 @endforeach
                                                             @endif
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- end card body -->
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- end tab content -->
             </div>
             <!-- end col -->
             <!-- end col -->
         </div>
         <!-- end row -->

     </div> <!-- container-fluid -->
     </div>
     <!-- End Page-content -->
 @endsection

 <script>
     document.getElementById("password-addon").addEventListener("click", function() {
         var e = document.getElementById("password-input");
         "password" === e.type ? e.type = "text" : e.type = "password"
     });

     document.getElementById("current-password-addon").addEventListener("click", function() {
         var e = document.getElementById("current-password-input");
         "password" === e.type ? e.type = "text" : e.type = "password"
     });

     document.getElementById("confirm-password-addon").addEventListener("click", function() {
         var e = document.getElementById("confirm-password-input");
         "password" === e.type ? e.type = "text" : e.type = "password"
     });
 </script>
