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

    // end

    //catagory create start
    $("form#catagory_form").submit(function(e){
        e.preventDefault()

        let name = $('input[name="name"]').val();
       if ( name == "") {
          notifi('warning',"Filds is empty","Catagory")
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
    // end

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

    //end
    //catagory unpublished
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
    //end
    //catagory published
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
    //end
    // Delete catagory
    $(document).on('click','a#delete_cat',function(e){
        e.preventDefault()
        let id = $(this).attr('extr')


        swal({
            title: "Are you sure?",
            text: "You want to delete this Catagory",
            icon: "error",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url: '/catagory-delete',
                    data: { did : id},
                    method: "GET",
                    success: function(data){
                        catagoryAll()
                        notifi('error',"Catagory is deleted",data)
                    }
                })


            // } else {
            //   swal("The catagory is safe");
            }
          });



    })
    //end
    //find catagory by id

    // catagory edit
    $(document).on('click','a#cat_edit',function(e){
        e.preventDefault()
        let id = $(this).attr('extr')
        $.ajax({
            url: '/catagory-edit/'+id,
            dataType: "json",
            success: function(data){
            //edit pupup
            swal( {
            button: "Update",
            content: {
                element: "input",
                attributes: {
                value: data.name,
                type: "text",
                },
            },

            })
            .then((value) => {
                let edit_data = `${value}`
                if(edit_data != "null"){

                    if(edit_data !== "" && edit_data != null){

                        $.ajax({
                            url:'/catagory-update',
                            data: { name : edit_data , id : data.id},
                            method: "GET",
                            success: function(cat){
                                catagoryAll()
                                notifi('success',"Catagory update succefully", data.name +" ___To___ "+ cat)
                            }
                        })
                    }else{
                        notifi('info',"Nothing to update",data.name)
                    }
                }

              });
            }
        });



    })


    //Tag insert

    $(document).on('submit','form#tag_form',function(e){
        e.preventDefault()

        let data = $('#tag_form input[name="name"]').val()
        if( data == ""){
            notifi('warning',"Filds is empty","Tag")
        }else{
            $.ajax({
                url: '/tag-create',
                data: new FormData(this),
                method: "POST",
                contentType: false,
                processData: false,
                success: function(data){
                    showAllTag()
                    notifi('success',"Tag added successfully",data)
                }

            })
        }

    })

    //show all tag
    function showAllTag(){
        $.ajax({
            url: '/tag-all',
            method: "GET",
            success: function(data){
                $('tbody#tag_body').html(data)
            }

        })
    }
    showAllTag()

})(jQuery)
