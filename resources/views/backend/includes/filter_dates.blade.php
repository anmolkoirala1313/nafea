<script>
    $(document).ready(function () {
        // Cache elements
        const $filterPeriod = $('#filter_period');
        const $fromDate = $('.from_date');
        const $toDate = $('.to_date');

        // Function to toggle enabling/disabling based on filter period selection
        function toggleDateFields() {
            if ($filterPeriod.val()) {
                $fromDate.prop('disabled', true);
                $toDate.prop('disabled', true);
            } else {
                $fromDate.prop('disabled', false);
                $toDate.prop('disabled', false);
            }
        }

        // Function to toggle enabling/disabling based on from/to date selection
        function toggleFilterPeriod() {
            if ($fromDate.val() || $toDate.val()) {
                $filterPeriod.prop('disabled', true);
            } else {
                $filterPeriod.prop('disabled', false);
            }
        }

        // Event listener for when the filter period changes
        $filterPeriod.change(function () {
            toggleDateFields();
        });

        // Event listener for when the from/to date changes
        $fromDate.change(function () {
            toggleFilterPeriod();
        });

        $toDate.change(function () {
            toggleFilterPeriod();
        });

        // Initialize the state on page load
        toggleDateFields();
        toggleFilterPeriod();
    });

    $(document).ready(function() {
        // Access both date fields
        let fromDatePicker = $('.from_date').flatpickr();
        let toDatePicker = $('.to_date').flatpickr();

        // Listen to changes on the from_date field
        $('.from_date').on('change', function() {
            // Get the selected 'from_date' value
            let fromDate = $(this).val();

            // Update the minDate of the to_date field based on the selected 'from_date'
            toDatePicker.set('minDate', fromDate);
        });
    });

</script>
