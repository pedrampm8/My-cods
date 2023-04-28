<?php
require_once "View/dashboard/include_dashboard/header.php";
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">افزودن خبر<a class="btn btn-success" href="/dashboard/category">بازگشت به لیست</a></h6>
        </div>
        <div class="card-body">
            <?php
            include_once "View/error.php";
            ?>


            <form class="user" method="POST" action="/dashboard/category/store">
                <div class="form-group">
                    <input name="title" type="text" class="form-control form-control-user"
                           id="title" aria-describedby="emailHelp"
                           placeholder="عنوان ...">
                </div>


                <div class="form-group">
                    <select name="parent_id" type="text" class="form-control"
                           id="parent_id" aria-describedby="emailHelp">

                        <option value="">
                             دسته والد
                        </option>

                        <?php
                            foreach ($categories as $category){
                                ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['title']; ?>
                                    </option>
                                <?php
                            }
                        ?>

                    </select>
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
