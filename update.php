
<?php
include 'lib/header.php';
include  'Database.php';
?>
<?php
    $id = $_GET['id'];
    $db = new Database();
    $sql = "SELECT * FROM tbl_data WHERE id = $id";
    $result = $db->Select($sql)->fetch_assoc();


if (isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $skill = $_POST['skill'];

    if (empty($name) or empty($email) or empty($skill)){
        $msg =  '<p style="color: red;font-size: 16px;">Field Must not be empty...!!</p>';
    }else{
        $sql = "
            UPDATE tbl_data SET
            name = '$name',
            email = '$email',
            skill = '$skill'
            WHERE id = $id";

        $data = $db->Update($sql);
    }


}
if (isset($_POST['delete'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $skill = $_POST['skill'];

    if (empty($name) or empty($email) or empty($skill)){
        $msg =  '<p style="color: red;font-size: 16px;">Field Must not be empty...!!</p>';
    }else{
        $sql = "DELETE  FROM tbl_data WHERE id = $id";
        $delete = $db->Delete($sql);
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="form" style="margin-top: 20px;">
                <?php
                if (isset( $msg)){
                    echo $msg;
                }
                ?>
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $result['name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $result['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Skill</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="skill" placeholder="Skill" value="<?php echo $result['skill']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-danger" value="Update" name="update">
                            <input type="submit" class="btn btn-success" value="Delete" name="delete">
                            <a href="index.php" class="btn btn-info pull-right">Go Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>



<?php
include 'lib/footer.php';
?>
