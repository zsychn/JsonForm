<?php 
include_once "./_header.php";
include_once "search.php";
?>
<style>
.table th, .table td { 
    text-align: center;
}
</style>
<table class="table table-bordered table-hover" style="text-align: center;">
    <tr class="info">
        <th>workOrdersId</th>
        <th>assigndata</th>
        <th>操作</th>
   </tr>
<?php
    if(false == empty($list)){
        foreach($list as $info){ ?>
            <tr>
            <td><?= $info['workordersid']?></td>
            <td >
                <input type="text" style="width:400px;" value='<?= $info['assigndata']?>'/>
            </td>
            <td>
            <a href='_right.php?json=<?= $info['assigndata']?>' target="right">查看</a>
            </td>
            </tr>
    <?php }}?>
</table>

<script>
</script>

