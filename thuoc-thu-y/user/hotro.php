
<?php
	include_once('layouts/header.php');

?>
<title>hỗ trợ</title>
<form method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3></h3>
                <div class="form-group">
                  <label for="usr">Tên:</label>
                  <input required="true" type="text" class="form-control" id="usr" name="fullname">
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input required="true" type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="phone_number">Số Điện Thoại:</label>
                  <input type="text" class="form-control" id="phone_number" name="phone_number">
                </div>
                <div class="form-group">
                  <label for="note">Đặt câu hỏi:</label>
                  <textarea class="form-control" rows="3" name="note" id="note"></textarea>
                </div>
            </div>      
	    </div>
    </div>
</form>
<?php
    include_once('layouts/footer.php');
?>