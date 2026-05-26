<?php require_once('header.php'); ?>
<div class="statusbar-overlay"></div>

<div class="panel-overlay"></div>

<?php require_once('sidebar.php'); ?>
<div class="panel panel-right panel-reveal">
    <link href="css/custom2.css" rel="stylesheet">
    <div class="user_login_info">

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
        <style>
            .pagination{
                margin-top:20px;
                text-align:center;
            }

            .pagination a{
                display:inline-block;
                padding:6px 12px;
                margin:3px;
                border:1px solid #ddd;
                text-decoration:none;
                color:#333;
                font-size:14px;
                border-radius:4px;
                transition:0.3s;
            }

            .pagination a:hover{
                background:#28a745;
                color:#fff;
                border-color:#28a745;
            }

            .pagination a.active{
                background:#28a745;
                color:#fff;
                border-color:#28a745;
            }
        </style>


        <div class="pages">

            <div data-page="index" class="page homepage" style="background-color: #EEEEEE !important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222; min-height:calc(100vh - 105px);">
                        <div class="box">

                            <div class="box-text-wrap">
                                <div class="box-text" style="font-size: 18px;">পঞ্চম প্রজন্ম সাফল্যস্তর<br><span
                                        style="font-size: 14px;">পরবর্তী
                                        সহযোগী তালিকা</span>
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/24.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <?php 
                            require_once('counting-level.php');
                            $myRefer = QB::table('member')->where('refer_id', $_SESSION['user_id'])->get();
                        ?>
                        <div class="date-wrapper2">
                            <h4 style="border:black 1px solid">
                                পরবর্তী সহযোগী </h4>
                            <h4 style="border:black 1px solid">
                                জয়েনিং সংখ্যা-<?= count($myRefer); ?></h4>
                        </div>
                        <?php
                            $per_page = 10;

                            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                            if($page < 1){
                                $page = 1;
                            }

                            $total = count($level5_ids);
                            $total_page = ceil($total / $per_page);

                            $start = ($page - 1) * $per_page;

                            $level5_ids_paged = array_slice($level5_ids, $start, $per_page);
                        ?>
                        <table class="table1">
                            <thead>
                                <tr>
                                    <th class="ash">নং</th>
                                    <th class="green">নাম</th>
                                    <th class="green">জয়েনিং</th>
                                    <th class="green">মোবাইল</th>
                                    <th class="ash">কর্মী</th>
                                    <!-- <th class="green">তথ্য</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($level5_ids_paged as $id){ ?>
                            <tr>
                                <td><?= $sl++ ?></td>
                                <td><?= $member_info[$id]->name ?></td>
                                <td><?= date('d-m-Y', $member_info[$id]->joining_time) ?></td>
                                <td><?= $member_info[$id]->phone ?></td>
                                <td>
                                    <?php
                                        $refer = QB::table('member')->where('refer_id', $member_info[$id]->id)->get();
                                        echo count($refer);
                                    ?>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="pagination">
                            <?php for($i=1; $i <= $total_page; $i++){ ?>
                                <a href="javascript:void(0)" onclick="window.location='?page=<?= $i ?>'" class="<?= ($page == $i) ? 'active' : '' ?>"><?= $i ?></a>
                            <?php } ?>
                        </div>
                        <script>
                            document.querySelectorAll('.pageBtn').forEach(function(btn){
                                btn.addEventListener('click', function(){
                                    var page = this.getAttribute('data-page');
                                    window.location = '?page=' + page;
                                });
                            });
                        </script>



                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>