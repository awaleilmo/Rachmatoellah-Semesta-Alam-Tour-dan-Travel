<?php
$query = $conn->prepare("select * from nilai");
$query->execute();
$tampil=$query->fetch();
?>
<br>
<div style="width:97%; margin-top:2%; margin-left: 20px; position:relative; background-color:#0a2c54">
  <span class="kotak">
    <b>RSA</b>
    <i>TOUR</i>
  </span>
  <div class="text-rotator">
    <label style="margin:0">Welcome Home, Rachmatoellah Semesta Alam Tour & Travel</label>
  </div>
</div>
<br>

<div id="grafik2" style="width:97%; height: 400px; margin-left:1%; margin-right:1%"></div>

<script type="text/javascript">

Highcharts.chart('grafik2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Kuisioner'
    },
    xAxis: {
        categories: [
            ""
        ]
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'Target'
        }
    }, {
        title: {
         
        },
        opposite: true
    }],
    legend: {
        shadow: false
    },
     plotOptions: {
         column: {
            depth: 25
        },
        series: {
            borderWidth: 1,
            dataLabels: {
                enabled: true,
                format: '{point.y:,.0f} Orang',
                fontSize: '100px',
                rotation: 0
            }
        }
    },
    series: [{
        name: 'Sangat Setuju',
        data: [<?php echo $tampil['sangatsetuju']; ?>]
    }, {
        name: 'Setuju',
        data: [<?php echo $tampil['setuju']; ?>]
    },{
        name: 'Ragu - Ragu',
        data: [<?php echo $tampil['ragu']; ?>]
    },{
        name: 'Tidak Setuju',
        data: [<?php echo $tampil['tidaksetuju']; ?>]
    },{
        name: 'Sangat Tidak Setuju',
        data: [<?php echo $tampil['sangattidaksetuju']; ?>]
    }]
});
		</script>
	
