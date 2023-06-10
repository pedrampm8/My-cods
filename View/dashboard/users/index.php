<?php
require_once "View/dashboard/include_dashboard/header.php";
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">لیست خبرنگاران <a class="btn btn-success" href="/dashboard/users/create">ساخت کاربر</a></h6>
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
                        <th>موبایل</th>
                        <th>آخرین ورود</th>
                        <th>آخرین IP</th>
                        <th>تاریخ ایجاد</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                        foreach ($users as $user){
                            ?>
                                <tr>
                                    <td><?php echo $user["id"] ?></td>
                                    <td><?php echo $user["mobile"] ?></td>
                                    <td><?php echo $user["last_login"] ?></td>
                                    <td><?php echo $user["last_ip"] ?></td>
                                    <td><?php echo $user["created_at"] ?></td>
                                    <td>
                                        <a href="/dashboard/users/edit?id=<?php echo $user["id"]; ?>" class="btn btn-primary">ویرایش</a>
                                        <a onclick="return confirm('آیا مطنید?')" href="/dashboard/users/delete?id=<?php echo $user["id"]; ?>" class="btn btn-danger">حذف</a>
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
