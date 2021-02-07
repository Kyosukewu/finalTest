<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB
{
    private $table;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=dbt2;', 'root', '');
    }
    function all(...$arg)
    {
        $sql = "select * from $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = sprintf("`%s`='%s'", $key, $value);
                }
                $sql .= " where " . implode(' && ', $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll();
    }

    function count(...$arg)
    {
        $sql = "select count(*) from $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = sprintf("`%s`='%s'", $key, $value);
                }
                $sql .= " where " . implode(' && ', $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($arg)
    {
        $sql = "select * from $this->table ";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql .= " where " . implode(' && ', $tmp);
        } else {
            $sql .= " where `id`='$arg'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($arg)
    {
        $sql = "delete from $this->table ";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql .= " where " . implode(' && ', $tmp);
        } else {
            $sql .= " where `id`=$arg";
        }
        return $this->pdo->exec($sql);
    }

    function save($arg)
    {
        if (!empty($arg['id'])) {
            foreach ($arg as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql = "update $this->table set " . implode(" , ", $tmp) . " where `id`='{$arg['id']}'";
        } else {
            $sql = "insert into $this->table (`" . implode("`,`", array_keys($arg)) . "`) values ('" . implode("','", $arg) . "')";
        }
        return $this->pdo->exec($sql);
    }

    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll();
    }
}

function to($url)
{
    header("location:" . $url);
}


$Mem = new DB('mem');
$News = new DB('news');
$Total = new DB('total');
$Que = new DB('que');
$Good = new DB('good');


$tstr = [
    1 => '健康新知',
    2 => '菸害防治',
    3 => '癌症防治',
    4 => '慢性病防治'
];


$chk = $Total->find(['date' => date("Y-m-d")]);
if (empty($chk)) {
    $Total->save(['date' => date('Y-m-d'), 'total' => 1]);
    $chk = $Total->find(['date' => date("Y-m-d")]);
}
if (empty($_SESSION['total'])) {
    $chk['total']++;
    $Total->save($chk);
    $_SESSION['total'] = $chk['total'];
}


// if (empty($_SESSION['total'])) {
//     if ($Total->count(['date' => date("Y-m-d")]) > 0) {
//         $total = $Total->find(['date' => date("Y-m-d")]);
//         $total['total']++;
//         $Total->save($total);
//         $_SESSION['total'] = $total['total'];
//     } else {
//         $total = ['date' => date("Y-m-d"), 'total' => 1];
//         $Total->save($total);
//     }
//     $_SESSION['total'] = $total['total'];
// }

// $data=['date'=>date('Y-m-d'),"total"=>1];

// // $Total->save($data);

// $tt=$Total->find(['id'=>1]);
// print_r($tt);

// $tt['total']=6;

// // $Total->save($tt);

// $Total->del($tt);
