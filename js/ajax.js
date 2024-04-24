
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
    
    //user registration code here 
    $('#sign-up').submit(function (e) {
        e.preventDefault();
        var err = $('#err-msg');
        var suc = $('#success-message');        
        var check = $('#checkTerms');
        if(check.is(':checked')) {
            err.hide();
            var formdata = new FormData(this);
            formdata.append('create', '1');
            $.ajax({
                url: "php/register.php",
                type: "POST",
                contentType: false,
                processData: false,
                data: formdata,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data.hasOwnProperty('success')) {
                        err.hide();
                        suc.fadeIn();
                        suc.html(data.success);
                        setTimeout(function () {
                            window.location.href = 'account.php';
                        }, 1500);
                    } else if (data.hasOwnProperty('error')) {
                        suc.hide();
                        err.show();
                        err.html(data.error);
                    }
                }
            })
        } else {
            err.show();
            err.html('Please fill all required fields!');
        }
    });

    //user login code here 
    $('#login-form').submit(function (e) {
        e.preventDefault();
        var err = $('#err-msg');
        var suc = $('#success-message');
        var uname = $('#uname').val();
        var pass = $('#password').val();

        if (uname == '' || pass == '') {
            err.fadeIn();
            err.html('please fill all the fields');
        } else {
            var formdata = new FormData(this);
            formdata.append('create', '1');
            $.ajax({
                url: "php/login.php",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (data) {
                    if (data.hasOwnProperty('success')) {
                        err.hide();
                        suc.show();
                        suc.html(data.success);
                        setTimeout(function () { window.location.href = 'account.php' }, 1200);
                    } else if (data.hasOwnProperty('error')) {
                        suc.hide();
                        err.show();
                        err.html(data.error);;
                    }
                }
            })
        }
    });

    // update user profile 
    $('#update-user').submit(function (e) {
        e.preventDefault();
        var err = $('#err-msg');
        var suc = $('#success-message');
        
        var formdata = new FormData(this);
        formdata.append('update','1');
        $.ajax({
            url: "php/update-profile.php",
            type: "POST",
            contentType: false,
            processData: false,
            data: formdata,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data.hasOwnProperty('success')) {
                    err.hide();
                    suc.show();
                    suc.html(data.success);
                    setTimeout(function () {
                        window.location.href = 'login.php';
                    }, 1500);
                } else {
                    suc.hide();
                    err.show();
                    err.html(data.error);
                }
            }
        })

    });
    
    // delete account
    $(document).on("click", "#delete", function (e) {
    e.preventDefault();
    if(confirm("are sure to delete your account? you can't recover this account after delete")) {
        var id = $(this).data('path');
        $.ajax({
            url: "php/delete.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
                if (data == 'success') {
                    window.location.href = 'index.php';
                }
            }
        })  
    } else {
        
    }
    })
    // load carts 
    function loadCart() {
        var cartNum = $('#cartNum');
        $.ajax({
            url: "php/loadCart.php",
            type: "POST",
            success: function (data) {
                if (data == '') {
                    cartNum.html(0);
                } else {
                    cartNum.html(data);
                }
            }
        })
    };
    loadCart();

    // load carts 
    function loadWish() {
        var cartNum = $('#wishNum');
        $.ajax({
            url: "php/loadWish.php",
            type: "POST",
            success: function (data) {
                if (data == '') {
                    cartNum.html(0);
                } else {
                     cartNum.html(data);
                }
            }
        })
    }
    loadWish();

    // add to cart code here
    $(document).on("click", "#addCart", function (e) {
        e.preventDefault();
        var pid = $(this).data('path');
        console.log(pid);
        $.ajax({
            url: "php/add-cart.php",
            type: "POST",
            data: { pid: pid },
            success: function (data) { 
                
                if (data == 'login') {
                    window.location.href = "login.php";
                }else if(data == 'incart') {
                    message('error', 'item already in carts')
                } else {
                    message('success', 'item added to carts')
                    loadCart();
                }
            }
        })
    });

    // delete cart
    $(document).on("click", "#rmvCart", function (e) {
        e.preventDefault();
        var pid = $('#rmvCart').data('path');
        $.ajax({
            url: "php/deleteCart.php",
            type: "POST",
            data: { pid: pid },
            success: function (data) {
                if (data == 'login') {
                    window.location.href = "login.php";
                } else {
                    window.location.href = "carts.php";
                    
                    loadCart();
                }
            }
        })
    });

   // delete wishlists
    $(document).on("click", "#rmvWish", function (e) {
        e.preventDefault();
        var pid = $('#rmvWish').data('path');
        $.ajax({
            url: "php/deleteWish.php",
            type: "POST",
            data: { pid: pid },
            success: function (data) {
                if (data == 'login') {
                    window.location.href = "login.php";
                } else {
                    window.location.href = "wishlists.php";
                    loadWish();
                }
            }
        })
    });

    // add to wishlist
    $(document).on("click", "#addWish", function (e) {
        e.preventDefault();
        var pid = $(this).data('path');
        $.ajax({
            url: "php/add-wish.php",
            type: "POST",
            data: { pid: pid },
            success: function (data) {
                if (data == 'login') {
                    window.location.href = "login.php";
                } else if(data == 'incart') {
                    message('error', 'item already in wishlist')
                } else {
                    message('success', 'item added to wishlist')
                    loadWish();
                }
            }
        })
    });

    // search
    $(document).on('keyup', "#search", function (e) {
        e.preventDefault();
        var search = $('#search').val();
        var searchBox = $('#searchBox');
        var searched = $('#searched');
        if (search != '') {
            searchBox.show();
        $.ajax({
            url: "php/search.php",
            type: "POST",
            data: { search: search },
            success: function (data) {
                if (data != '') {
                    searched.html(data); 
                }
            }
        }); 
        } else {
            searchBox.hide();
        }
        
    })

    function loadSlides() {
        var slides = $('.swiper-wrapper');
        $.ajax({
        url: "php/loadSlides.php",
        type: "GET",
        dataType: "html", // We expect the response to be HTML content
        success: function(data) {
            // 'data' contains the HTML content returned by the PHP script
            // Update the HTML content of the .swiper-wrapper with the received data
            slides.html(data);
        },
        });
    };
    loadSlides();

    function loadPhones() {
        var products = $('#products');
        $.ajax({
        url: "php/load-phone.php",
        type: "GET",
        success: function(data) {
        products.html(data);
        }
        })
    };
    loadPhones();

    // // show messages
    // function notify(type, text) {
    //     if (type == 'error') {
            
    //     }
    // }


    //confrim order
    $(document).on('click', '#confirm', function (e) {
        e.preventDefault();
        var products = $('#phones').val();
        var user = $('#user').val();
        var totalPrice = $('#totalPrice').val();
        var address = $('#address').val();
        var phone = $('#phoneNum').val();

        if (address == '') {
            message('error', 'please fill address');
        } else if (phone === '') {
            message('error', 'please fill your phone number using numbers');
        } else {
            
            $.ajax({
                url: "php/order.php",
                type: "post",
                data: { products: products, user: user, totalPrice: totalPrice, address: address, phone: phone },
                success: function (data) {
                    console.log(data);
                    if(data == 'success'){
                        message('success', 'your order has been placed. You are redirecting to order history...');
                        setTimeout(function () {
                            window.location.href = 'order.php';
                        }, 1500);
                    } else {
                        message('error', 'something went wrong, please check all info'); 
                    }
                }
            });
        }


    });


  });