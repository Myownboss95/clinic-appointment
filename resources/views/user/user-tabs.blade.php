<div class="row">
    <div class="col-xl-5 col-lg-5">
        <div class="tab-content">
            <div class="tab-pane active" id="overview" role="tabpanel">
                <div class="card p-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">About</h5>
                    </div>

                    <div class="card-body">
                        <div>
                            <div class="pb-3">
                                <div class="text-muted">
                                    <ul class="list-unstyled mb-0">
                                        <li class="py-1"><i
                                                class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Phone
                                            Number: {{ auth()->user()->phone_number }}</li>
                                        <li class="py-1"><i
                                                class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Date
                                            of Birth: {{ auth()->user()->dob }}</li>
                                        <li class="py-1"><i
                                                class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Location:
                                            {{ auth()->user()->country }}, {{ auth()->user()->state }},
                                            {{ auth()->user()->city }}</li>
                                        <li class="py-1"><i
                                                class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Ref
                                            Code: {{ refCode() }} <i data-feather="copy"></i> </li>


                                        <li class="py-1"><i
                                                class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Last
                                            Login: {{ auth()->user()->updated_at->diffForHumans() }}</li>



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end tab pane -->

            <div class="tab-pane" id="post" role="tabpanel">
                <div class="card p-5">
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <div>
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">FullName</label>
                                        <input class="form-control" disabled type="text"
                                            value="{{ auth()->user()->last_name . ' ' . auth()->user()->first_name }}"
                                            id="example-text-input" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email-input" class="form-label">Email</label>
                                        <input class="form-control" disabled readonly type="email"
                                            value="{{ old('email', auth()->user()->email) }}"
                                            id="example-email-input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Date</label>
                                        <input class="form-control" name="dob" type="date"
                                            value="{{ old('dob', auth()->user()->dob) }}"
                                            id="example-date-input">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-tel-input" class="form-label">Telephone</label>
                                        <input class="form-control" name="phone_number" type="tel"
                                            value="{{ old('phone_number', auth()->user()->phone_number) }}"
                                            id="example-tel-input">
                                    </div>

                                    <div class="mt-4 d-flex justify-content-left">
                                        <button type="submit" class="btn btn-primary w-md">Update
                                            Profile</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>

            </div>
            <div class="tab-pane" id="bank-details" role="tabpanel">
                <div class="card p-5">
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <div>
                                    <form class="mt-4 pt-2" method="post"
                                        action="{{ route('bank-details.update') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="bank" class="form-label">Bank
                                                Name</label>
                                            <input class="form-control" name="bank" type="text"
                                                value="{{ $user->bankDetail->bank ?? ''}}" id="bank">
                                        </div>
                                        <div class="mb-3">
                                            <label for="accountName" class="form-label">Account Name</label>
                                            <input class="form-control" name="accountName" type="text"
                                                value="{{ $user->bankDetail->accountName ?? ''}}" id="accountName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="accountNumber" class="form-label">Account
                                                Number</label>
                                            <input class="form-control" name="accountNumber" type="text"
                                                value="{{ $user->bankDetail->accountNumber ?? ''}}" id="accountNumber">
                                        </div>

                                        <div class="mt-4 d-flex justify-content-center">
                                            <button type="submit"
                                                class="btn btn-primary w-md">Submit</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>

                </div>
                <!-- end tab pane -->                            
                <!-- end tab pane -->
            </div>

            <div class="tab-pane" id="security" role="tabpanel">
               <div class="card">
                   <div class="card-body">
                       <form class="mt-4 pt-2" method="post" action="{{ route('password.update') }}">
                           @csrf
                           @method('PUT')

                           <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                               <input type="password"
                                   class="form-control pe-5 @error('current_password') is-invalid @enderror"
                                   id="current-password-input" placeholder="Enter your current password"
                                   name="current_password">

                               <button type="button"
                                   class="btn btn-link position-absolute h-100 end-0 top-0"
                                   id="current-password-addon">
                                   <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                               </button>
                               <label for="input-current-password">Current password</label>
                               <div class="form-floating-icon">
                                   <i data-feather="lock"></i>
                               </div>
                               @error('current_password')
                                   <span class="error invalid-feedback">{{ $message }}</span>
                               @enderror
                           </div>

                           <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                               <input type="password"
                                   class="form-control pe-5 @error('password') is-invalid @enderror"
                                   id="password-input" placeholder="Enter New password"
                                   name="password">

                               <button type="button"
                                   class="btn btn-link position-absolute h-100 end-0 top-0"
                                   id="password-addon">
                                   <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                               </button>
                               <label for="input-new-password">New password</label>
                               <div class="form-floating-icon">
                                   <i data-feather="lock"></i>
                               </div>
                               @error('password')
                                   <span class="error invalid-feedback">{{ $message }}</span>
                               @enderror
                           </div>


                           <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                               <input type="password"
                                   class="form-control pe-5 @error('password_confirmation') is-invalid @enderror"
                                   id="confirm-password-input" placeholder="Confirm password"
                                   name="password_confirmation">

                               <button type="button"
                                   class="btn btn-link position-absolute h-100 end-0 top-0"
                                   id="confirm-password-addon">
                                   <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                               </button>
                               <label for="input-confirm-password">Confirm password</label>
                               <div class="form-floating-icon">
                                   <i data-feather="lock"></i>
                               </div>
                               @error('password_confirmation')
                                   <span class="error invalid-feedback">{{ $message }}</span>
                               @enderror
                           </div>
                           <div class="mb-3 d-flex justify-content-end">
                               <button class="btn btn-primary w-40 waves-effect waves-light"
                                   type="submit">Update Password</button>
                           </div>
                       </form>
                   </div>
                   <!-- end card body -->
               </div>

           </div>

        </div>
        <!-- end tab content -->
    </div>
    <!-- end col -->

    <div class="col-xl-7 col-lg-7">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Referrals</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <tbody>
                            <tr>
                                @foreach ($user->referrals as $referral)
                                    <td style="width: 50px;"><img src="{{ profilePicture($referral) }}"
                                            class="rounded-circle avatar-sm" alt=""></td>
                                    <td>
                                        <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                class="text-dark">{{ $referral->first_name }}</a></h5>
                                    </td>

                                    <td>
                                        <i
                                            class="mdi mdi-circle-medium font-size-18 text-success align-middle me-1"></i>
                                        {{ '₦' . number_format($refBonus, 2, '.', ',') }}
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>