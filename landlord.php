<?php
include __DIR__ . "/comm.php";
error_reporting(0);


$lastLandlordSet = getLastLandlordSet();
if ($_POST) {
  if (writeLandLordSet($_POST))
  {
    echo "<script>alert('设置数据成功');location.href='landlord.php'</script>";
  } else {
    echo "操作失败";
  }
}
?>

<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" /> -->
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <title>房东设置当月费用</title>

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
    <h4>房东设置当月数据，其他人勿动</h4>
    <hr>
     <p>最后修改时间：<?php echo $lastLandlordSet['create_at']; ?></p>
    <div class="container">
      <form class="form-horizontal total-form" role="form" action="" method="POST"> 
        <div class="form-group">
          <label for="" class="col-xs-4 control-label">电费</label>
          <div class="col-xs-8 powerRateDiv">
              <input type="number" name="power_rate1" class="form-control powerRate" value="<?php echo $lastLandlordSet['power_rate1']; ?>" placeholder="输入前一个月电费费用">
          </div>
          <br>
          <br>
           <div class="col-xs-8 powerRateDiv">
              <input type="number" name="power_rate2" class="form-control powerRate" value="<?php echo $lastLandlordSet['power_rate2']; ?>" placeholder="输入后一个月电费费用">
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-xs-4 control-label">水费</label>
          <div class="col-xs-8 waterRateDiv">
              <input type="number" name="water_rate1" class="form-control waterRate" value="<?php echo $lastLandlordSet['water_rate1']; ?>" placeholder="输入前一个月水费费用">        
          </div>
          <br>
          <br>
          <div class="col-xs-8 waterRateDiv">
              <input type="number" name="water_rate2" class="form-control waterRate" value="<?php echo $lastLandlordSet['water_rate2']; ?>" placeholder="输入后一个月水费费用">        
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-xs-4 control-label">宿舍人数</label>
          <div class="col-xs-8">
            <input type="number" name="people_num" class="form-control" id="peopleNum" value="<?php echo $lastLandlordSet['people_num']; ?>" placeholder="输入宿舍总人数">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-xs-4 control-label">房间数</label>
          <div class="col-xs-8">
            <input type="number" name="room_num" class="form-control" id="roomNum" value="<?php echo $lastLandlordSet['room_num']; ?>" placeholder="输入房间数">
          </div>
        </div>

        <div class="form-group">
          <label for=""  class="col-xs-4 control-label">物业费</label>
          <div class="col-xs-8">
            <input type="number" name="property_cost" class="form-control" id="propertyCost" value="<?php echo $lastLandlordSet['property_cost']; ?>" placeholder="输入每月物业费">
          </div>
        </div>

        <div class="form-group">
          <label for=""  class="col-xs-4 control-label">网费</label>
          <div class="col-xs-8">
            <input type="number" name="net_cost"  class="form-control" id="netCost" value="<?php echo $lastLandlordSet['net_cost']; ?>" placeholder="输入网费">
          </div>
        </div>
        <div class="form-group">
          <label for=""  class="col-xs-4 control-label">煤气费</label>
          <div class="col-xs-8">
            <input type="number" name="gas_cost" class="form-control" id="gasCost" value="<?php echo $lastLandlordSet['gas_cost']; ?>" placeholder="输入煤气费">
          </div>
        </div>
        <hr>
        <div class="form-group">
          <div class=" col-xs-6 ">
            <button type="submit" id="check" class="pull-right btn btn-success">确定</button>
          </div>

          <div class=" col-xs-6">
            <a type="button" href="total.php" class="btn  btn-default">返回</a>
          </div>  
        </div>
      </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

  
  </body>
</html>
