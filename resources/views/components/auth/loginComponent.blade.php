<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('backend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend')}}/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('backend')}}/js/sb-admin-2.min.js"></script>
    <script src="{{asset('backend')}}/js/axios.js"></script>
    <script src="{{asset('backend')}}/js/sweet_alert.js"></script>
    <script src="{{asset('backend')}}/js/config.js"></script>

</head>

<body id="page-top">


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="{{ asset('backend/images/registration.jpg') }}" class="img-fluid h-100"
                                    alt="not found">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back! TalentHub</h1>
                                    </div>
                                    <section class="">
                                        <div class="form-group">
                                            <label for="email">Email Or Mobile</label>
                                            <input type="text" class="form-control" id="email_or_mobile"
                                                name="email_or_mobile" aria-describedby="email_or_mobile"
                                                placeholder="Enter your email or mobile">
                                            <small id="email_or_mobile_error" class="form-text  text-danger"></small>
                                        </div>



                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control myPassword"
                                                id="password"name="password" aria-describedby="password"
                                                placeholder="Enter your password">
                                            <small id="password_error"
                                                class="form-text text-danger passowrdAndConfrimPasswordError"></small>
                                            <input type="checkbox" onclick="togglePassword('password')">Show Password

                                        </div>


                                        <button class="btn btn-primary w-100" onclick="onLogin()">Login</button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </section>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" target="_blank" href="{{ url('/registration') }}">Create an
                                            Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script>
        function togglePassword(fieldId) {
            var field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        }

        
/*
    async function onLogin() {
        try {

            document.getElementById("email_or_mobile_error").innerText = "";
            document.getElementById("password_error").innerText = "";

            let email_or_mobile = document.getElementById("email_or_mobile").value.trim();
            let password = document.getElementById("password").value.trim();


            let hasError = false;

            if (!email_or_mobile) {
                document.getElementById("email_or_mobile_error").innerText = "Input is required.";
                hasError = true;
            }
            if (!password) {
                document.getElementById("password_error").innerText = "Password is required.";
                hasError = true;
            } else if (password.length < 8) {
                document.getElementById("password_error").innerText = "Passwords length must be 8 characters or more.";
                hasError = true
            }


            if (hasError) return;


            let data = {
                email_or_mobile: email_or_mobile,
                password: password,
            };

            let response = await axios.post("/user-login", data,{
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    //content type ki hobe
                },
            });

            if (response.data.status === "success") {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: response.data.message,
                    showConfirmButton: false,
                    timer: 1000
                });
                // error clear    
                document.getElementById("email_or_mobile_error").innerText = "";
                document.getElementById("password_error").innerText = "";
                //value clear
                document.getElementById("email_or_mobile").value = "";
                document.getElementById("password").value = "";
                
                //set token
                let token = response.data.token
                localStorage.setItem("token", token);
                console.log(localStorage.setItem("token", token));
                window.location.href="/dashboard"
               
                

            } else if (response.data.status === "error") {

                let message = response.data.message;
                if (message === "Your email or mobile does not exists.") {
                    document.getElementById("email_or_mobile_error").innerText = message;
                } else if (message === "Password is incorrect.") {
                    document.getElementById("password_error").innerText = message;
                }
            }
        } catch (error) {
            console.error("Error occurred:", error);
        }
    }
*/
    </script>
</body>

</html>