<script>
    let page_method = '{{ $page_method }}';
    //settings for sortable JS
    $("#sortable").sortable({
        onDrop: function ($item, container, _super) {
            //for animation
            var $clonedItem = $('<li/>').css({height: 0});
            $item.before($clonedItem);
            $clonedItem.animate({'height': $item.height()});

            $item.animate($clonedItem.position(), function  () {
                $clonedItem.detach();
                _super($item, container);
            });
        },
        onDragStart: function ($item, container, _super) {
            var offset = $item.offset(),
                pointer = container.rootGroup.pointer;

            adjustment = {
                left: pointer.left - offset.left,
                top: pointer.top - offset.top
            };

            _super($item, container);
        },
        //for animation
        onDrag: function ($item, position) {
            $item.css({
                left: position.left - adjustment.left,
                top: position.top - adjustment.top
            });
        }
    });
    //settings for sortable JS

    // image gallery
    // init the state from the input
    // $(".image-checkbox").each(function () {
    //     if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
    //         $(this).addClass('image-checkbox-checked');
    //     }
    //     else {
    //         $(this).removeClass('image-checkbox-checked');
    //     }
    // });


    // sync the state to the input
    $(".image-checkbox").on("click", function (e) {
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked",!$checkbox.prop("checked"))
        e.preventDefault();
    });

    $('#add-button').click(function(event){
        event.preventDefault();
        var form = $('.custom_form')[0];

        page_method == 'index' ? addStructure():editStructure();
    });

    //Storing a fresh structure to save the page sections
    function addStructure(){
        var selected = new Array();
        $("input:checkbox:checked").each(function() {
            selected.push({
                name: $(this).val(),
                image:  $(this).attr("id")
            });
        });

        if(selected.length<1){
            Toastify({ newWindow: !0, text: "please select minimum of one section for the page !", gravity: 'top', position: 'right', stopOnFocus: !0, duration: 3000, close: "close",className: "bg-warning" }).showToast();
            return;
        }

        //activate the modal
        $("#addStructure").modal("toggle");
        $('#sortable').empty();//empty the sortable div data to avoid repetition
        let i = 1;
        selected.forEach(function(item) {
            var name = item.name;
            var newname = name.replace(new RegExp('_', 'g')," ");
            var replacements = '<li class="'+item.name+'" id="'+i+'">' +
                '<div class="col-md-12 div-center">' +
                '<label class="text-capitalize">'+ newname +'</label>' +
                '<img width="100%" src="/assets/backend/images/pages/sections/'+item.image+'"/>' +
                '</div>' +
                '</li> ';
            i++;
            $('#sortable').append(replacements);
            //populate the div by appending the image and section name from loop
        });
    }

    //restoring previously stored structure of page sections
    function editStructure(){

        var section_list = [];
        var section_names = [];

        <?php
            if(isset($data['section_slug'])){
                foreach($data['section_slug'] as $value){ ?>
                section_list.push({
                    name: '<?php echo $value; ?>',
                    image: '<?php echo $value; ?>.png'
                });
                section_names.push('<?php echo $value; ?>');
        <?php }} ?>


        var namelist = [];
        var newaddition = [];

        $("input:checkbox:checked").each(function() {
            //creating the array of section names only to check with db section names
            namelist.push($(this).val());
            //comparing all the selected sections from this edit page with original section list of DB
            //creating array of newly added sections only
            if($.inArray($(this).val(), section_names) == -1){
                newaddition.push({
                    name: $(this).val(),
                    image:  $(this).attr("id")
                });
            }
        });

        if(namelist.length<1 && newaddition.length<1){
            //show alert if sections are empty
            Toastify({ newWindow: !0, text: "please select minimum of one section for the page !", gravity: 'top', position: 'right', stopOnFocus: !0, duration: 3000, close: "close",className: "bg-warning" }).showToast();
            return;
        }


        $("#addStructure").modal("toggle");//activate the modal
        $('#sortable').empty();//empty the sortable div data to avoid repetition
        let i = 1; //counter for the original section list
        section_list.forEach(function(item) {
            var name = item.name;
            var newname = name.replace(new RegExp('_', 'g')," ");
            //adding the original sections that were created with the page in the list first
            var dbsection = '<li class="'+item.name+'" id="' + i + '">' +
                '<div class="col-md-12 div-center">' +
                '<label class="text-capitalize">' + newname + '</label>' +
                '<img width="100%" src="/assets/backend/images/pages/sections/'+item.image+'"/>' +
                '</div>' +
                '</li> ';
            $('#sortable').append(dbsection);
            i++;

            if($.inArray(item.name, namelist) == -1){
                $('.'+item.name+'').remove();
                //checking in the arrary if any of the original section is removed and if yes,
                //removing them from the UL list as well
            }
        });

        //starting the counter where the first counter for already existing sections ended
        let j = i;
        //looping through the new sections which do not exist in the original section list from database
        newaddition.forEach(function(item) {
            var name = item.name;
            var newname = name.replace(new RegExp('_', 'g')," ");
            var replacements = '<li class="'+item.name+'" id="' + j + '">' +
                '<div class="col-md-12 div-center">' +
                '<label class="text-capitalize">' + newname + '</label>' +
                '<img width="100%" src="/assets/backend/images/pages/sections/'+item.image+'"/>' +
                '</div>' +
                '</li> ';
            $('#sortable').append(replacements);
            j++;
            //populate the div by appending the image and section name from loop
        });
    }


    //submit the data from previous form and the values of sortable field on button click
    $('#submit_page_detail').click(function(){
        var form                = $('.custom_form')[0]; //get the form using ID
        var form_data           = new FormData(form); //Creates new FormData object
        var section_name        = $('#sortable li').map(function(i) {
            return $(this).attr('class'); }).get();

        //get the names of the section present as class in sortable UL's li

        for (var i = 0; i < section_name.length; i++) {
            form_data.append('position[]', i+1); //send the position array in terms of number of li present in sortable UL
            form_data.append('sorted_sections[]', section_name[i]); //send the section names listed in sortable UL
        }
        var post_url       = $('.custom_form').attr("action"); //get form action url
        var request_method = $('.custom_form').attr("method"); //get form GET/POST method

        $.ajax({
            url : post_url,
            type: request_method,
            dataType:"JSON",
            data : form_data,
            cache:false,
            contentType:false,
            processData: false,
            success: function (url){
                window.location.href = url;
            },
            error: function (error){
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
        });
    });


</script>
