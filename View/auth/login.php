<?php
    require_once "View/auth/include_auth/header.php";
?>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>

                                <?php
                                include_once "View/error.php";
                                ?>
                                <form class="user" method="POST" action="/login/store">
                                    <div class="form-group">
                                        <input name="mobile" type="text" class="form-control form-control-user"
                                               id="mobile" aria-describedby="emailHelp"
                                               placeholder="Enter Mobile ...">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Password">
                                    </div>
<!--                                    <div class="form-group">-->
<!--                                        <div class="custom-control custom-checkbox small">-->
<!--                                            <input type="checkbox" class="custom-control-input" id="customCheck">-->
<!--                                            <label class="custom-control-label" for="customCheck">Remember-->
<!--                                                Me</label>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <button name="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/assets/dashboard/forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="/assets/dashboard/register.html">Create an Account!</a>
                                </div>
<?php
require_once "View/auth/include_auth/footer.php";
?>