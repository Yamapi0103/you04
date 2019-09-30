<?php
require __DIR__. '/_connect_db.php';
$pname = 'ic_edit';


if (!isset($_GET['IC_sid'])) {
    header('Location: icmember.php');
    exit;
}
$IC_sid =  intval($_GET['IC_sid']);

if (!empty($_POST['name']) and !empty($_POST['email'])) {
    try {
        $sql = "UPDATE `icmember` SET 
`IC_sid`=?,
`IC_email`=?,
`IC_name`=?,
`IC_gender`=?,
`IC_media`=?
`IC_price`=?
`IC_case`=?
WHERE `IC_sid`=?";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['IC_sid'],
            $_POST['IC_email'],
            $_POST['IC_name'],
            $_POST['IC_gender'],
            $_POST['IC_media'],
            $_POST['IC_price'],
            $_POST['IC_case'],
            $IC_sid
        ]);

        $result = $stmt->rowCount();
        if ($result==1) {
            $info = [
                'type' => 'success',
                'text' => '資料修改成功'
            ];
        } elseif ($result==0) {
            $info = [
                'type' => 'danger',
                'text' => '資料修改失敗'
            ];
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        //echo '---'. $ex->getCode(). '---';
//        $info = [
//            'type' => 'danger',
//            'text' => 'email 請勿重複'
//        ];
    }
}

$r_sql = "SELECT * FROM icmember WHERE IC_sid=$IC_sid";
$r_row = $pdo->query($r_sql)->fetch(PDO::FETCH_ASSOC);

if (empty($r_row)) {
    // 如果沒有該筆資料,就到列表頁
    header('Location: icmember.php');
    exit;
}

?>
<?php include __DIR__. '/head.php' ?>
<?php include __DIR__. '/_nav.php'; ?>



<style>
.col-md-6{
  font-family:"微軟正黑體";
  margin-left:10%;
}

#IC_name_title{
    font-size:25px;
    font-weight:600;
    margin-bottom:20px;
}

.btn{
    /* position:relative;
    left:-50%; */
    margin-top:30px;
    margin-left:10px;
    padding:7px 11px;
    background:#567480;
    border-radius:3px;
    border: 2px solid #567480;
    color:#fff;
    font-family:"微軟正黑體";
    width:70px;
}

.btn a{
    text-decoration:none;
    color:#fff;
}

.card_body{
    margin: 80px 5% 5% 14%;
    font-size:16px;
}

.form-group{
    margin: 1.5% 1% 1% 0.5%;
}

label{
    margin: 4% 5px 5% 1%;
    
}

input{
    background:rgba(0,0,0,0);
    border-radius:2px;
    border: 1.2px solid rgba(0,0,0,0);
    padding:2px 5px;
    color:#fff;
    font-size:16px;
    font-family:"微軟正黑體";
}



</style>





<div class="container" >
    <?php if (isset($info)): ?>
    <div class="col-md-6">
        <div class="alert alert-<?= $info['type'] ?>" role="alert">
            <?= $info['text'] ?>
        </div>
    </div>

    <?php endif; ?>


    <div class="col-md-6 ">
            <div class="card_body">
            <div class="card_flex">

                <div class="card_title">
                    <input type="email" class="form-control" readonly
                    id="IC_name_title" name="IC_name" value="<?= htmlentities($r_row['IC_name']) ?>">
                </div>


                </div>
                <form method="post" >
                    <div class="form-group">
                        <label for="IC_email">帳號：</label>
                        <input type="text" class="form-control" readonly
                               id="IC_email" name="IC_email" value="<?= htmlentities($r_row['IC_email']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="IC_name">名稱：</label>
                        <input type="email" class="form-control" readonly
                               id="IC_name" name="IC_name" value="<?= htmlentities($r_row['IC_name']) ?>"     >
                    </div>
                    <div class="form-group">
                        <label for="IC_gender">性別：</label>
                        <input type="text" class="form-control" readonly
                               id="IC_gender" name="IC_gender" value="<?= htmlentities($r_row['IC_gender']) ?>"    >
                    </div>
                    <div class="form-group">
                        <label for="IC_media">擅長社群：</label>
                        <input type="text" class="form-control" readonly
                               id="IC_media" name="IC_media" value="<?= htmlentities($r_row['IC_media']) ?>"     >
                    </div>
                    <div class="form-group">
                        <label for="IC_price">最低階案金額：</label>
                        <input type="text" class="form-control" readonly
                               id="IC_price" name="IC_price" value="<?= htmlentities($r_row['IC_price']) ?>"      >
                    </div>

                    <div class="form-group">
                        <label for="IC_case">經手業配數：</label>
                        <input type="text" class="form-control" readonly
                               id="IC_case" name="IC_case" value="<?= htmlentities($r_row['IC_case']) ?>"       >
                    </div>
                    <div>
                                     
                </form>
                <div>
                
                    <button type="submit" class="btn btn-primary"><a href="icmember.php">回上層
                    
                    </a></button>
                </div>
                    </div> 
            </div>
    </div>
</div>
    <script>
        var name = $('#IC_name'),
            email = $('#IC_email'),
            i;

        function formCheck(){
            // var birthday_pattern = /\d{4}\-\d{1,2}\-\d{1,2}/;
            var isPass = true;

            if(! name.val()){
                alert('請填寫姓名');
                isPass = false;
            }
            if(! email.val()){
                alert('請填寫電子郵箱');
                isPass = false;
            }
            return isPass;
        }

    </script>
