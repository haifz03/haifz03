<style>
        form {
          width: 600px;
        }
      
        div {
          display: flex;
          margin-bottom: 20px;
        }
      
        label {
          width: 100px;
        }
      
        input, textarea {
          flex: 1;
        }
      
        button {
          margin-left: 100px;
          padding: 6px 12px;
          color: #2F1C25;
          background-color: transparent;
          border: 3px solid #D780DF;
          border-radius: 8px;
          cursor: pointer;
        }
</style>
<body>
    <a href="trangchu.php">Quay về</a>
    <h1>Thêm sản phẩm</h1>
    <form action="" method="POST" enctype="multipart/form-data">
      <div>
        <label for="ten">Tên sản phẩm</label>
        <input type="text" id="ten" name="ten" required>
      </div>
      
      <div>
        <label for="gia">Giá sản phẩm</label>
        <input type="number" id="gia" name="gia" required>
      </div>
      
      <div>
        <label for="file">Hình ảnh</label>
        <input type="file" id="file" name="hinhanh" value="Choose File" required>
      </div>
      
      <div>
        <label for="mota">Mô tả</label>
        <textarea name="mota" id="mota" cols="30" rows="10" required></textarea>
      </div>
      
      <button type="submit" name="submit">
        Thêm sản phẩm
      </button>
    </form>
    
  </body>
<?php
require("ketNoiDatabase.php"); // Dòng này yêu cầu một file khác có tên là "ketNoiDatabase.php", thường chứa các thông tin kết nối đến cơ sở dữ liệu.

if(isset($_POST["submit"]) ){ // Kiểm tra xem có dữ liệu được gửi lên từ form bằng phương thức POST với tên là "submit" hay không. Nếu có, khối lệnh bên trong sẽ được thực thi.

    $tensp = $_POST["ten"]; // Lấy giá trị của trường "ten" từ form và gán vào biến $tensp.
    $gia = $_POST["gia"]; // Tương tự, lấy giá trị của trường "gia" và gán vào biến $gia.
    $mota = $_POST["mota"]; // Lấy giá trị của trường "mota" và gán vào biến $mota.
    $hinhanh=$_FILES['hinhanh']['name']; // Lấy tên của file ảnh được upload và gán vào biến $hinhanh.

    // Tạo đường dẫn đến thư mục lưu trữ ảnh
    $target_dir = "./images/"; // Đường dẫn đến thư mục "images" (nên tạo thư mục này trước khi chạy code).
    $target_file = $target_dir . $hinhanh; // Đường dẫn đầy đủ đến file ảnh sẽ được lưu.

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