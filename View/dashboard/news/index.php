<?php
require_once "View/dashboard/include_dashboard/header.php";
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">لیست اخبار <a class="btn btn-success" href="/dashboard/news/create">ساخت خبر</a></h6>
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
                        <th>توضیحات کوتاه</th>
                        <th>تصویر</th>
                        <th>تاریخ ایجاد</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($news as $item){
                        ?>
                            <tr>
                                <td><?php echo $item["id"] ?></td>
                                <td><?php echo $item["title"] ?></td>
                                <td><?php echo $item["short_description"] ?></td>
                                <td>
                                    <img width="150" height="150" src="/media/<?php echo $item["image"] ?>" alt="<?php echo $item["title"] ?>">
                                </td>
                                <td>
                                    <?php
                                    $gregorianDate =  $item["created_at"]; // 2023-03-25 18:21:12

                                    $gregorianDate = explode(" ",$gregorianDate); // ["2023-03-25","18:21:12"]

                                    $clock = $gregorianDate[1]; // "18:21:12"

                                    $gregorianDate = explode("-",$gregorianDate[0]); // ["2023","03","25"]

                                    echo gregorian_to_jalali($gregorianDate[0],$gregorianDate[1],$gregorianDate[2],"/")." ".$clock; // 1402/1/5 18:21:12

//                                        echo $item["created_at"]
                                    ?>
                                </td>
                                <td>
                                    <a href="/dashboard/news/edit?id=<?php echo $item["id"]; ?>" class="btn btn-primary">ویرایش</a>
                                    <a onclick="return confirm('آیا مطنید?')" href="/dashboard/news/delete?id=<?php echo $item["id"]; ?>" class="btn btn-danger">حذف</a>
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
