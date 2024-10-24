<?php
require("ketNoiDatabase.php");
$masp = (int) $_GET['id'];
$sql = "SELECT * FROM sanpham WHERE masp = '$masp'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$img = $row['imgURL'];
?>
<a href="trangchu.php">Quay về</a>
<h1>Cập nhật sản phẩm</h1>

<form action="" method="POST" enctype="multipart/form-data">
    <div>
        <label for="ten">Tên sản phẩm</label>
        <input type="text" id="ten" name="ten" value="
<?= $row["tensp"] ?>">
    </div>
    <div>
        <label for="gia">Giá sản phẩm</label>
        <input type="number" id="gia" name="gia" value="
<?= $row["gia"] ?>">
    </div>
    <div>
        <img style="width:200px; height: 200px;" src=
'./images/<?= $row["imgURL"] ?>' alt="">
    </div>
    <div>
        <label for="file">Hình ảnh</label>
        <input type="file" id="file" name="hinhanh" value="Choose File">
    </div>
    <div>
        <label for="mota">Mô tả</label>
        <textarea name="mota" id="mota" cols="30" rows=
"10"><?= $row["mota"] ?></textarea>
    </div>
    <button type="submit" name="submit">
    Cập nhật sản phẩm
    </button>
</form>

<?php
require("ketNoiDatabase.php"); // Dòng này yêu cầu một file khác có tên là "ketNoiDatabase.php", thường chứa các thông tin kết nối đến cơ sở dữ liệu.

if(isset($_POST["submit"])){ // Kiểm tra xem có dữ liệu được gửi lên từ form bằng phương thức POST với tên là "submit" hay không. Nếu có, khối lệnh bên trong sẽ được thực thi.

    $tensp = $_POST["ten"]; // Lấy giá trị của trường "ten" từ form và gán vào biến $tensp.
    $gia = $_POST["gia"]; // Tương tự, lấy giá trị của trường "gia" và gán vào biến $gia.
    $mota = $_POST["mota"]; // Lấy giá trị của trường "mota" và gán vào biến $mota.
    $hinhanh=$_FILES['hinhanh']['name']; // Lấy tên của file ảnh được upload và gán vào biến $hinhanh.

    // Tạo đường dẫn đến thư mục lưu trữ ảnh
    $target_dir = "./images/"; // Đường dẫn đến thư mục "images" (nên tạo thư mục này trước khi chạy code).
    if($hinhanh){
        if (file_exists(".imgages/".$img)) {
            unlink(".imgages/".$img);
        }
        $target_file = $target_dir.$hinhanh;
    }else{
        $target_file = $target_dir.$img;
        $hinhanh = $img;
    }
    // Kiểm tra xem tất cả các trường dữ liệu có được điền đầy đủ hay không
    if(isset($tensp) && isset($gia) && isset($mota) && isset($hinhanh)) {

        // Di chuyển file ảnh từ thư mục tạm lên server
        move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);

        // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng "sanpham"
        $sql = "INSERT INTO sanpham (masp, tensp, gia, mota, imgURL) VALUES (NULL, '$tensp', '$gia', '$mota', '$hinhanh')";

        // Thực thi câu lệnh SQL
        mysqli_query($conn, $sql);

        // Hiển thị thông báo thành công và chuyển hướng đến trang chủ
        echo "<script>alert('bạn đã thêm thành công')</script>";
        header("Location:trangchu.php");
    }
}
?>