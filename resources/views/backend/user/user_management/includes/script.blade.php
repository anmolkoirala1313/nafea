<script>
    const CANDIDATE_SECTION = '#candidate-section';
    const GENERAL_USER      = 'general';

    $(document).on('change','.user_type', function (e) {
        e.preventDefault();
        let value = $(this).val();
        if (value == GENERAL_USER){
               $(CANDIDATE_SECTION).removeClass('d-none');
        }else{
            $(CANDIDATE_SECTION).addClass('d-none');
        }
    });
</script>
