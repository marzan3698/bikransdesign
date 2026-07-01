<?php require_once('header.php'); ?>
<div class="statusbar-overlay"></div>

<div class="panel-overlay"></div>

<?php require_once('sidebar.php'); ?>
<div class="panel panel-right panel-reveal">
    <link href="css/custom2.css" rel="stylesheet">
    <div class="user_login_info">
        <style>
            .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    margin-top: 20px;
    flex-wrap: wrap;
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 8px 14px;
    font-size: 14px;
    text-decoration: none;
    border-radius: 6px;
    border: 1px solid #12d584;
    color: #12d584;
    background: #fff;
    transition: all 0.3s ease;
}

.pagination a:hover {
    background: #12d584;
    color: #fff;
}

.pagination .active {
    background: #12d584;
    color: #fff;
    font-weight: bold;
    pointer-events: none;
}

.pagination .disabled {
    opacity: 0.5;
    pointer-events: none;
}
        </style>
        <div class="user_thumb">
            <div class="user_avatar"><img src="images/avatar.jpg" alt="" title="" /></div>
            <div class="user_details">
                <p>Welcome <span>John Doe</span></p>
            </div>
            <div class="user_social">
                <ul>
                    <li><a href="http://twitter.com/" class="external"><img src="images/icons/green/twitter.png" alt=""
                                title="" /></a></li>
                    <li><a href="http://www.facebook.com/" class="external"><img src="images/icons/green/facebook.png"
                                alt="" title="" /></a></li>
                    <li><a href="http://plus.google.com" class="external"><img src="images/icons/green/gplus.png" alt=""
                                title="" /></a></li>
                </ul>
            </div>
        </div>

        <nav class="user-nav">
            <ul>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/settings.png" alt=""
                            title="" /><span>Account Settings</span></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/briefcase.png" alt=""
                            title="" /><span>My Account</span></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/message.png" alt=""
                            title="" /><span>Messages</span><strong>12</strong></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/love.png" alt=""
                            title="" /><span>Favorites</span><strong>5</strong></a></li>
                <li><a href="index.php" class="close-panel"><img src="images/icons/green/lock.png" alt=""
                            title="" /><span>Logout</span></a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="views">

    <div class="view view-main">



        <div class="pages">

            <div data-page="index" class="page homepage" style="background-color: #0B2234!important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 60px !important; width: 95%; margin: auto; border: 1px solid #12D584; min-height:86vh;">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text" style="color: white;">ব্যাক্তিগত <br> রেফার তথ্য</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/68.png" alt="" class="box-img" style="width: 155px;">
                            </div>
                        </div>

                        <?php
                            $limit = 10; // per page

                            // current page
                            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
                            if ($page < 1) {
                                $page = 1;
                            }

                            $offset = ($page - 1) * $limit;

                            $user_id = (int)$_SESSION['user_id'];

                            // total rows
                            $totalQuery = "SELECT COUNT(*) as total FROM member WHERE refer_id = $user_id";
                            $totalResult = $mysqli->query($totalQuery);
                            $totalRow = $totalResult->fetch_assoc();
                            $total = $totalRow['total'];

                            $totalPages = ceil($total / $limit);

                            // fetch paginated data
                            $sql = "SELECT * FROM member 
                                    WHERE refer_id = $user_id 
                                    ORDER BY id DESC 
                                    LIMIT $limit OFFSET $offset";

                            $result = $mysqli->query($sql);

                            $sl = $offset + 1;
                        ?>
                        <table class="table3" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th class="ash" style="border: 1px solid #0B2234;">নং</th>
                                    <th class="ash" style="border: 1px solid #0B2234;">তারিখ</th>
                                    <th class="ash" style="border: 1px solid #0B2234;">নাম</th>
                                    <th class="ash" style="border: 1px solid #0B2234;">মোবাইল নম্বর</th>
                                    <th class="ash" style="border: 1px solid #0B2234;">তথ্য</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result->num_rows > 0) { ?>
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td style="color: #0B2234;border: 1px solid #12D584;"><?php echo $sl++; ?></td>
                                            <td style="color: #0B2234;border: 1px solid #12D584;"><?php echo date('d-m-Y', $row['joining_time']) ?></td>
                                            <td style="color: #0B2234;border: 1px solid #12D584;"><?php echo htmlspecialchars($row['name']); ?></td>
                                            <td style="color: #0B2234;border: 1px solid #12D584;"><?php echo htmlspecialchars($row['phone']); ?></td>
                                            <td style="color: #0B2234;border: 1px solid #12D584;"><?php if($row['is_premium']==1){ echo 'OK'; } ?> দেখুন</td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5">No data found</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- Pagination Links -->
                        <div class="pagination">
                            <?php if ($page > 1) { ?>
                                <a href="talika.php?page=<?php echo $page - 1; ?>">Previous</a>
                            <?php } else { ?>
                                <span class="disabled">Previous</span>
                            <?php } ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                <?php if ($i == $page) { ?>
                                    <span class="active"><?php echo $i; ?></span>
                                <?php } else { ?>
                                    <a href="talika.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php } ?>
                            <?php } ?>

                            <?php if ($page < $totalPages) { ?>
                                <a href="talika.php?page=<?php echo $page + 1; ?>">Next</a>
                            <?php } else { ?>
                                <span class="disabled">Next</span>
                            <?php } ?>
                        </div>
                        <?php
                        $mysqli->close();
                        ?>
                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
    function previewPhoto(input) {
        const box = input.closest('.image-label');
        const preview = box.querySelector('.previewImage');
        const placeholder = box.querySelector('.placeholderText');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                placeholder.style.display = 'none';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>