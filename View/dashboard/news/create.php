<?php
require_once "View/dashboard/include_dashboard/header.php";
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">افزودن خبر<a class="btn btn-success" href="/dashboard/news">بازگشت به لیست</a></h6>
        </div>
        <div class="card-body">
            <?php
            include_once "View/error.php";
            ?>


            <form enctype="multipart/form-data" class="user" method="POST" action="/dashboard/news/store">
                <div class="form-group">
                    <input name="title" type="text" class="form-control form-control-user"
                           id="title" aria-describedby="emailHelp"
                           placeholder="عنوان ...">
                </div>

                <div class="form-group">
                    <input name="short_description" type="text" class="form-control form-control-user"
                           id="short_description" aria-describedby="emailHelp"
                           placeholder="Enter توضیحات کوتاه ...">
                </div>

                <div class="form-group">
                    <textarea name="description" type="text" class="form-control form-control-user rounded-0"
                           id="description" aria-describedby="emailHelp"
                              placeholder="Enter Description ..."></textarea>
                </div>

                <div class="form-group">
                    <input name="image" type="file" class="form-control form-control-user"
                           id="image">
                </div>


                <div class="form-group">
                    <select name="category_ids[]" multiple class="form-control"
                            id="category_ids[]" aria-describedby="emailHelp">

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
