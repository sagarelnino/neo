<?php
    require_once 'includes/application.php';
    $app = new Application();
    $lessons = $app->

    $limit = 30;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $result = $conn->query("SELECT * FROM lesson LIMIT $start, $limit");
    $lessons = $result->fetch_all(MYSQLI_ASSOC);

//    couting row in a table

    $count_row_result = $conn->query("SELECT count(id) AS id from lesson");
    $count_row = $count_row_result->fetch_all(MYSQLI_ASSOC);
    $total_rows = $count_row[0]['id'];
    $total_pages = ceil($total_rows / $limit);

    $previous = $page - 1;
    $next = $page + 1;
?>


<!DOCTYPE html>
<html lang="ja-jp">
<head>
    <title>Student Lesson</title>
    <!--Icon in title-->
    <link rel="shortcut icon" href="assets/images/log.ico">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
     <link rel="stylesheet" href="assets/css/app.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<!-- student navbar starts -->
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="#" class="navbar-brand"><img class="logo-image" src="assets/images/NEO_logo.jpg"></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav ml-auto">
            <a href="#" class="nav-item nav-link active">レッスン</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">プログラム</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">自分の</a>
                    <a href="#" class="dropdown-item">全て</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">アカウント</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">プロファイル</a>
                    <a href="#" class="dropdown-item">購入履歴</a>
                </div>
            </div>
        </div>
        <div class="navbar-nav">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">生徒</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">パスワードを変更</a>
                    <a href="#" class="dropdown-item">ログアウト</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- student nav_bar ends -->

<!-- student_lesson searchbox starts -->
<!--offset-md-7 col-md-3-->
<div class="input-group offset-md-7 col-md-3  mt-5 text-light" id="lesson-search">
    <input type="text" name="" class="form-control float-right" placeholder="日付">
    <div class="input-group-append">
        <button type="button" name="search" class="btn btn-danger"><i class="fa fa-search"></i>  全て</button>
<!--        <button class="btn btn-success" type="button">-->
<!--            <i class="fa fa-search"></i>-->
<!--            <span>全て</span>-->
<!--        </button>-->
    </div>
</div>
<!-- student_lesson searchbox ends -->

<!-- student_lesson starts -->
<div class="row mt-5">
    <div class="offset-md-2 col-md-8">
        <!-- TABLE -->
        <table class="table table-bordered text-center table-hover">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>日付</th>
                <th>時間</th>
                <th>プログラム</th>
                <th>ステータス</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($lessons as $lesson):?>
                    <tr>
                        <th scope="row"><?= $lesson['id'];?></th>
                        <td><?= $lesson['date']; ?></td>
                        <td><?= $lesson['time']; ?></td>
                        <td><?= $lesson['prog_name']; ?></td>
                        <td><?= $lesson['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- student_lesson ends -->

<!-- pagination strats -->
<nav>
    <ul class="pagination mt-5 justify-content-center">

        <?php if ($page > 1) {
            ?>
            <li class="page-item">
                <a class="page-link" href="student_lesson.php?page=<?= $previous; ?>">&laquo; Previous</a>
            </li>
        <?php } else {
            ?>
            <li class="page-item disabled">
                <a class="page-link" href="student_lesson.php?page=<?= $previous; ?>">&laquo; Previous</a>
            </li>
        <?php } ?>

        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <?php if ($page == $i) {
               ?>
                <li class="page-item active">
                    <a class="page-link" href="student_lesson.php?page=<?=$i?>"><?= $i ?></a>
                </li>
            <?php } else {  ?>
                <li class="page-item">
                    <a class="page-link" href="student_lesson.php?page=<?=$i?>"><?= $i ?></a>
                </li>
            <?php } ?>
        <?php endfor; ?>

        <?php if ($page < $total_pages) {
            ?>
            <li class="page-item">
                <a class="page-link" href="student_lesson.php?page=<?= $next; ?>">Next &raquo;</a>
            </li>
        <?php } else {
            ?>
            <li class="page-item disabled">
                <a class="page-link" href="student_lesson.php?page=<?= $next; ?>">Next &raquo;</a>
            </li>
        <?php } ?>
    </ul>
</nav>
<!-- pagination ends -->

</body>
</html>
