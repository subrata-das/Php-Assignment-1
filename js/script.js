$(document).ready(function() {
    $('#signup_submit').on('click', function(e) {
        // alert('hi');
        var name=$('#signup_name').val();
        var email=$('#signup_email').val();
        var password=$('#signup_psw').val();
        var c_password=$('#signup_cpsw').val();
        if(name === ''){
            $('#signup_name_msg').html("Required*");
            $('#signup_name').focus();
            return false;
        } else {
            $('#signup_name_msg').html("");
        }
        if(email === ''){
            $('#signup_email_msg').html("Required*");
            $('#signup_email').focus();
            return false;
        } else if(verify_email(email) === false){
            $('#signup_email_msg').html("Invalid Entry*");
            $('#signup_email').focus();
            return false;
        } else {
            $('#signup_email_msg').html("");
        }
        if(password === ''){
            $('#signup_psw_msg').html("Required*");
            $('#signup_psw').focus();
            return false;
        } else if(password.length < 8){
            $('#signup_psw_msg').html("At least 8 characters required*");
            $('#signup_psw').focus();
            return false;
        } else {
            $('#signup_psw_msg').html("");
        }
        if(c_password === ''){
            $('#signup_cpsw_msg').html("Required*");
            $('#signup_cpsw').focus();
            return false;
        } else if(c_password != password){
            $('#signup_cpsw_msg').html("Invalid Entry*");
            $('#signup_cpsw').focus();
            return false;
        } else {
            $('#signup_cpsw_msg').html("");
        }
        $.ajax({
            type: 'POST',
            url: './APIs/create_record.php',
            data: {
                name:name,
                email:email,
                password:password,
                c_password:c_password
            },
            success: function(data) {
                data=JSON.parse(data);
                if(data.status === "true"){
                    const design='<div class="alert alert-success">'+data.msg+'</div>';
                    $('#signup_msg').html(design);
                    setTimeout(function() {
                        window.location.href=data.url;
                    }, 3000);
                } else {
                    const design='<div class="alert alert-danger">'+data.msg+'</div>';
                    $('#signup_msg').html(design);
                }
                // console.log(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $('#signin_submit').on('click', function(e) {
        // alert('hi');
        var email=$('#signin_email').val();
        var password=$('#signin_psw').val();

        if(email === ''){
            $('#signin_email_msg').html("Required*");
            $('#signin_email').focus();
            return false;
        } else if(verify_email(email) === false){
            $('#signin_email_msg').html("Invalid Entry*");
            $('#signin_email').focus();
            return false;
        } else {
            $('#signin_email_msg').html("");
        }
        if(password === ''){
            $('#signin_psw_msg').html("Required*");
            $('#signin_psw').focus();
            return false;
        } else {
            $('#signin_psw_msg').html("");
        }

        $.ajax({
            type: 'POST',
            url: './APIs/verify_record.php',
            data: {
                email:email,
                password:password
            },
            success: function(data) {
                data=JSON.parse(data);
                if(data.status === "true"){
                    const design='<div class="alert alert-success">'+data.msg+'</div>';
                    $('#signin_msg').html(design);
                    setTimeout(function() {
                        window.location.href=data.url;
                    }, 3000);
                } else {
                    const design='<div class="alert alert-danger">'+data.msg+'</div>';
                    $('#signin_msg').html(design);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $('#newticket_submit').on('click', function(e) {
        // alert('hi');
        var name=$('#newticket_name').val();
        var email=$('#newticket_email').val();
        var dept=$('#newticket_dept').text();
        var category=$('#newticket_category').text();
        var url=$('#newticket_url').val();
        var subject=$('#newticket_subject').val();
        var desc=$('#newticket_dec').val();
        var phone=$('#newticket_phone').val();
        var priority=$('#newticket_priority').text();

        if(name === ''){
            $('#newticket_name_msg').html("Required*");
            $('#newticket_name').focus();
            return false;
        } else {
            $('#newticket_name_msg').html("");
        }
        if(email === ''){
            $('#newticket_email_msg').html("Required*");
            $('#newticket_email').focus();
            return false;
        } else if(verify_email(email) === false){
            $('#newticket_email_msg').html("Invalid Entry*");
            $('#newticket_email').focus();
            return false;
        } else {
            $('#newticket_email_msg').html("");
        }
        if(url === ''){
            $('#newticket_url_msg').html("Required*");
            $('#newticket_url').focus();
            return false;
        } else{
            $('#newticket_url_msg').html("");
        }
        if(subject === ''){
            $('#newticket_subject_msg').html("Required*");
            $('#newticket_subject').focus();
            return false;
        } else {
            $('#newticket_subject_msg').html("");
        }
        if(desc === ''){
            $('#newticket_dec_msg').html("Required*");
            $('#newticket_dec').focus();
            return false;
        } else {
            $('#newticket_dec_msg').html("");
        }
        // if(phone === ''){
        //     $('#newticket_phone').focus();
        //     return false;
        // }

        $.ajax({
            type: 'POST',
            url: './APIs/newticket.php',
            data:{
                name:name,
                email:email,
                dept:dept,
                category:category,
                url:url,
                subject:subject,
                desc:desc,
                phone:phone,
                priority:priority
            },
            success: function(data) {
                data=JSON.parse(data);
                if(data.status === "true"){
                    alert('Record not created !!!');
                } else {
                    // alert('Record not created !!!');
                    // location change
                    console.log(data.msg);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});

function verify_email(email) {
    const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
}


