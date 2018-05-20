
<?php
include 'lib/header.php';
include  'Database.php';
?>
<?php
    $db = new Database();
    if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $skill = $_POST['skill'];

        if (empty($name) or empty($email) or empty($skill)){
            $msg =  '<p style="color: red;font-size: 16px;">Field Must not be empty...!!</p>';
        }else{
            $sql = "INSERT INTO tbl_data(name,email,skill) VALUES ('$name','$email','$skill')";
            $data = $db->Insert($sql);
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
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Skill</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="skill" placeholder="Skill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-danger" value="Submit" name="submit">
                            <input type="reset" class="btn btn-warning" value="Clear">
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
