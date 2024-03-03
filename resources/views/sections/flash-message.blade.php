@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning bg-warning text-white border-0" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-light bg-light text-dark border-0" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@push('scripts')
<script type="text/javascript">
    $(".alert").click(function(event) {
        $(this).alert('close');
    });

    setTimeout(function () {
        $('.alert').alert('close');
    }, 8000);
</script>
@endpush
