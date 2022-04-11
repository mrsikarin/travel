<?php
include 'config.php';
if (empty($_GET['id'])) {
    header("Location:index.php");
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `listtravel` WHERE `t_id` = '$id'";
    $myquery = mysqli_query($conn, $sql);
    $list = mysqli_fetch_array($myquery);
    if (isset($_GET['edit'])) {
        if (empty($_POST['tname']) || empty($_POST['detail']) || empty($_POST['turl']) || empty($_POST['type']) || empty($_POST['province'])) {
            echo "ใส่ข้อมูลให้ครบ";
        } else {
            $tname = $_POST['tname'];
            $detail = $_POST['detail'];
            $turl = $_POST['turl'];
            $type = $_POST['type'];
            $province = $_POST['province'];
            $sql = "SELECT `id_type` FROM `type` WHERE `type_name` = '$type'";
            $mysql1 = mysqli_query($conn, $sql);
            $idtype = mysqli_fetch_array($mysql1);
            $sql = "UPDATE `listtravel` SET `t_name`='$tname',`t_detail`='$detail',`t_url`='$turl',`id_type`='$idtype[0]',`province`='$province' WHERE `t_id`='$id'";
            $mysql1 = mysqli_query($conn, $sql);
            if ($mysql1) {
                echo "แก้ไขเสร็จ";
                header("Location:edit.php");
            }
        }
    }
}

?>
<?php
$sqltype = "SELECT * FROM `type` WHERE 1";
$mysql = mysqli_query($conn, $sqltype);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไข</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(to right, rgba(233, 222, 250, 0.5), rgba(251, 252, 219, 0.5))
        }
    </style>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col align-self-start rounded-3">
            </div>
            <div class="col shadow p-3 mb-5 bg-body  align-self-center p-3 mb-2  bg-light text-dark rounded-3 ">
    <form action="?id=<?php echo $id ?>&edit=1" method="Post" id="add">
        <input class="shadow p-3 mb-3 bg-body rounded border-0" placeholder="ชื่อแหล่งท่องเที่ยว" type="text" name="tname" value="<?php echo $list[1]; ?>">
        <textarea class="shadow p-3 mb-3 bg-body rounded border-0" placeholder="ข้อมูลแหล่งท่องเที่ยว" form="add" name="detail" rows="15" cols="50"><?php echo $list[2]; ?></textarea>
        <input class="shadow p-3 mb-3 bg-body rounded border-0" placeholder="ลิ้งรูปแหล่งท่องเที่ยว" type="text" name="turl" value="<?php echo $list[3]; ?>">

        <select class="shadow p-3 mb-3 bg-body rounded border-0" name="type">
            <option value="">เลือกประเพศ</option>
            <?php while ($listype = mysqli_fetch_array($mysql)) { ?>
                <option value="<?php echo $listype[1]; ?>"><?php echo $listype[1]; ?></option>
            <?php } ?>
        </select>
        <select class="shadow p-3 mb-3 bg-body rounded border-0" name="province">
            <option value="" selected>--------- เลือกจังหวัด ---------</option>
            <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
            <option value="กระบี่">กระบี่ </option>
            <option value="กาญจนบุรี">กาญจนบุรี </option>
            <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
            <option value="กำแพงเพชร">กำแพงเพชร </option>
            <option value="ขอนแก่น">ขอนแก่น</option>
            <option value="จันทบุรี">จันทบุรี</option>
            <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
            <option value="ชัยนาท">ชัยนาท </option>
            <option value="ชัยภูมิ">ชัยภูมิ </option>
            <option value="ชุมพร">ชุมพร </option>
            <option value="ชลบุรี">ชลบุรี </option>
            <option value="เชียงใหม่">เชียงใหม่ </option>
            <option value="เชียงราย">เชียงราย </option>
            <option value="ตรัง">ตรัง </option>
            <option value="ตราด">ตราด </option>
            <option value="ตาก">ตาก </option>
            <option value="นครนายก">นครนายก </option>
            <option value="นครปฐม">นครปฐม </option>
            <option value="นครพนม">นครพนม </option>
            <option value="นครราชสีมา">นครราชสีมา </option>
            <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
            <option value="นครสวรรค์">นครสวรรค์ </option>
            <option value="นราธิวาส">นราธิวาส </option>
            <option value="น่าน">น่าน </option>
            <option value="นนทบุรี">นนทบุรี </option>
            <option value="บึงกาฬ">บึงกาฬ</option>
            <option value="บุรีรัมย์">บุรีรัมย์</option>
            <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
            <option value="ปทุมธานี">ปทุมธานี </option>
            <option value="ปราจีนบุรี">ปราจีนบุรี </option>
            <option value="ปัตตานี">ปัตตานี </option>
            <option value="พะเยา">พะเยา </option>
            <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
            <option value="พังงา">พังงา </option>
            <option value="พิจิตร">พิจิตร </option>
            <option value="พิษณุโลก">พิษณุโลก </option>
            <option value="เพชรบุรี">เพชรบุรี </option>
            <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
            <option value="แพร่">แพร่ </option>
            <option value="พัทลุง">พัทลุง </option>
            <option value="ภูเก็ต">ภูเก็ต </option>
            <option value="มหาสารคาม">มหาสารคาม </option>
            <option value="มุกดาหาร">มุกดาหาร </option>
            <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
            <option value="ยโสธร">ยโสธร </option>
            <option value="ยะลา">ยะลา </option>
            <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
            <option value="ระนอง">ระนอง </option>
            <option value="ระยอง">ระยอง </option>
            <option value="ราชบุรี">ราชบุรี</option>
            <option value="ลพบุรี">ลพบุรี </option>
            <option value="ลำปาง">ลำปาง </option>
            <option value="ลำพูน">ลำพูน </option>
            <option value="เลย">เลย </option>
            <option value="ศรีสะเกษ">ศรีสะเกษ</option>
            <option value="สกลนคร">สกลนคร</option>
            <option value="สงขลา">สงขลา </option>
            <option value="สมุทรสาคร">สมุทรสาคร </option>
            <option value="สมุทรปราการ">สมุทรปราการ </option>
            <option value="สมุทรสงคราม">สมุทรสงคราม </option>
            <option value="สระแก้ว">สระแก้ว </option>
            <option value="สระบุรี">สระบุรี </option>
            <option value="สิงห์บุรี">สิงห์บุรี </option>
            <option value="สุโขทัย">สุโขทัย </option>
            <option value="สุพรรณบุรี">สุพรรณบุรี </option>
            <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
            <option value="สุรินทร์">สุรินทร์ </option>
            <option value="สตูล">สตูล </option>
            <option value="หนองคาย">หนองคาย </option>
            <option value="หนองบัวลำภู">หนองบัวลำภู </option>
            <option value="อำนาจเจริญ">อำนาจเจริญ </option>
            <option value="อุดรธานี">อุดรธานี </option>
            <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
            <option value="อุทัยธานี">อุทัยธานี </option>
            <option value="อุบลราชธานี">อุบลราชธานี</option>
            <option value="อ่างทอง">อ่างทอง </option>
            <option value="อื่นๆ">อื่นๆ</option>
        </select>
        <input class="btn btn-outline-primary" type="submit" value="แก้ไข">
        <a href="index.php"><input class="btn btn-outline-warning" type="button" value="กลับ"></a>
    </form>
    </div>
            <div class="col align-self-end">
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>