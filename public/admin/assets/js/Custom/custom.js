(function($){

    $(document).ready(function(){
        $('a#logout_click').click(function(e){
            e.preventDefault()
            $('form#user_logout').submit()

        });



        $("input[name^='mess']").each(function () {
            let err = $(this).val();
            console.log($(this).val());

            notifi('warning',err,"Required")


         });


         catagoryAll()



    });

    //notification function start

    function notifi(type, mess, spn = 'Warning'){
        Command: toastr[type](mess,spn)

            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
             }
    }

    //notification function end

    //catagory create start
    $("form#catagory_form").submit(function(e){
        e.preventDefault()

        let name = $('input[name="name"]').val();
       if ( name == "") {
          notifi('warning',"Filds is empty")
       }else{

            $.ajax({
                url: '/catagory-create',
                data: new FormData(this),
                method: "POST",
                processData: false,
                contentType: false,
                success: function(data){
                    catagoryAll()
                    notifi('success',"Catagory added successfully",data)
                    $('form#catagory_form')[0].reset();
                }

            })



       }

    });
    //catagory create end

    // show all catagory
    function catagoryAll(){
        $.ajax({
            url:'/catagory-all',
            method: "GET",
            success: function(data){

                $('tbody#cat_table').html(data)

            }
        });
    }

    //catagory hide
    $(document).on('click','a#hide',function(e){
        e.preventDefault()
        let id = $(this).attr('extr')
        $.ajax({
            url: '/catagory-unpublished',
            data: { cid : id},
            method: "GET",
            success: function(data){
                catagoryAll()
                notifi('warning',"Catagory is now unpublished",data)
            }
        })
    })

    $(document).on('click','a#show',function(e){
        e.preventDefault()
        let id = $(this).attr('extr')
        $.ajax({
            url: '/catagory-published',
            data: { cid : id},
            method: "GET",
            success: function(data){

                catagoryAll()
                notifi('success',"Catagory is now published",data)
            }
        })
    })


})(jQuery)
