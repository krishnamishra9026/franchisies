<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.showhide').click(function(){
            $('.showhide').show();
            $(this).hide();
        });
    });
    </script>
<script>
    $(".alert-dismissible").fadeTo(6000, 500).slideUp(500, function() {
        $(".alert-dismissible").slideUp(500);
    });
</script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
@stack('scripts')
<!-- demo app -->
{{-- <script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script> --}}
