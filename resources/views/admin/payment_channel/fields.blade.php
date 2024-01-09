
<div class="form-group col-sm-6">
    <label for="bank_name">Bank Name</label>
     <input type="text" name="bank_name"  class="form-control  @error('bank_name') is-invalid @enderror" value="{{old('bank_name', $paymentChannel->bank_name)}}" placeholder="Guaranty Trust Bank">
    @error('bank_name')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

 

<div class="form-group col-sm-6">
    <label for="account_name">Account Name</label>
     <input type="text" name="account_name"  class="form-control  @error('account_name') is-invalid @enderror" value="{{old('account_name', $paymentChannel->account_name)}}" placeholder="John Doe">
    @error('account_name')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>


<div class="form-group col-sm-6">
    <label for="account_number">Account Number</label>
     <input type="text" name="account_number"  class="form-control  @error('account_number') is-invalid @enderror" value="{{old('account_number', $paymentChannel->account_number)}}" placeholder="012345567">
    @error('account_number')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>


 