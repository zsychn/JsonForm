<?php include_once "./_header.php";?>
<div style="position:absolute; margin-top:20px; width:200px; left:50%; margin-left:-100px;">
<form class="form-horizontal" method='POST' target="medium" action="_medium.php" >
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">createStartTime</label>
        <div class="input-group date col-sm-6" id='createStartTime' style="padding-left:15px; padding-right:15px;">
            <input type="text" class="form-control" name="createStartTime">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-calendar"></i>
             </span>
        </div>  
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">createEndTime</label>
    <div class="input-group date col-sm-6" id='createEndTime' style="padding-left:15px; padding-right:15px;">
        <input type="text" class="form-control" name="createEndTime">
        <span class="input-group-addon">
            <i class="glyphicon glyphicon-calendar"></i>
        </span>
    </div>  
  </div>
  <div class="form-group">
    <label for="workOrdersType" class="col-sm-2 control-label">workOrdersType</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="workOrdersType" id="workOrdersType" placeholder="workOrdersType">
    </div>
  </div>
  <div class="form-group">
    <label for="assignId" class="col-sm-2 control-label">assignId</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="assignId" id="assignId" placeholder="assignId">
    </div>
  </div>
  <div class="form-group">
    <label for="isCron" class="col-sm-2 control-label">isCron</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="isCron" id="isCron" placeholder="isCron">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button stype="submit" class="btn btn-primary" id="">serach</button>
    </div>
  </div>
</form>
</div>

<script>
$(function () {  
    $('#createStartTime').datetimepicker({  
        format: 'YYYY-MM-DD',  
    });  
    $('#createEndTime').datetimepicker({  
        format: 'YYYY-MM-DD',  
    });  
});  
</script>
<?php include_once "./_footer.php";?>
