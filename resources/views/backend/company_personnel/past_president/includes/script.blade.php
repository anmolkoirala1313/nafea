<script>
    $( "#sortable_rows" ).sortable({
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        update: function() {
            sendOrderToServer();
        },
        start: function(event, ui) {
            // Reduce the size of the image while dragging
            ui.item.find('img').css({
                'max-width': '100px', // Adjust the width as needed
                'max-height': '100px' // Adjust the height as needed
            });
        },
        stop: function(event, ui) {
            // Reset the size of the image after dragging
            ui.item.find('img').css({
                'max-width': '', // Reset the width
                'max-height': '' // Reset the height
            });
        }
    });

    function sendOrderToServer() {
        var order = [];
        $('tr.rows').each(function(index,element) {
            order.push({
                id: $(this).attr('data-id'),
                position: index + 1
            });
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route($base_route.'order') }}",
            data: {
                order: order,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
              Swal.fire({
                    html: '<div class="mt-2">' +
                        '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json"' +
                        'trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px">' +
                        '</lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Success !</h4>' +
                        '<p class="text-muted mx-4 mb-0">' + response.message +'</p>' +
                        '</div>' +
                        '</div>',
                    timerProgressBar: !0,
                    timer: 2e3,
                    showConfirmButton: !1
                });
            },
            error: function(response) {
                Swal.fire({
                    html: '<div class="mt-2">' +
                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                        ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                        'style="width:120px;height:120px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Oops...! </h4>' +
                        '<p class="text-muted mx-4 mb-0">' + response +'</p>' +
                        '</div>' +
                        '</div>',
                    timerProgressBar: !0,
                    timer: 3000,
                    showConfirmButton: !1
                });
            }
        });
    }

</script>
