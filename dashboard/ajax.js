

$(document).ready(function () {
    // show message function here
    function message(type, msg) {
        var err = $('#err-msg');
        var suc = $('#suc-msg');
        if (type === 'error') {
            suc.hide();
            err.fadeIn();
            err.html(msg);
            setTimeout(function () { err.hide() }, 1500);
        } else if (type === 'success') {
            err.hide();
            suc.fadeIn();
            suc.html(msg);
            setTimeout(function () { suc.hide() }, 1500);
        } else {
            console.error('Invalid message type');
        }
    }

    // login to dashboard 
    $('#login-form').on('submit', function (e) {
        e.preventDefault();
        var username = $('#uname').val();
        var password = $('#password').val();
        
        $.ajax({
            url: 'php/login.php', 
            type: 'POST',
            data: { username: username, password: password },
            success: function (response) {
                console.log(response);
                if (response == 'success') {
                    message('success', 'Login successful!');
                    setTimeout(function () {
                        window.location.href = 'dashboard.php';
                    },2000)
                } else if(response == 'error'){
                    message('error', 'Login failed. Please check your credentials.');
                }
            },
            error: function (error) {
                message('error', 'An error occurred during login.');
            }
        });
    })
 
    //load categories 
    function loadCat() {
        var catTable = $('#catTable');
        $.ajax({
            url: 'php/loadCat.php',
            type: 'POST',
            success: function (data) {
                catTable.html(data);
            }
        })
    }
    loadCat();
    // add category
    $('#add-cat').click(function () {
        $('#add-New').fadeIn();
        $('#add-New').css('display', 'flex');
        $('#close').click(function () {
            $('#add-New').fadeOut();
        });
       
        $('#save').click(function (e) {
            e.preventDefault();
            var cname = $('#cName').val();
            if (cname == '') {
                message('error', 'please enter category name');
            }
            $.ajax({
                url: 'php/addCat.php',
                type: 'POST',
                data: { cname: cname },
                success: function (data) {
                    if (data == 'success') {
                        message('success', 'category added');
                        $('#add-New').fadeOut();
                        loadCat();
                    } else {
                        message('something went wrong');
                    }
                }
            })
        })   
    });
    
    // edit category
    $(document).on('click', '#editcategory', function () {
        $('#editCat').fadeIn();
        $('#editCat').css('display', 'flex');
        var id = $(this).data('path');
        // get the category name
        $.ajax({
            url: "php/getCat.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
                if (data != 'error') {
                    $('#retriveCat').html(data);
                }
            }
        });

        // update the category value 
        $('#upcat-form').submit(function (e) {
            e.preventDefault();
            var id = $('#cid').val();
            var cname = $('#cname').val();   
            if (cname == '') {
                message('error', 'please enter category name');
            } else {
            $.ajax({
                url: "php/updatecat.php",
                type: "POST",
                data: { id: id , cname: cname},
                    success: function (data) {
                    if (data == 'success') {
                        message('success', 'category name updated');
                        $('#editCat').hide();
                        loadCat();
                    }
                }
           });
           }
        })
    });

    // hide edit cat
    $('#editCat #close').click(function () {
        $('#editCat').hide();
    });

    // delete category
    $(document).on('click', '#del-cat', function () {
        var id = $(this).data('path');
        $.ajax({
            url: "php/delCat.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
                if (data == 'success') {
                    message('success', 'category deleted');
                    loadCat();
                }
            }
        });
    });

    //load phones
    function loadPTable() {
    var phoneTable = $('#Phoneload');
    $.ajax({
        url: 'php/loadPhone.php',
        type: 'POST',
        success: function (data) {
            phoneTable.html(data);
        }
    });
    }
    loadPTable();

    // delete product
    $(document).on('click', '#delProduct', function (e) {
    e.preventDefault();
        var id = $(this).data('path');
        $.ajax({
            url: "php/delProduct.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
                if (data == 'success') {
                   window.location.reload();
                }
            }
     });

    });

    //add-product 
    $('#add-product').click(function () {
        $('#add-product-modal').fadeIn();
        $('#add-product-modal').css('display', 'flex');
        $('#close').click(function () {
            $('#add-product-modal').fadeOut();
        });
        
        var addCat = $('#Addcategory');
        // load existing categories
        $.ajax({
            url: 'php/loadaddProdCat.php',
            type: 'POST',
            success: function (data) {
                if (data != 'error') {
                    addCat.html(data);
                }
            }
        });

        $('#addProducts').submit(function (e) {
            e.preventDefault();
            var product = $('#pName').val();
            var productTitle = $('#title').val();
            var Price = $('#price').val();
            var desc = $('#desc').val();
            var category = $('#Addcategory').val();
            var image = $('#image').val();

            if (product == '' || productTitle == '' || Price == '' || desc == '' || category == '' || image == '' ) {
                message('error', 'please fill all fields');
            } else {
                var formdata = new FormData(this);
                formdata.append('insert', '1');
                $.ajax({
                    url: 'addProduct.php',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: formdata,
                    dataType: 'json',
                    success: function (data) {

                        if (data.hasOwnProperty('success')) {
                            message('success', 'item added successfully');
                            $('#add-product-modal').fadeOut();
                            $('#addProducts')[0].reset();
                            loadPTable();
                            
                        }
                    }
                })
                
            }
        })   
    });

    // edit product= 
    $(document).on('click', '#edit-phone', function () {
        $('#edit-product-modal').fadeIn();
        $('#edit-product-modal').css('display', 'flex');
        var id = $(this).data('path');
        var editf = $('#editProducts');

        // load existing values
        $.ajax({
            url: 'loadEditproduct.php',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                if (data != 'error') {
                    editf.html(data);
                }
            }
        });
        
        // update product info
        $('#editProducts').submit(function (e) {
            e.preventDefault();
            
            var id = $('#eid').val();
            var product = $('#epName').val();
            var productTitle = $('#etitle').val();
            var Price = $('#eprice').val();
            var desc = $('#edesc').val();
            var category = $('#ecategory').val();
           

            if (product === '' || productTitle === '' || Price === '' || desc === '' || category === '' ) {
                message('error', 'please fill all fields');
            } else {

                
                $.ajax({
                    url: 'editProducts.php',
                    type: 'POST',
                    data: {id: id,product: product, productTitle: productTitle, Price: Price,desc: desc, category: category},
                    success: function (data) {
                        console.log(data);
                        if (data == 'success') {
                            message('success', 'product updated successfully');
                            $('#edit-product-modal').fadeOut();
                            loadPTable();
                            
                        } else {
                            message('error', 'product not updated');
                        }
                    }
                })
                
            }
        })      
    });
    

    // load slides
    function loadSlides() {
        var slideBox = $('#slides');

        $.ajax({
            url: "php/loadSlides.php",
            type: "POST",
            success: function (data) {
                slideBox.html(data);
            }
        })
    }
    loadSlides();
    
    //add new slides
    $('#addSlides').click(function () {
        $('#New-addSlides').fadeIn();
        $('#New-addSlides').css('display', 'flex');
        
        $('#addSliders').on('submit', function (e) {
            e.preventDefault();
            var pname = $('pname').val();
            var stitle = $('stitle').val();
            var image = $('image').val();
            
            if (pname == '' || stitle == '' || image == '') {
                message('error', 'please fill all fields');
            } else {
                var formdata = new FormData(this);
                formdata.append('insert', '1');

                $.ajax({
                    url: 'addSlides.php',
                    type: "post",
                    contentType: false,
                    processData: false,
                    data: formdata,
                    success: function (data) {
                        if (data.hasOwnProperty('error')) {
                            message('error', 'something went wrong');
                        } else {
                            message('success', 'data added');
                            $('#New-addSlides').fadeOut();
                            $('#addSliders')[0].reset();
                            loadSlides();
                        }
                    }
                })
            }

        })
        
    });

    // edit slides
    $(document).on('click', '#edit-slide-btn', function () {
        $('#editSlides').fadeIn();
        $('#editSlides').css('display', 'flex');
         
        var sid = $(this).data('path');
        var editBox = $('#editSlides-form');
        // retrive the slide info
        $.ajax({
            url: "loadeSlides.php",
            type: "POST",
            data: { id: sid },
            success: function (data) {
                editBox.html(data);
            }
        })
        
        // edit slide info
        $('#editSlides-form').submit(function (e) {
            e.preventDefault();

                var name = $('#pname').val();
                var title = $('#stitle').val();
                var image = $('#image').val();
            
                console.log(sid, title, image);
                
            if (product === '' || productTitle === '' || Price === '' || desc === '' || category === '' || image === '' ) {
                message('error', 'please fill all fields');
            } else {
                var formdata = new FormData(this);
                formdata.append('update', '1');
                $.ajax({
                    url: 'editProducts.php',
                    type: 'PUT',
                    contentType: false,
                    processData: false,
                    data: formdata,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        // if (data.hasOwnProperty('success')) {
                        //     message('success', 'item added successfully');
                        //     $('#add-product-modal').fadeOut();
                        //     $('#addProducts')[0].reset();
                        //     loadPTable();
                            
                        // }
                    }
                })
                
            }
        }) 
    })
   
    // load orders
    function loadOrders() {
        var orderBox = $('#orders');

        $.ajax({
            url: "php/loadOrders.php",
            type: "POST",
            success: function (data) {
                orderBox.html(data);
            }
        })
    }
    loadOrders();
    
    // accepts order
    $(document).on('click', '#acp-order', function (e) {
    e.preventDefault();
        var id = $(this).data('path');
        $.ajax({
            url: "php/acpOrder.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
                if (data == 'success') {
                   loadOrders();
                }
            }
     });

    });
    // decline order
    $(document).on('click', '#del-order', function (e) {
    e.preventDefault();
        var id = $(this).data('path');
        $.ajax({
            url: "php/dclOrder.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
                if (data == 'success') {
                   loadOrders();
                }
            }
     });

    });
       

    // load users
    function loadUser() {
        var orderBox = $('#users');

        $.ajax({
            url: "php/loadUsers.php",
            type: "POST",
            success: function (data) {
                orderBox.html(data);
            }
        })
    }
    loadUser();
    

   // suspend user
    $(document).on('click', '#sus-user', function (e) {
    e.preventDefault();
        var id = $(this).data('path');
        $.ajax({
            url: "php/susUser.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
                if (data == 'success') {
                   loadUser();
                }
            }
     });

    });
    
    // unsuspend user
    $(document).on('click', '#unsus-user', function (e) {
    e.preventDefault();
        var id = $(this).data('path');
        $.ajax({
            url: "php/unsusUser.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
                console.log(data);
                if (data == 'success') {
                   loadUser();
                }
            }
     });

    });


    // load reviews
    function loadReviews() {
        var orderBox = $('#reviews');

        $.ajax({
            url: "php/loadReviews.php",
            type: "POST",
            success: function (data) {
                orderBox.html(data);
            }
        })
    }
    loadReviews();
    
    // delete review
    $(document).on('click', '#delReviews', function (e) {
        e.preventDefault();
        var id = $(this).data('path');
        
        $.ajax({
            url: "php/delReviews.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
                if (data == 'success') {
                    message('success', 'review has removed');
                    loadReviews();
                } else {
                    message('error', 'something went wrong');
                }
            }
        })
    });

    // delete slides 
    $(document).on('click', '#delSlides', function (e) {
        e.preventDefault();
                var id = $(this).data('path');
        
        $.ajax({
            url: "php/delSlides.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
                if (data == 'success') {
                    message('success', 'slide has removed');
                    loadSlides();
                } else {
                    message('error', 'something went wrong');
                }
            }
        })
    })

    //hide modal
    $(document).on('click', '#closed', function () {
        $('#edit-product-modal').fadeOut();
        $('#New-addSlides').fadeOut();
        $('#editSlides').fadeOut();
    })




});



