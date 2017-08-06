<?php
$data = $_REQUEST;
date_default_timezone_set("PRC");

$mysql_conf = array(
    'host'    => '127.0.0.1:3306', 
    'db'      => 'kfw', 
    'db_user' => 'root', 
    'db_pwd'  => '123', 
);
$sql = getSql($data);
if($sql == '')
{
    $list = array(); 
}
else
{
     $list = queryData($mysql_conf, $sql);
}
//echo $sql;

function getSql($data)
{
    if(empty($data['createTime']) && empty($data['workOrdersType']) && empty($data['assignId']) && empty($data['isCron']) && empty($data['createStartTime']) && empty($data['createEndTime']))
    {
        $sql = '';
    }
    else{
        $sql = "select * from work_orders_assign_log where 1=1 ";
    }
    if(false == empty($data['createStartTime']))
    {
        $sql .= " and createtime >= :createStartTime";
    }
    if(false == empty($data['createEndTime']))
    {
        $sql .= " and createtime <= :createEndTime";
    }
    if(false == empty($data['workOrdersType']))
    {
        $sql .= " and workorderstype= :workOrdersType";
    }
    if(false == empty($data['assignId']))
    {
        $sql .= " and assignid= :assignId";
    }
    if(false == empty($data['isCron']))
    {
        $sql .= " and iscron= :isCron";
    }
    if(false == empty($data['assignData']))
    {
        $sql .= " and assigndata= :assignData";
    }
    $bind = array();
    $bind[':createStartTime'] = strtotime($data['createStartTime']); 
    $bind[':createEndTime'] = strtotime($data['createEndTime']); 
    $bind[':workOrdersType'] = $data['workOrdersType'];
    $bind[':assignId'] = $data['assignId'];
    $bind[':isCron'] = $data['isCron'];
    $sql = process($sql, $bind);
    var_dump($sql);

    return $sql; 
}

function process($sql, $bind)
{
    $keys = array();
    $vals = array();
    foreach($bind as $key=>$val)
    {
        $keys[] = $key;
        $vals[] = $val;
    }
    $str = str_replace($keys, $vals,$sql);  
    return $str;
}

function queryData($mysql_conf, $sql)
{
    $mysqli = new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
    if ($mysqli->connect_errno) 
    {
        die("could not connect to the database:\n" . $mysqli->connect_error);//诊断连接错误
    }
    $mysqli->query("set names 'utf8';");//编码转化
    $select_db = $mysqli->select_db($mysql_conf['db']);
    if (!$select_db) 
    {
        die("could not connect to the db:\n" .  $mysqli->error);
    }
    $res = $mysqli->query($sql);
    $list = array();
    if (!$res) 
    {
        die("sql error:\n" . $mysqli->error);
    }
    else
    {
        while ($row = mysqli_fetch_assoc($res))
        {
            $list[] = $row;
        }
    }
    $res->free();
    $mysqli->close();

    return $list;;
}
?>
