<?php
require_once "View/dashboard/include_dashboard/header.php";
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">لیست دسته بندی ها <a class="btn btn-success" href="/dashboard/category/create">ساخت دسته بندی</a></h6>
        </div>
        <div class="card-body">
            <?php
            include_once "View/error.php";
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>عنوان</th>
                        <th>تاریخ ایجاد</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($category as $item){
                        ?>
                            <tr>
                                <td><?php echo $item["id"] ?></td>
                                <td><?php echo $item["title"] ?></td>
                                <td><?php echo $item["created_at"] ?></td>
                                <td>
                                    <a class="btn btn-primary">ویرایش</a>
                                    <a onclick="return confirm('آیا مطنید?')" href="/dashboard/category/delete?id=<?php echo $item["id"]; ?>" class="btn btn-danger">حذف</a>
                                </td>
                            </tr>
                        <?php
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
require_once "View/dashboard/include_dashboard/footer.php";
?>
