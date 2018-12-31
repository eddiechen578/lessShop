$(document).ready(function() {


    //updateModal
    $('.updateBtn').click(function () {
        var product_id = $(this).val();
        $.get('/admin/edit/' + product_id, function (data) {
            //success data
            console.log(data.data);
            $('#name').val(data.data.name);
            $('#introduction').val(data.data.introduction);
            $.each(data.category, function(i, d) {
                if(d.id == data.data.category_id) {
                    $('#category_id').append('<option value="' + d.id + '" selected >' + d.name + '</option>');
                }else {
                    $('#category_id').append('<option value="' + d.id + '" >' + d.name + '</option>');
                }
            });
            $('#price').val(data.data.price);
            $('#remain_count').val(data.data.remain_count);
            $('#product_id').val(data.data.id);
            $('#btn-save').val("update");
            $('#btn-save').html('update');
            $('#myModal').modal('show');
        })
    });

    //addModal
    $('.addBtn').click(function () {
        $.get('/admin/create', function (data) {
            $('#name').val('');
            $('#introduction').val('');
            $.each(data, function(i, d) {
                console.log(d.id)
                $('#category_id').append('<option value="' + d.id + '">' + d.name + '</option>');
            });
            $('#price').val('');
            $('#remain_count').val('');
            $('#product_id').val('');
            $('#btn-save').val("add");
            $('#btn-save').html('add')
            $('#frmTasks').trigger("reset");
            $('#myModal').modal('show');
        })
    });

    //delete
    $('.deleteBtn').click(function () {
        var product_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        $.ajax({
            type: "DELETE",
            url: 'delete/' + product_id,
            success: function (data) {
                console.log(data);
                $("#product" + product_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();

        var name = $('#name').val();
        var introduction = $('#introduction').val();
        var category_id = $('#category_id').val();
        var photo = $('#photo')[0].files[0];
        var price = $('#price').val();
        var remain_count = $('#remain_count').val();
        var formData = new FormData($('#myForm')[0]);
        // form.append('name', name);
        // form.append('introduction', introduction);
        // form.append('photo', photo);
        // form.append('price', price);
        // form.append('remain_count', remain_count);

        console.log(price)
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "post"; //for creating new resource
        var my_url = '/admin/add';
        var product_id = $('#product_id').val();

        if (state == "update") {
            type = "post"; //for updating existing resource
            my_url = '/admin/update/' + product_id;
        }

        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if(data.errors) {
                    if(data.errors.name){
                        $( '#name-error' ).html( data.errors.name[0] );
                    }
                    if(data.errors.introduction){
                        $( '#introduction-error' ).html( data.errors.introduction[0] );
                    }
                    if(data.errors.photo){
                        $( '#photo-error' ).html( data.errors.photo[0] );
                    }
                    if(data.errors.price){
                        $( '#price-error' ).html( data.errors.price[0] );
                    }
                    if(data.errors.remain_count){
                        $( '#remain_count-error' ).html( data.errors.remain_count[0] );
                    }

                }
                if (data.status == "1") { //if user added a new record

                    window.location.href = "/admin/home";
                }else if(data.status == "2"){
                    window.location.href = "/admin/home";
                }
            }
        });
    })
})

