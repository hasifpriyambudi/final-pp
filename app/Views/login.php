<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS & JS -->
    <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet" />
    <script src="/public/assets/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            /* outline: red dashed 1px; */
        }

        body {
            /* background-image: linear-gradient(135deg, #00CC88 10%, #038373 100%); */
            /* background-color: #00CC88; */
            background-image: url('../public/assets/img/bg3.svg');
            background-size: cover;
            /* background-color: none; */
        }

        .card {
            background-color: #ffffff02;
            backdrop-filter: blur(15px);
            border-color: #FFFFFF;
            /* box-shadow: #038373 20px 16px 26px 16px; */
            box-shadow: #038373 18px 16px 14px;
            box-shadow: blur;
        }
    </style>
</head>

<body style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100vh;">
    <div class="container">
        <div class="d-flex" style="justify-content: center; align-items: center;">
            <div class="log col-5">
                <div class="card">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div>
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-white mb-4">Selamat Datang!</h1>
                                </div>
                                <form class="user" method="post" action="/login/proses" style="padding-top: 5%;">
                                    <?= csrf_field() ?>

                                    <?php if (session()->getFlashdata('msgLogin')) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="bi bi-exclamation-diamond"></i>
                                            <?= session()->getFlashdata('msgLogin'); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group mb-3">
											<label for="uname" class="form-label text-white">Username / Email</label>
											<div class="input-group has-validation">
												<input type="text" class="form-control" autofocus name="uname" id="uname" placeholder="email" style="border-color:<?= (validation_show_error('uname'))?'red':'';?>" value="<?= old('uname');?>" required>
											</div>
											<span style="font-size:small; color:red;"><?= validation_show_error('uname');?></span>
										</div>
                                        <div class="form-group mb-3">
											<label for="pass" class="form-label text-white">Password</label>
                                            <input type="password" class="form-control" name="pass" id="pass" placeholder="password" style="border-color:<?= (validation_show_error('pass'))?'red':'';?>" value="<?= old('pass');?>" required>
											<span style="font-size:small; color:red;"><?= validation_show_error('pass');?></span>
										</div>
                                    
                                    <div class="form-group mb-3">
                                        <input class="form-check-input" type="checkbox" id="customCheck" onclick="showPassword()">
                                        <label class="form-check-label text-white" for="customCheck">
                                            Check Password
                                        </label>
                                    </div>
                                    <div class="d-flex" style="justify-content: center; align-items: center;">
                                        <button class="btn btn-primary" type="submit" style="width: 30%">
                                            Login
                                            
                                        </button>  <!-- Button login masih error karena belum terdapat aksi logout -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showPassword() {
            var password = document.getElementById('pass');

            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>
</body>

</html>