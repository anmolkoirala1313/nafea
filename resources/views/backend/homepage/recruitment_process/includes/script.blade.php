<script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script>

    $(document).on('click','#add_process', function (e){
        e.preventDefault();
        let count =  $('#process-table tbody tr').length;
        count ++;

        if (count > 8){
            Swal.fire({
                title: "Limit Reached",
                text: "Cannot add more than 8 recruitment process fields",
                icon: "info",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
            return false;
        }

        let detail = @json(view($view_path.'includes.details')->render());
        $('#process-table tbody tr:last').after(detail);

    });

    $(document).on('click','.remove_row', function (e){
        let count =  $('#process-table tbody tr').length;
        count --;
        if (count < 1){
            Swal.fire({
                title: "Action prohibited",
                text: "Cannot remove the last process field",
                icon: "info",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
            return false;
        }
        $(this).closest('tr').remove();
    });

</script>
