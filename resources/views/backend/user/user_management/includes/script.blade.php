<script>
    const GENERAL_SECTION    = '#general-section';
    const CANDIDATE_SECTION  = '#candidate-section';
    const GENERAL_USER       = 'general';
    const YEARS_TO_ADD       = 10;
    const MARRIAGE_SECTION    = '.martial-status-result';

    $(document).on('change','.user_type', function (e) {
        e.preventDefault();
        let value = $(this).val();
        let is_candidate = $('input[name="is_candidate"]:checked').val();
        if (value == GENERAL_USER){
            $(CANDIDATE_SECTION).removeClass('d-none');
        }else{
            $(CANDIDATE_SECTION).addClass('d-none');
        }
    });



</script>
