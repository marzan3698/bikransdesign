<div class="page-sidebar-wrapper">
            <div class="page-sidebar">
                <ul class="page-sidebar-menu  page-header-fixed ">
               
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"> <i class="fa fa-user"></i> <span class="title"><?php echo $_SESSION['admin']; ?></span> </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="account.php"> <i class="fa fa-dashboard"></i> <span class="title">Account</span> </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"> <i class="fa fa-dashboard"></i> <span class="title">Dashboard</span> </a>
                    </li>
                    
                    <!--
<li class="nav-item">
                        <a class="nav-link" href="matching_set.php"> <i class="fa fa-dashboard"></i> <span class="title">Matching Income</span> </a>
                    </li>
-->
                    
                    <li class="nav-item">
                        <a class="nav-link" href="payment_method.php"> <i class="fa fa-dashboard"></i> <span class="title">Payment Method</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="invoice_list.php"> <i class="fa fa-dashboard"></i> <span class="title">Invoice</span> </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="purchase_package.php?status=0"> <i class="fa fa-dashboard"></i> <span class="title">Purchase package</span> </a>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="deposit_list.php"> <i class="fa fa-dashboard"></i> <span class="title">Deposit List</span> </a>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="deposit_list_income.php"> <i class="fa fa-dashboard"></i> <span class="title">Deposit Income</span> </a>
                    </li>
                    
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="nagad_add_fund.php"> <i class="fa fa-dashboard"></i> <span class="title">Add Fund</span> </a>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-users"></i> <span class="title">Package ROI</span> <span class="arrow"></span> </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="confirmGo(event)">
    <span class="title">Profit-TBBP</span>
</a>

<script>
function confirmGo(e){
    e.preventDefault(); // stop default link

    if (confirm("Are you sure you want to run Profit-TBBP?")) {
        window.location.href = "cron1.php"; // confirm ??? redirect
    } else {
        // cancel ???? ????? ???? ??
    }
}
</script>

                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="confirmGo2(event)">
    <span class="title">Profit-ARRP</span>
</a>

<script>
function confirmGo2(e){
    e.preventDefault(); // stop default link

    if (confirm("Are you sure you want to run Profit-ARRP?")) {
        window.location.href = "cron2.php"; // confirm ??? redirect
    } else {
        // cancel ???? ????? ???? ??
    }
}
</script>

                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="confirmGo3(event)">
    <span class="title">Profit-DBS</span>
</a>

<script>
function confirmGo3(e){
    e.preventDefault(); // stop default link

    if (confirm("Are you sure you want to run Profit-DBS?")) {
        window.location.href = "cron3.php"; // confirm ??? redirect
    } else {
        // cancel ???? ????? ???? ??
    }
}
</script>

                            </li>
                            
                            
                            
                         
                            
                            
                        </ul>
                    </li>
                    
                    
                    
                     <li class="nav-item">
                                <a class="nav-link" href="#" onclick="confirmGo4(event)">
    <span class="title">EHV-Points</span>
</a>

<script>
function confirmGo4(e){
    e.preventDefault(); // stop default link

    if (confirm("Are you sure you want to run EHV-Points?")) {
        window.location.href = "cron4.php"; // confirm ??? redirect
    } else {
        // cancel ???? ????? ???? ??
    }
}
</script>

                            </li>
                    
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="notice.php"> <i class="fa fa-dashboard"></i> <span class="title">Notice</span> </a>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="rank_corn_job.php"> <i class="fa fa-dashboard"></i> <span class="title">Rank Create</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rank_list.php"> <i class="fa fa-dashboard"></i> <span class="title">Rank List</span> </a>
                    </li>
                    
                        <li class="nav-item">
                        <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-users"></i> <span class="title">User</span> <span class="arrow"></span> </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="user.php"> <span class="title">User List</span> </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="rank_se.php"> <span class="title">Uddokta Founder</span> </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="premium_se.php"> <span class="title">Premium Member</span> </a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="rank_mm.php"> <span class="title">Uddokta Shonirvor</span> </a>
                            </li>
                            
                             <li class="nav-item">
                                <a class="nav-link" href="add_balance_user.php"> <span class="title">Add Balance User</span> </a>
                            </li>
                            
                             <li class="nav-item">
                                <a class="nav-link" href="add_balance_user.php"> <span class="title">Report</span> </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="number_withdraw_report.php"> <span class="title">Number Withdraw Report</span> </a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    
                          <li class="nav-item">
                            <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-users"></i> <span class="title">Stockist</span> <span class="arrow"></span> </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="agent_add.php"> <span class="title">Stockist Add</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="agent_list.php"> <span class="title">Stockist List</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="add_balance_agent.php"> <span class="title">Add Balance Stockist</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="agent_balance_report.php"> <span class="title">Report</span> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-users"></i> <span class="title">Delar</span> <span class="arrow"></span> </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="delar_add.php"> <span class="title">Dealer Add</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="dealer_list.php"> <span class="title">Dealer List</span> </a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="add_balance_dealer.php"> <span class="title">Add Balance Dealer</span> </a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="dealer_balance_report.php"> <span class="title">Report</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="dealer_product_request.php?pending"> <span class="title">Product Request</span> </a>
                                </li>
                            </ul>
                        </li>
                    
                    
                    
                   <!--
 <li class="heading">
                        <h3 class="uppercase">Product</h3>
                    </li>
-->
                    <li class="nav-item">
                        <a class="nav-link nav-toggle" href="javascript:;"> <i class="fa fa-diamond"></i> <span class="title">Product</span> <span class="arrow"></span> </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="product.php"> <span class="title">Add New Product</span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product_list.php"> <span class="title">Product List</span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php"> <span class="title">Product Catagoris</span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category_list.php"> <span class="title">Catagoris List</span> </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="genaration.php"> <i class="fa fa-dashboard"></i> <span class="title">Genaration</span> </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="withdraw_list_agent.php"> <i class="fa fa-dashboard"></i> <span class="title">Agent Withdraw Request</span> </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="withdraw_list.php"> <i class="fa fa-dashboard"></i> <span class="title">Withdraw Request</span> </a>
                    </li>
                    
                      <li class="nav-item">
                        <a class="nav-link" href="logout.php"> <i class="fa fa-dashboard"></i> <span class="title">Logout</span> </a>
                    </li>
                    
                    
                    
               
                   
                </ul>
            </div>
        </div>