<?php
$count_user = $queryBuilder->table('member')->count();
?>
<style>
    .d-none{
        display: none;
    }
</style>

<div class="col-lg-12 top15">
    <?php
    if (isset($_POST['submit'])) {
        $data = array(
           'amount' => $_POST['amount'],
           'description' => $_POST['amount'],
           'time' => time(),
       );
       $insertId = $queryBuilder->table('balance_minus')->insert($data);

       if ($insertId) {
           echo '<p class="alert alert-success">Balance Minus Successfully.</p>';
       }
    }
    ?>
    <div class="widgets-container d-none">
    <h5>Balance Minus</h5>
    <hr>   
    <form action="" method="post">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <p>Enter Amount</p>
                        <input type="number" class="form-control" name="amount" placeholder="Enter Amount" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Enter Description</p>
                        <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" class="btn btn-danger" /> 
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

    <!-- begin col-3 -->
    <div class="col-lg-3">
        <div style="border-radius: 5px;" class="widget red-bg box-shadow">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span>Total User</span>

                    <h2 class="font-bold"><?php echo $count_user; ?></h2>
                </div>
            </div>
        </div>
    </div>
    
        <div class="col-lg-3">
        <div class="widget green-bg box-shadow">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <i class="fa fa-user-secret fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span>Total Stokist</span>

                    <h2 class="font-bold"><?php $stk = $queryBuilder->table('agent')->count('*');
            echo $stk;
             ?></h2>
                </div>
            </div>
        </div>
    </div>
    
        <div class="col-lg-3">
        <div class="widget blue-bg box-shadow">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <i class="fa fa-male fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span>Total Dealer</span>

                    <h2 class="font-bold"><?php $dealer = $queryBuilder->table('dealer')->count('*');
            echo $dealer;
             ?></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- begin col-3 -->
    

    

    <!-- begin col-3 -->
    
    <!-- begin col-3 -->
    
    <div class="col-lg-3">
        <div class="widget white-bg box-shadow">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-handshake fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <a href="balance-minus-report.php" class="btn btn-primary btn-xs" style="display: inline !important;">
                       Report
                    </a>&nbsp;
                    <a href="javascript:void(0)" class="btn btn-danger btn-xs minusBtn" style="display: inline !important;">
                        <i class="fa fa-minus"></i> Minus
                    </a>
                    <br>
                    <span>ORDERS Commission</span>
                    
                    <h2 class="font-bold">
                    <?php
                        // Fetch the total commission from the orders
                        $commission = $queryBuilder->table('order')
                            ->leftJoin('product', 'product.id', '=', 'order.product_id')
                            ->select($queryBuilder->raw('SUM(order.qty * product.com) AS total_sum'))
                            ->first();

                        // If the result is null, set total_sum to 0
                        $totalCommission = $commission->total_sum ?? 0;

                        // Fetch the total amount from the balance_minus table using select() for aggregate function
                        $minusBalanceResult = $queryBuilder->table('balance_minus')
                            ->select($queryBuilder->raw('SUM(amount) AS total_minus'))
                            ->first();

                        // If the result is null, set total_minus to 0
                        $minusBalance = $minusBalanceResult->total_minus ?? 0;

                        // Calculate the final balance
                        $finalBalance = $totalCommission - $minusBalance;

                        // Display the final balance
                        echo $finalBalance;
                        ?>


                    </h2>
                </div>
            </div>
        </div>
    </div>
    

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    // Listen for click event on the correct class
    $(".minusBtn").on('click', function(){
        $('.widgets-container').removeClass('d-none'); // Remove d-none class to show the container
    });
</script>
