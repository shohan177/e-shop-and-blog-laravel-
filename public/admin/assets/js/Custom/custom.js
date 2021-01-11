(function($){

    $(document).ready(function(){

        $('#add_post').removeClass('d-none')
        $('#edit_post').addClass('d-none')

        //register error notification
        $("input[name^='error']").each(function () {
            let err = $(this).val();
            console.log($(this).val());

            notifi('warning',err,"Required")


         });


        //ck editor
        $('table#post_table').DataTable()

        CKEDITOR.replace('post_contain')
        CKEDITOR.replace('add_post_contain')

        $('a#logout_click').click(function(e){
            e.preventDefault()
            $('form#user_logout').submit()

        });


        //Post succes notification
        $("input[name^='mess']").each(function () {
            let err = $(this).val();
            let action_name = $(this).attr('action')
            let mees_head = $(this).attr('bold_mess')
            console.log($(this).val());

            notifi(action_name,err,mees_head)


         });
         catagoryAll()

         //show setting page
         $.ajax({
             url:"/setting_all",
             success: function(data){
                $('img#logo').attr('src',"media/setting/logo/"+data.logo_name)
                $('img#stike_logo').attr('src',"media/setting/logo/"+data.stkie_logo_name)
                $('#logo_old_valu').attr('value',data.logo_name)
                $('#stkie_photo_old').attr('value',data.stkie_logo_name)
                $('form#socail_form input[name = "fb"]').val(data.social.fb)
                $('form#socail_form input[name = "tw"]').val(data.social.tw)
                $('form#socail_form input[name = "lnk"]').val(data.social.lnk)
                $('form#socail_form input[name = "ins"]').val(data.social.ins)
                $('form#socail_form input[name = "web"]').val(data.social.web)
              }
         })



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
                    $('form#tag_form')[0].reset()
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

    // tag satatus
    // deactive
    $(document).on('click','a#tag_status_dactive',function(e){
        e.preventDefault()
        let id = $(this).attr('extr')

        $.ajax({
            url: '/tag-status/'+id+'/'+'deactivate',
            method: "GET",
            success: function(data){

                showAllTag()
                notifi('error',"Tag deactivete successfully",data)
            }
        })
    });

    // active
    $(document).on('click','a#tag_status_active',function(e){
        e.preventDefault()
        let id = $(this).attr('extr')

        $.ajax({
            url: '/tag-status/'+id+'/'+'active',
            method: "GET",
            success: function(data){

                showAllTag()
                notifi('success',"Tag active successfully",data)
            }
        })

    })

    // delete tag
    $(document).on('click','a#delete_tag',function(e){
        e.preventDefault()
        let id = $(this).attr('extr')


        swal({
            title: "Are you sure?",
            text: "You want to delete this Tag",
            icon: "error",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url: '/tag-delete/'+id,
                    method: "GET",
                    success: function(data){
                        showAllTag()
                        notifi('error',"Tag is deleted",data)
                    }
                })


            // } else {
            //   swal("The catagory is safe");
            }
          });
    })
    //tag edit
    $(document).on('click','a#tag_edit',function(e){
        e.preventDefault()
        let id = $(this).attr('extr')
        $.ajax({
            url: '/tag-edit/'+id,
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
                            url:'/tag-update',
                            data: { name : edit_data , id : data.id},
                            method: "GET",
                            success: function(cat){
                                showAllTag()
                                notifi('success',"Tag update succefully", data.name +" ___To___ "+ cat)
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

    //psot------------------->
    $(document).on('click','a#add_new_post',function(){
        $('#add_post').removeClass('d-none')
        $('#edit_post').addClass('d-none')
        $('html, body').animate({
            scrollTop: $("#add_post").offset().top
        }, 600);
    })

   // ________________image view section_________________________________
    //psot iamge show
    $(document).on('change','input#up_photo',function(e){

        let post_photo = URL.createObjectURL(e.target.files[0])

        $('img#post_image_view').attr('src',post_photo)
    });

    // post update image show
    $(document).on('change','input#update_photo',function(e){

        let update_post_photo = URL.createObjectURL(e.target.files[0])

        $('img#update_post_image_view').attr('src',update_post_photo)
    });
    //add product image
    $(document).on('change','input#product_photo',function(e){

        let product_photo = URL.createObjectURL(e.target.files[0])

        $('img#product_image_view').attr('src',product_photo)
    });

    //logo show
    $(document).on('change','input#up_logo',function(e){

        let product_photo = URL.createObjectURL(e.target.files[0])

        $('img#logo').attr('src',product_photo)
    });
    //stike logo
    $(document).on('change','input#up_stike_logo',function(e){

        let product_photo = URL.createObjectURL(e.target.files[0])

        $('img#stike_logo').attr('src',product_photo)
    });

    //SLIDER IMAGE VIEW
    $(document).on('change','input#slider_up_photo1',function(e){

        let product_photo = URL.createObjectURL(e.target.files[0])

        $('img#slider_photo1').attr('src',product_photo)
    });


    $(document).on('change','input#slider_up_photo2',function(e){

        let product_photo = URL.createObjectURL(e.target.files[0])

        $('img#slider_photo2').attr('src',product_photo)
    });
// ________________image view section_________________________________end

    //post edit
    $(document).on('click','a#post_edit',function(e){
        e.preventDefault()


        $('html, body').animate({
            scrollTop: $("#add_post").offset().top
        }, 600);

        $('#cat_select').find('option').remove().end()
        $('#tag_select').find('option').remove().end()
        $('#add_post').addClass('d-none')
        $('#edit_post').removeClass('d-none')



        let post_id = $(this).attr('e_post_id')
        $.ajax({
            url: '/post-edit/'+post_id,
            success: function(data){

                $('#update_post input[name = "titel"]').val(data.title)
                $('#update_post input[name = "id"]').val(data.id)
                $('#update_post input[name = "old_photo"]').val(data.photo)

                $('#update_post_image_view').attr('src',"media/post/"+ data.photo)
                $('#cat_select').html(data.cat_list)
                $('#tag_select').html(data.tag_list)
                CKEDITOR.instances.post_contain.setData( data.contain, function(){
                        this.checkDirty();
                    });

            }
        })



    })

   // post delete
    $(document).on('click','a#delete_post',function(e){
        e.preventDefault()
        $d_id = $(this).attr('d_post_id')
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              $.ajax({
                  url: "/post-delete/"+$d_id,
                  method: "GET",
                  success: function(data){
                    location.reload()
                  }
              })
            } else {
              swal("Your Post is safe");
            }
          });

    })

    // pst end
    $(document).on('submit','form#add_product',function(e){
        e.preventDefault()
        $n_price = $("input[name='price']").val()
        $s_price = $("input[name='sp_price']").val()
        // if($n_price < $s_price){
        //     $("#mees_price").html("Higher then Regular price")
        // }else{
        //     $("#mees_price").html("")
          $.ajax({
            url:"/product",
            data: new FormData(this),
            method:"POST",
            contentType: false,
            processData: false,
            success: function(data){
                $("form#add_product")[0].reset()
                $('#product_image_view').attr('src',"admin/media/default.png")
                notifi('success',"Product add successfully",data)
            }
        })
        //}


    })


    //settings
    // logo update
    $(document).on('submit','form#logo_form',function(e){
        e.preventDefault()
        $.ajax({
            url: "/logo_update",
            data: new FormData(this),
            method:"POST",
            processData:false,
            contentType: false,
            success: function(data){
                notifi('success',"Update log successfull",data)
            }
        })

    })

    //socail link update
    $(document).on('submit','form#socail_form',function(e){
        e.preventDefault()
        $.ajax({
            url:"/link_update",
            data: new FormData(this),
            method: "POST",
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data)
                notifi('success',"Update Links successfull",data)
            }
        })
    })

    // home page slider
    $(document).on('submit','form#select_slider',function(e){
        e.preventDefault()
        $.ajax({
            url:'/home_slider',
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData:false,
            success: function(data){
                notifi('success',"Slider successfull",data)
            }
        })
    })
})(jQuery)
