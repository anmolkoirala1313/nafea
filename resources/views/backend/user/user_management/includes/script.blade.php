<script>
    const GENERAL_SECTION    = '#general-section';
    const CANDIDATE_SECTION  = '#candidate-section';
    const GENERAL_USER       = 'general';

    $(document).on('change','.user_type', function (e) {
        e.preventDefault();
        let value = $(this).val();
        let is_candidate = $('input[name="is_candidate"]:checked').val();
        if (value == GENERAL_USER){
            $(GENERAL_SECTION).removeClass('d-none');
            showHideCandidateInfo(is_candidate);
        }else{
            $(GENERAL_SECTION).addClass('d-none');
            $(CANDIDATE_SECTION).addClass('d-none');
        }

    });

    $(document).on('change','.is_candidate', function (e) {
        e.preventDefault();
        let value = $(this).val();
        showHideCandidateInfo(value);
    });

    function showHideCandidateInfo(value){
        if (value == 1){
            $(CANDIDATE_SECTION).removeClass('d-none');
        }else{
            $(CANDIDATE_SECTION).addClass('d-none');
        }
    }
</script>
