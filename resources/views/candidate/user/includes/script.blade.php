<script>
    const MARRIAGE_SECTION    = '.martial-status-result';

    $(document).on('change','.martial_status', function (e) {
        e.preventDefault();
        let value = $(this).val();
        if (value == 1){
            $(MARRIAGE_SECTION).removeClass('d-none');
        }else{
            $(MARRIAGE_SECTION).addClass('d-none');
        }
    });
</script>
