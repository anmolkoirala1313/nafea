<script>
    const MARRIAGE_SECTION    = '.martial-status-result';
    const YEARS_TO_ADD       = 10;
    $(document).on('change','.martial_status', function (e) {
        e.preventDefault();
        let value = $(this).val();
        if (value == 1){
            $(MARRIAGE_SECTION).removeClass('d-none');
        }else{
            $(MARRIAGE_SECTION).addClass('d-none');
        }
    });

    $(document).on('change', '#passport_issue_date', function () {
        let value = $(this).val();
        if (value) {
            var dateParts = value.split('-');
            var year = parseInt(dateParts[0], 10);
            var month = parseInt(dateParts[1], 10) - 1; // Month is 0-based in JavaScript
            var day = parseInt(dateParts[2], 10);

            var date = new Date(year, month, day);

            // Add the years
            date.setFullYear(date.getFullYear() + YEARS_TO_ADD);

            // Format the new date as mm/dd/yyyy
            var newMonth = ('0' + (date.getMonth() + 1)).slice(-2);
            var newDay = ('0' + date.getDate()).slice(-2);
            var newYear = date.getFullYear();
            var newDate = newMonth + '/' + newDay + '/' + newYear;
            // Display the new date
            $('#passport_expiry_date').val(newDate);
        } else {
            $('#passport_expiry_date').val('');
        }
    });
</script>
