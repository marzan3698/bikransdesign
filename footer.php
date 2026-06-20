<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script> -->
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<?php
$current_page = basename($_SERVER['PHP_SELF']);

if($current_page != 'account-settings.php' 
&& $current_page != 'order-summary2.php' 
&& $current_page != 'order-summary3.php' 
&& $current_page != 'prosno.php' 
&& $current_page != 'ayerpoth.php' 
&& $current_page != 'routine.php' 
&& $current_page != 'agent_nibondhon.php' 
&& $current_page != 'agent-balens-abedon.php' 
&& $current_page != 'agent_order-summary2.php'
&& $current_page != 'order-summary4.php'
&& $current_page != 'agent_register.php'
&& $current_page != 'register.php'
&& $current_page != 'agent-product-stock-report.php'
&& $current_page != 'agent-product-stock.php'
&& $current_page != 'agent-balance-report.php'
&& $current_page != 'agent-product-order-report.php'
&& $current_page != 'new-member-list-agent-created.php'
&& $current_page != 'sodosso-product-delivery-report.php'
&& $current_page != 'agent-product-repurchase-report.php'
&& $current_page != 'agent-bikroy-commission.php'
&& $current_page != 'agent-sales-report.php'
&& $current_page != 'buy_product.php'
&& $current_page != 'refer-commission.php'
&& $current_page != 'team-commission.php'
) {
?>
<script type="text/javascript" src="js/framework7.js"></script>
<?php
}
?>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script type="text/javascript" src="js/jquery.fitvids.js"></script>
<script type="text/javascript" src="js/email.js"></script>
<script type="text/javascript" src="js/audio.min.js"></script>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/selectFx.js"></script>
<script type="text/javascript" src="js/my-app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Add the Datalabels plugin -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

<script>
  const ctx = document.getElementById('myChart');

  // Plugin to add center text
  const centerTextPlugin = {
    id: 'centerText',
    afterDraw: (chart) => {
      const ctx = chart.ctx;
      const width = chart.width;
      const height = chart.height;

      ctx.restore();
      const fontSize = (height / 190).toFixed(2);
      ctx.font = `bold ${fontSize}em sans-serif`;
      ctx.textBaseline = 'middle';
      ctx.fillStyle = '#ffff';

      const text = '50765435';
      const textX = Math.round((width - ctx.measureText(text).width) / 2);
      const textY = height / 2;

      ctx.fillText(text, textX, textY);
      ctx.save();
    }
  };

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['30%', '15%', '20%', '9%', '16%', '16%'],
      datasets: [{
        label: 'Dataset',
        data: [30, 15, 9, 27, 20, 16],
        backgroundColor: [
          '#198A84', // Dark teal
          '#afe3ac', // Light mint
          '#F0D054', // Yellow/gold
          '#11B9E5', // Light cyan
          '#36C8BB', // Blue
          '#84d279' // Blue
        ],
        borderWidth: 2,
        borderColor: '#fff',
        hoverOffset: 4
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      cutout: '60%',
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          enabled: true
        },
        datalabels: {
          color: '#fff',
          font: {
            weight: 'bold',
            size: 10
          },
          formatter: (value, context) => {
            return value + '%';
          }
        }
      }
    },
    plugins: [centerTextPlugin, ChartDataLabels]
  });
</script>
</body>

</html>