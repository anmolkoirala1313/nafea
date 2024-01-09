@include($module.'includes.toast_alert')
<script>
    $(document).on('change','#travel_destination', function (e) {
        let value = $(this).val();
        $.get('/get-fields?type='+value, function(data){
            $('#for-destination').html('');
            $('#for-destination').html(data.rendered_view);
        });
    });

    $(document).on('change','#from', function (e) {
        let value     = $(this).val();
        let id        = '#to';
        disableSelector(value,id);
    });

     $(document).on('change','#to', function (e) {
        let value     = $(this).val();
        let id        = '#from';
        disableSelector(value,id);
    });

    function disableSelector(value,id){
        $(id+' option').prop('disabled', false);
        $(id+' option[value="' + value + '"]').prop('disabled', true);
    }

    $(document).on('click','#book-flight', function (e) {
        e.preventDefault();
        $('#bookFlightModal').modal('toggle');
    });

    $("form.flight_book").on('submit', function (e){
        e.preventDefault();
        let button = $(this).find("[type=submit]");

        let destination  = $('#travel_destination').val();
        let from         = $('#from').val();
        let to           = $('#to').val();
        let travel_date  = $('#travel_date').val();
        let adult_number = $('#adult_number').val();
        let kids_number  = $('#kids_number').val();
        let travel_type  = $('#travel_type').val();

        if(!destination){
            $('#destination-prompt').html('Please select flight destination');
            $('#bookFlightModal').modal('toggle');
            return false;
        }
        if(!from){
            $('#from-prompt').html('Please select flight from destination');
            $('#bookFlightModal').modal('toggle');
            return false;
        }
        if(!to){
            $('#to-prompt').html('Please select flight to destination');
            $('#bookFlightModal').modal('toggle');
            return false;
        }
        if(!travel_date){
            $('#date-prompt').html('Please select flight date');
            $('#bookFlightModal').modal('toggle');
            return false;
        }
        if(!adult_number && kids_number < 1){
            $('#adult-number-prompt').html('Minimum number should be 1 if no kids traveller is selected');
            $('#bookFlightModal').modal('toggle');
            return false;
        }else if(kids_number > 0 && !adult_number){
            $('#adult-number-prompt').html('');
        }

        if(!travel_type){
            $('#type-prompt').html('Please select flight type');
            $('#bookFlightModal').modal('toggle');
            return false;
        }


        let route = $(this).attr('action');
        let method = $(this).attr('method');
        let data = new FormData(this);
        data.append('destination',destination);
        data.append('from',from);
        data.append('to',to);
        data.append('travel_date',travel_date);
        data.append('adult_number',adult_number);
        data.append('kids_number', kids_number);
        data.append('travel_type', travel_type);

        $.ajax({
            url:route,
            data:data,
            method:method,
            dataType:"JSON",
            cache:false,
            contentType:false,
            processData: false,
            success: function (url){
                window.location.href = url;
            },
            error: function (error){
                button.prop("disabled", false);
                $('span.text-danger').remove();
                if(error.responseJSON.errors){
                    $.each(error.responseJSON.errors, function (index, error){
                        let html = document.createElement('span');
                        html.className = index + ' text-danger';
                        html.innerText = error[0];
                        if($("[name='"+index+"[]']").length){
                            $("[name='"+index+"[]']").after(html);
                        }else if($("[name='"+index.split('.')[0]+"[]']").length){
                            $("[name='"+index.split('.')[0]+"[]']")[index.split('.')[1]].after(html);
                        }else if($("[name='"+index.split('.')[0]+"["+ index.split('.')[1] +"]']").length){
                            $("[name='"+index.split('.')[0]+"["+ index.split('.')[1] +"]']").after(html);
                        }else if($("[name='"+index.split('.')[0]+"["+ index.split('.')[1] +"][]']").length){
                            $("[name='"+index.split('.')[0]+"["+ index.split('.')[1] +"][]']")[index.split('.')[2]].after(html);
                        }else{
                            $("[name='"+index+"']:first").after(html);
                        }
                    })
                }
            }
        })

    });



</script>
