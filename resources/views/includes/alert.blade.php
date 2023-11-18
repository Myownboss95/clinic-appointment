<script>
    function toast(message, type = 'success') {
        let data = {
            timeOut: 500000000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        };
        if (type == 'success') {
            toastr.success(message, "Sucess", data)
        } else {
            toastr.error(message, "Error", data)
        }
    }
</script>

@if(session()->has('success'))
    <script>
        toast("{{session()->get('success')}}")
    </script>
@endif

@if(session()->has('error'))
    <script>
        toast("{{session()->get('error')}}",'error')
    </script>
@endif

{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toast("{{ $error }}", 'error')
        </script>
    @endforeach
@endif --}}
