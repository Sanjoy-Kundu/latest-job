<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registration</title>

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
    <script src="{{asset('common_custom')}}/js/axios.js"></script>
    <script src="{{asset('common_custom')}}/js/sweet_alert.js"></script>
    <script src="{{asset('common_custom')}}/js/sweet_alert.js"></script>
    <script src="{{asset('common_custom')}}/js/config.js"></script>

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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome To! TalentHub</h1>
                                    </div>
                                    <section class="">
                                        <div id="success_message" class="alert alert-success d-none"></div>
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                 placeholder="Enter your name">
                                            <small id="name_error" class="form-text text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                 placeholder="Enter your email">
                                            <small id="email_error" class="form-text  text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="tel" class="form-control" id="mobile" name="mobile"
                                                 placeholder="018XXXXXXXX">
                                            <small id="mobile_error" class="form-text  text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control myPassword" id="password"name="password" placeholder="Enter your password">
                                            <small id="password_error" class="form-text text-danger passowrdAndConfrimPasswordError"></small>
                                            <input type="checkbox" onclick="togglePassword('password')">Show Password
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  placeholder="Enter your confirm password">
                                            <small id="confirm_password_error" class="form-text text-danger"></small>
                                            <input type="checkbox" onclick="togglePassword('password_confirmation')">Show Password
                                        </div>

                                        <button class="btn btn-primary w-100" onclick="onRegistration()">Registration</button>
                                        <hr>
                                    </section>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        Already Have an Account? <a class="small" href="{{url('/login')}}" target="_blank">login</a>
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
        async function onRegistration() {
        // Clear previous error messages
        document.getElementById("name_error").innerText = "";
        document.getElementById("email_error").innerText = "";
        document.getElementById("mobile_error").innerText = "";
        document.getElementById("password_error").innerText = "";
        document.getElementById("confirm_password_error").innerText = "";
        document.getElementById("success_message").classList.add("d-none");

        // Get input values
        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let mobile = document.getElementById("mobile").value;
        let password = document.getElementById("password").value;
        let password_confirmation = document.getElementById("password_confirmation").value;

        let isError = false;
        if(!name){
            document.getElementById("name_error").innerText = "Name field is required";
            isError = true;
        }
        if(!email){
            document.getElementById("email_error").innerText = "Email field is required";
            isError = true;
        }

        if(!mobile){
            document.getElementById("mobile_error").innerText = "Mobile field is required";
            isError = true;
        }

        if(!password){
            document.getElementById("password_error").innerText = "Password field is required";
            isError = true;
        }else if(password.length < 8){
            document.getElementById("password_error").innerText = "Password length must be 8 characters";
            isError = true;
        }


        if(!password_confirmation){
            document.getElementById("confirm_password_error").innerText = "Confirm password field is required";
            isError = true;
        }else if(password !== password_confirmation){
            document.getElementById("confirm_password_error").innerText = "Your password and confirm password doesn't match";
            isError = true;
        }
    
        if(isError)return;

       
        let data = {
            name: name,
            email: email,
            mobile: mobile,
            password: password,
            password_confirmation: password_confirmation
        };

        try {
            // POST request to API
            let response = await axios.post("/user-registration", data);
            if (response.data.status === "success") {
                // Show success message
                document.getElementById("success_message").innerText = response.data.message;
                document.getElementById("success_message").classList.remove("d-none");

                // Optionally reset the form
                document.getElementById("name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("mobile").value = "";
                document.getElementById("password").value = "";
                document.getElementById("password_confirmation").value = "";
                window.location.href="/login"
            }

            if(response.data.status === "success"){
                console.log(response.data.message)
            }else{
                if(response.data.status === "error"){
                    if(response.data.errors.email){
                        document.getElementById("email_error").innerText = response.data.errors.email[0];
                        isError = true;
                    }
                    if(response.data.errors.mobile){
                        document.getElementById("mobile_error").innerText = response.data.errors.mobile[0];
                        isError = true;
                    }
                }
            }
        } catch (error) {
            console.error("An error occurred:", error);
        }
    }
    </script>
</body>

</html>
