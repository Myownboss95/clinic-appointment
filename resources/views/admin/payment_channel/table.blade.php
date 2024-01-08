<div class="table-responsive">
    <table class="table" id="subServices-table">
        <thead>
        <tr>
        <th>Bank Name</th>
        <th>Account Name</th>
        <th>Account Number</th>
        </thead>
        <tbody>
        @foreach($paymentChannels as $paymentChannel)
         
            <tr>
            <td>{{ $paymentChannel->bank_name }}</td>
            <td>{{ $paymentChannel->account_name }}</td>
            <td>{{ $paymentChannel->account_number }}</td>
            
                <td width="120">
                    
                    <div class='btn-group'>
                        <a href="{{roleBasedRoute('paymentChannels.show', $paymentChannel->id)}}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{roleBasedRoute('paymentChannels.edit', [$paymentChannel->id])}}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        
                        <button class="btn btn-danger btn-xs" type="button" id="deleteButton">
                            <i class="far fa-trash-alt"></i>
                        </button>

                    </div>
                      
                     
                </td>
            </tr>
            <x-delete-modal url="paymentChannels" :id="$paymentChannel->id" />
        @endforeach
        </tbody>
    </table>
</div>
