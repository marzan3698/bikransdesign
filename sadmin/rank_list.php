<?php
require_once('header.php');
?>

<body class="page-header-fixed ">
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.php"> <img class="logo-default" alt="logo" src="<?php echo LOGO ?>"> </a>
            </div>
            <div class="library-menu"> <span class="one">-</span> <span class="two">-</span> <span class="three">-</span> </div>
            <div class="top-nev-mobile-togal"><i class="glyphicon glyphicon-cog"></i></div>
            <!-- END LOGO -->
            <?php require_once('top_menu.php'); ?>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <div class="clearfix"> </div>
    <div class="page-container">
        <!-- Start page sidebar wrapper -->
        <?php require_once('sidebar.php'); ?>
        <!-- End page sidebar wrapper -->
        <!-- Start page content wrapper -->

        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row wrapper border-bottom page-heading">
                    <div class="col-lg-12">
                        <h2>User Rank List</h2>

                    </div>
                </div>
              <div class="wrapper-content ">
              <div class="row">
    <div class="col-md-12">
        <?php
        $query = $queryBuilder->table('member')
            ->where('rank_se', 1) 
            ->orWhere('rank_mm', 1) 
            ->orWhere('rank_am', 1) 
            ->orWhere('rank_rm', 1) 
            ->orWhere('rank_agm', 1) 
            ->orWhere('rank_dgm', 1) 
            ->orWhere('rank_gm', 1) 
            ->orderBy('id', 'desc')
            ->get();
        $sl = 1;
        ?>
        <div class="table-responsive">
            <table class="table table-bordered" style="table-layout: fixed; width: 100%;">
                <tr>
                    <td style="background: #222;color:#fff;text-align:center;">SL</td>
                    <td style="background: #222;color:#fff;text-align:center;">Username</td>
                    <td style="background: #222;color:#fff;text-align:center;">Phone</td>
                    <td style="background: #222;color:#fff;text-align:center;">Refer ID</td>
                    <td style="background: #222;color:#fff;text-align:center;">Placement</td>
                    <td style="background: #222;color:#fff;text-align:center;">Rank</td>
                </tr>

                <?php
                // Display results
                foreach ($query as $row) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $sl++; ?></td>
                        <td>
                            <strong>Username :</strong> <?php echo htmlspecialchars($row->username); ?><br />
                            <strong>Fullname :</strong> <?php echo htmlspecialchars($row->name); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($row->phone); ?><br />
                            <?php echo htmlspecialchars($row->email); ?>
                        </td>
                        <td>
                            <?php
                            $refer = $queryBuilder->table('member')->where('id', $row->refer_id)->first();
                            echo $refer ? htmlspecialchars($refer->username) : 'No Refer ID';
                            ?>
                        </td>
                        <td>
                            <?php
                            $placement = $queryBuilder->table('member')->where('id', $row->position_id)->first();
                            echo $placement ? htmlspecialchars($placement->username) : 'No Placement';
                            ?>
                        </td>
                        <td>
                            <?php
                            // Determine rank
                            $rankMap = [
                                'rank_gm' => 'GM',
                                'rank_dgm' => 'DGM',
                                'rank_agm' => 'AGM',
                                'rank_rm' => 'Regional Manager',
                                'rank_am' => 'Area Manager',
                                'rank_mm' => 'Marketing Manager',
                                'rank_se' => 'Sales Executive',
                            ];

                            $rankFound = 'No Rank';
                            foreach ($rankMap as $key => $value) {
                                if (isset($row->$key) && $row->$key === 1) {
                                    $rankFound = $value;
                                    break;
                                }
                            }
                            echo $rankFound;
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

</div>



                <?php require_once('footer.php'); ?>