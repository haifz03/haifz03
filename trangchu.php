<?php
    require("ketnoiDatabase.php");
    $sql = "SELECT * FROM sanpham";
    $query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quản lý danh sách sản phẩm</title>
    <script>
      function xoasanpham(){
        var conf = confirm('bạn có chắc chắc xóa sản phẩm này hay không ?');
        return conf;
      }
    </script>
</head>
<style>
    #productList {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#productList td, #productList th {
  border: 1px solid #ddd;
  padding: 8px;
}

#productList tr:nth-child(even) {
  background-color: #f2f2f2;
}

#productList tr:hover {
  background-color: #ddd;
}

#productList th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

button {
  background-color: #2F54EB;
  padding: 8px 16px;
}

button a {
  color: white;
}

a {
  text-decoration: none;
}
</style>
<body>
    <h1>Quản lý danh sách sản phẩm</h1>
    <button><a href="themsanpham.php">Thêm sản phẩm</a></button>
    <table id="productList">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
        </tr>
        <?php
            // Giả sử $query là một biến chứa kết quả truy vấn từ cơ sở dữ liệu
            while ($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $row["masp"]; ?></td>
            <td><?php echo $row["tensp"]; ?></td>
            <td><?php echo $row["gia"]; ?> VNĐ</td>
            <td><img style="width: 200px; height: 200px;" src="./images/<?php echo $row["imgURL"]; ?>" alt=""></td>
            <td>
                <a href="suasanpham.php?id=<?php echo $row['masp']; ?>">Sửa</a>
                <a onclick = "return xoasanpham()" href = "xoasanpham.php?id=<?= $row['masp']?>">Xóa</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
