<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
  font-family:'Arial';
}
</style>

<script>
var chart = AmCharts.makeChart( "chartdiv", {
  "hideCredits": true,  
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "autoMargins": false,
  "marginLeft": 35,
  "marginRight": 8,
  "marginTop": 10,
  "marginBottom": 26,

  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 8,
    "color": "#ffffff"
  },
 "allLabels": [{
    "text": "Tickets for "+<?php echo '2019'; ?>,
    "align": "center",
    "bold": true,
    "size": 20,
    "y": 10
  }],

  "dataProvider": [ {
    "month": "Jan",
    "Sale": <?php echo "1"; ?>,
  }, {
    "month": "Feb",
    "Sale": <?php echo "3"; ?>,
  }, {
    "month": "Mar",
    "Sale": <?php echo "2"; ?>,
  }, {
    "month": "Apr",
    "Sale": <?php echo "1"; ?>,
  }, {
    "month": "May",
    "Sale": <?php echo "5"; ?>,
  }, {
    "month": "June",
    "Sale": <?php echo "3"; ?>,
  }, {
    "month": "Jul",
    "Sale": <?php echo "2"; ?>,
  }, {
    "month": "Aug",
    "Sale": <?php echo "5"; ?>,
  }, {
    "month": "Septr",
    "Sale": <?php echo "2"; ?>,
  }, {
    "month": "Oct",
    "Sale": <?php echo "4"; ?>,
  }, {
    "month": "Nov",
    "Sale": <?php echo "1"; ?>,
  
  }, {
    "month": "Dec",
    "Sale": <?php echo "2"; ?>,
  } ],
  "valueAxes": [ {
    "axisAlpha": 0,
    "position": "left"
  } ],
  "startDuration": 1,
  "graphs": [ {
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "fillAlphas": 2,
    "title": "Sales",
    "type": "column",
    "labelText":"[[value]]",
    "valueField": "Sale",
    "dashLengthField": "dashLengthColumn"
  } ],
  
  "categoryField": "month",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }
} );

</script>