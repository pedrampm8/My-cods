<?php
require_once "View/dashboard/include_dashboard/header.php";
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">افزودن خبرنگار<a class="btn btn-success" href="/dashboard/users">بازگشت به لیست</a></h6>
        </div>
        <div class="card-body">
            <?php
             include_once "View/error.php";
            ?>


            <form class="user" method="POST" action="/dashboard/users/store">
                <div class="form-group">
                    <input name="mobile" type="text" class="form-control form-control-user"
                           id="mobile" aria-describedby="emailHelp"
                           placeholder="Enter Mobile ...">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control form-control-user"
                           id="exampleInputPassword" placeholder="Password">
                </div>
                <button name="submit" class="btn btn-primary btn-user">
                    Save
                </button>

            </form>
        </div>
    </div>
</div>

<?php
require_once "View/dashboard/include_dashboard/footer.php";
?>
