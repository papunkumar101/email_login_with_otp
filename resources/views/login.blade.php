<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
        .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
.hide-one{
    display:none;
}
        </style>
    </head>
    <body>
        <div class="header my-5"></div> 
    <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="submit-form" method="POST">
            @csrf
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-2 hide-two">
          @if (Session::has('status'))
        {{Session::get('status')}}
        @endif
            <label class="form-label" for="form3Example3">Email address</label>
            <input type="email" name="email" id="email_inpt" class="form-control form-control-lg"
              placeholder="Enter a valid email address" required> 
          </div>
          <label class="form-label hide-one" for="reSend">Please Check Your Mail : <span class="mail"></span></label>
          <div class="text-right hide-one"><a href="javascript:void(0)" class="text-body" onClick="ReSendOtp()">Resent OTP</a></div>
          <div class="text-lg-start">
            <button type="button" class="btn btn-primary btn-lg mb-3 hide-two" onClick="SendOtp()">Send OTP</button> 
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3 hide-one"> 
            <label class="form-label" for="form3Example4">Enter Your OTP</label>
            <input type="text" name="otp" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter otp" required>
          </div> 

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <!-- <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div> -->
            <a href="#!" class="text-body"></a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2 hide-one">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg mb-3"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                class="link-danger">Register</a></p> -->
          </div>

        </form>
      </div>
    </div>
  </div>
 
</section>


<script>
    function SendOtp(){ 
        $('.hide-one').toggle();
        $('.hide-two').toggle('hide-one');   
        var email_id  = $('#email_inpt').val();
        // alert(email_id);
        $('.mail').text(email_id);
        // var base_url = ;
        $.ajax({
            url:'send_otp',
            method:'POST',
            datatype:'aplication/json',
            data:{"_token":"{{csrf_token()}}",user_id:email_id},
            success:function(res){
              console.log(res);
            }
        });
    }

    function ReSendOtp(){ 
        // $('.hide-one').toggle();
        // $('.hide-two').toggle('hide-one');   
        var email_id  = $('#email_inpt').val();
        // // alert(email_id);
        // $('.mail').text(email_id);
        // // var base_url = ;
        $.ajax({
            url:'resend-otp',
            method:'POST',
            datatype:'aplication/json',
            data:{"_token":"{{csrf_token()}}",user_id:email_id},
            success:function(res){
              console.log(res);
            }
        });
    }
</script>
    </body>
</html>
