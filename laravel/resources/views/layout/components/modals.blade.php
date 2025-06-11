<?php /* #signup-modal - Start */ ?>
<div class="login-modal modal fade" id="singup-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-custom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="flaticon-close"></i>
                </button>
                <div class="login-form-section">
                    <div class="container padding-0">
                        <div class="row padding-0">
                            <div class="col-md-6 padding-0">
                                <div class="login-section grd-bg">
                                    <div class="login-back">
                                        <div class="login-content">
                                            <h2 class="title">Welcome back </h2>
                                            <p>To keep connected with us please login with your personal info
                                            </p>
                                        </div>
                                        <div class="btn-wrapper">
                                            <button class="boxed-btn" type="submit"><span>Sign
                                                    In</span> </button>
                                        </div>
                                        <div class="img-wrap padding-top-50">
                                            <img src="{{ asset('assets/img/signup-login/dfoctor.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="reg-section">
                                    <form class="login-form" action="index.html">
                                        <h2 class="title padding-bottom-30">Create account</h2>

                                        <div class="form-group">
                                            <label for="name-form">Username or Email</label>
                                            <input id="name-form" type="text" class="form-control"
                                                placeholder="Username or Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="email-four">Email</label>
                                            <input id="email-four" type="text" class="form-control"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password-four">Password</label>
                                            <input id="password-four" type="password" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <div class="btn-wrapper">
                                            <button class="boxed-btn" type="submit">Sign Up</button>
                                        </div>
                                        <br>
                                        <p>Or</p>
                                        <div class="social-icon ">
                                            <ul class="social-share">
                                                <li class="fb"><a href="#"><i class="flaticon-facebook"></i>
                                                        Sign in with facebook</a></li>
                                                <li class="ggl"><a href="#">
                                                        <img src="{{ asset('assets/img/icon-img/2.png') }}" alt=""> Sign in
                                                        with google
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /* #signup-modal - End */ ?>

<?php /* #login-modal - Start */ ?>
<div class="login-modal modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-custom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close style-2" data-dismiss="modal" aria-label="Close">
                    <i class="flaticon-close"></i>
                </button>
                <div class="login-form-section">
                    <div class="container padding-0">
                        <div class="row padding-0">
                            <div class="col-lg-6 padding-0">
                                <div class="login-section bg-grey">
                                    <form class="login-form" action="index.html">
                                        <h2 class="title margin-bottom-35">Log In</h2>

                                        <div class="form-group">
                                            <label for="email-three">Username or Email</label>
                                            <input id="email-three" type="text" class="form-control"
                                                placeholder="Username or Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password-three">Password</label>
                                            <input id="password-three" type="password" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <a href="" class="forget-btn">Forget password ? </a>
                                        <div class="btn-wrapper">
                                            <button class="boxed-btn" type="submit"><span>LOG
                                                    IN</span> </button>
                                        </div>
                                    </form>

                                    <div class="social-icon light-bg">
                                        <ul class="social-share ">
                                            <li class="fb"><a href="#"><i class="flaticon-facebook"></i> Sign in
                                                    with facebook</a></li>
                                            <li class="ggl"><a href="#">
                                                    <img src="{{ asset('assets/img/icon-img/2.png') }}" alt=""> Sign in with
                                                    google
                                                </a></li>
                                        </ul>
                                        <div class="new-user padding-top-30">
                                            <h6>New User ?</h6>
                                            <a href="#">Create a new account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block padding-0">
                                <div class="reg-section bg-grey">
                                    <div class="login-back">
                                        <div class="img-wrap padding-bottom-50">
                                            <img src="{{ asset('assets/img/signup-login/sign-in.png') }}" alt="">
                                        </div>
                                        <div class="login-content">
                                            <h4 class="title">Hi Dear ? Sign up to join us</h4>
                                        </div>
                                        <div class="btn-wrapper ">
                                            <button class="boxed-btn" type="submit"><span>SIGN
                                                    UP</span> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /* #login-modal - End */ ?>