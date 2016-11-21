<?php
include __DIR__ . "/comm.php";
$lastLandlordSet = getLastLandlordSet();
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" /> -->
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <title>501宿舍费计算</title>

    <!-- Bootstrap -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .total-form .control-label{
        line-height: 34px;
      }
    </style>
  </head>
  <body>
    <br>
    <div class="container">
      <form class="form-horizontal total-form" role="form">
        <div class="form-group">
          <label for="" class="col-xs-4 control-label">房租</label>
          <div class="col-xs-8">
            <input type="number" class="form-control" id="rent" placeholder="输入每月房租费用">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-xs-4 control-label">电费</label>
          <div class="col-xs-8 powerRateDiv">
            <div class="input-group">
              <input type="number" value="<?php echo $lastLandlordSet['power_rate1']; ?>" class="form-control powerRate"  placeholder="输入每月电费费用">
              <span class="input-group-btn">
                <button class="btn btn-default" id="addPowerRateIpt" type="button">+</button>
              </span>            
            </div>
          </div>
          <?php if($lastLandlordSet['power_rate2']):?>
             <div class="col-xs-8 powerRateDiv">
                <input type="number" name="power_rate2" class="form-control powerRate pull-right" value="<?php echo $lastLandlordSet['power_rate2']; ?>" placeholder="输入后一个月电费费用">
            </div>
          <?php endif;?>
        </div>

        <div class="form-group">
          <label for="" class="col-xs-4 control-label">水费</label>
          <div class="col-xs-8 waterRateDiv">

            <div class="input-group">
              <input type="number" value="<?php echo $lastLandlordSet['water_rate1']; ?>" class="form-control waterRate"  placeholder="输入每月水费费用">
              <span class="input-group-btn">
                <button class="btn btn-default" id="addWaterRateIpt" type="button">+</button>
              </span>            
            </div>
          </div>
           <?php if($lastLandlordSet['water_rate2']):?>
             <div class="col-xs-8 ">
                <input type="number" name="water_rate2" value="<?php echo $lastLandlordSet['water_rate2']; ?>" class="form-control waterRate pull-right" value="<?php echo $lastLandlordSet['water_rate2']; ?>" placeholder="输入后一个月水费费用">
            </div>
          <?php endif;?>
        </div>
        <div class="form-group">
          <label for="" class="col-xs-4 control-label">宿舍人数</label>
          <div class="col-xs-8">
            <input type="number" class="form-control" id="peopleNum" value="<?php echo $lastLandlordSet['people_num']; ?>" placeholder="输入宿舍总人数">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-xs-4 control-label">房间数</label>
          <div class="col-xs-8">
            <input type="number" class="form-control" id="roomNum" value="<?php echo $lastLandlordSet['room_num']; ?>" placeholder="输入房间数">
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-xs-4 control-label">物业费</label>
          <div class="col-xs-8">
            <input type="number" class="form-control" id="propertyCost" value="<?php echo $lastLandlordSet['property_cost']; ?>" placeholder="输入每月物业费">
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-xs-4 control-label">网费</label>
          <div class="col-xs-8">
            <input type="number" class="form-control" id="netCost" value="<?php echo $lastLandlordSet['net_cost']; ?>" placeholder="输入网费">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-xs-4 control-label">燃气费</label>
          <div class="col-xs-8">
            <input type="number" class="form-control" id="gasCost" value="<?php echo $lastLandlordSet['gas_cost']; ?>" placeholder="输入燃气费">
          </div>
        </div>
        <hr>
        <div class="form-group">
          <div class=" col-xs-6 ">
            <button type="button" id="total" class="pull-right btn btn-default">计算</button>
          </div>

          <div class=" col-xs-6">
            <a type="button" href="landlord.php" class="btn btn-success">房东设置</a>
          </div>  
        </div>
      </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">

      function getEveryonePropertyCost() {
        return Number($('#propertyCost').val()) / Number($('#roomNum').val());
      }

      function getTotalPowerRate() {
        var total = 0;
        $.each($('.powerRate'), function(k, v) {
          total += Number($(v).val());
        });
        return total;
      }

      function getTotalWaterRate() {
        var total = 0;
        $.each($('.waterRate'), function(k, v) {
          total += Number($(v).val());
        });
        return total;
      }

      function getEveryoneWaterRate() {
        return Number((getTotalWaterRate() / Number($('#peopleNum').val())).toFixed(2));
      }

      function getEveryonePowerRate() {
        return Number((getTotalPowerRate() / Number($('#peopleNum').val())).toFixed(2));
      }

      $('#total').click(function() {
        var total = 0;
        var rent = Number($('#rent').val());
        var totalWaterRate = getTotalWaterRate();
        var peopleNum = Number($('#peopleNum').val());
        var roomNum = Number($('#roomNum').val());
        var propertyCost = Number($('#propertyCost').val());
        var netCost = Number($('#netCost').val());
        var gasCost = Number($('#gasCost').val());
        var totalPowerRate = getTotalPowerRate();
        var everyonePropertyCost = getEveryonePropertyCost();
        var everyoneWaterRate = getEveryoneWaterRate();
        var everyonePowerRate = getEveryonePowerRate();
        total = rent + everyonePowerRate + everyoneWaterRate + everyonePropertyCost + gasCost + netCost;
        total = Number(total.toFixed(2));
        var totalStr = "租   金："+ rent +"\n电   费："+ everyonePowerRate + "\n水   费："+ everyoneWaterRate +"\n物业费："+ everyonePropertyCost + "\n网   费："+ netCost;
        totalStr = gasCost ? totalStr + "\n燃气费：" + gasCost : totalStr;
        totalStr += "\n————————————\n总   计：" + total;
        alert(totalStr);
      });

      $('#addPowerRateIpt').click(function() {
        var insertHtml = '<div class="col-xs-8 powerRateDiv pull-right"><input type="number" class="form-control powerRate"  placeholder="再增加一个月电费"></div>';

        //var insertHtml = '<div class="input-group"><input type="number" class="form-control powerRate" placeholder="再增加一个月电费"><span class="input-group-btn"><button class="btn btn-default" type="button">✅</button></span></div>';
        $(this).parents('.form-group').append(insertHtml);
      });

      $('#addWaterRateIpt').click(function() {
       var insertHtml = '<div class="col-xs-8 waterRateDiv pull-right"><input type="number" class="form-control waterRate"  placeholder="再增加一个月水费"></div>';

        $(this).parents('.form-group').append(insertHtml);
      });
    </script>
  </body>
</html>
