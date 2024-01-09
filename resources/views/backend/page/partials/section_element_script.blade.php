<script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script>

    $(document).on('click','#add_flash', function (e){
        e.preventDefault();
        let count =  $('#flash-table tbody tr').length;
        count ++;

        if (count > 8){
            Swal.fire({
                title: "Limit Reached",
                text: "Cannot add more than 9 flash card fields",
                icon: "info",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
            return false;
        }

        let detail = @json(view($view_path.'partials.flash_detail')->render());
        $('#flash-table tbody tr:last').after(detail);

    });

    $(document).on('click','.remove_row', function (e){
        let count =  $('#flash-table tbody tr').length;
        count --;
        if (count < 1){
            Swal.fire({
                title: "Action prohibited",
                text: "Cannot remove the last flash card field",
                icon: "info",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
            return false;
        }
        $(this).closest('tr').remove();
    });

    $(document).on('click','#add_document', function (e){
        e.preventDefault();
        let count =  $('#document-table tbody tr').length;
        count ++;

        if (count > 30) {
            Swal.fire({
                title: "Limit Reached",
                text: "Cannot add more than 20 files fields",
                icon: "info",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
            return false;
        }


        let detail = @json(view($view_path.'partials.document_detail')->render());
        $('#document-table tbody tr:last').after(detail);

    });

    $(document).on('click','.remove_document', function (e){
        let count =  $('#document-table tbody tr').length;
        count --;
        if (count < 1){
            Swal.fire({
                title: "Action prohibited",
                text: "Cannot remove the last field",
                icon: "info",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
            return false;
        }
        $(this).closest('tr').remove();
    });

</script>
