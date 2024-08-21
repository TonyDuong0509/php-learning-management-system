<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="../public/backend/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="../public/backend/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../public/backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../public/backend/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="../public/backend/css/pace.min.css" rel="stylesheet" />
    <script src="../public/backend/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="../public/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/backend/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="../public/backend/css/app.css" rel="stylesheet">
    <link href="../public/backend/css/icons.css" rel="stylesheet">
    <title>Instructor Login</title>
</head>

<?php
global $c;
global $a;
?>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        <img src="../public/backend/images/logo-icon.png" width="60" alt="" />
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class="">Aduca Instructor</h5>
                                        <p class="mb-0">Please log in to your account</p>
                                        <p class="mb-0 mt-2 text-decoration-underline">
                                            Don't have account ? <a href="registerForm.php">click here</a> to register
                                        </p>
                                    </div>
                                    <div class="form-body">
                                        <?php if (isset($_GET['error'])) {
                                            if ($_GET['error'] == 1) {
                                                echo "
                                                    <div class='alert alert-danger'>User not exist, please try again !</div>
                                                ";
                                            }
                                            if ($_GET['error'] == 2) {
                                                echo "
                                                    <div class='alert alert-danger'>Password incorrect, please try again !</div>
                                                ";
                                            }
                                        }
                                        ?>
                                        <?php if (isset($_GET['success'])) {
                                            if ($_GET['success'] == 1) {
                                                echo "
                                                    <div class='alert alert-success'>Register successfully, you can login right now.</div>
                                                ";
                                            }
                                        }
                                        ?>
                                        <form method="POST" action="index.php?c=instructor&a=login" class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="jhon@example.com">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"> <a href="authentication-forgot-password">Forgot Password ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="../public/backend/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="../public/backend/js/jquery.min.js"></script>
    <script src="../public/backend/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../public/backend/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../public/backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="../public/backend/js/app.js"></script>
</body>

</html>