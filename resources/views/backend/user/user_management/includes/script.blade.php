<script>
    const GENERAL_SECTION    = '#general-section';
    const CANDIDATE_SECTION  = '#candidate-section';
    const GENERAL_USER       = 'general';
    $(document).on('change','.user_type', function (e) {
        e.preventDefault();
        let value = $(this).val();
        if (value == GENERAL_USER){
            $(GENERAL_SECTION).removeClass('d-none');
        }else{
            $(GENERAL_SECTION).addClass('d-none');
        }
    });

    $(document).on('change','.is_candidate', function (e) {
        e.preventDefault();
        let value = $(this).val();
        if (value == 1){
            $(CANDIDATE_SECTION).removeClass('d-none');
        }else{
            $(CANDIDATE_SECTION).addClass('d-none');
        }
    });
</script>
