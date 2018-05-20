<?php
    include 'lib/header.php';
    include  'Database.php';
?>

<?php
    $db = new Database();
    $sql = 'SELECT * FROM tbl_data';
    $read = $db->Select($sql);
?>
<style>
    .table thead{
        text-align: center;
    }
    .table tbody{
        text-align: center;
    }
    .btnn{
        text-align: center;
    }
    .ask{
        margin-top: 20px;

    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php
                if (isset($_GET['msg'])){
                    echo "<p style='color: red'>".$_GET['msg']."</p>";
                }
            ?>
            <div class="table">
                <table class="table table-hover">
                    <thead>
                        <td>#</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Skill</td>
                        <td>Action</td>
                    </thead>
<?php
    if ($read){
        $i = 0;
    while($row = $read->fetch_assoc()) {
        $i++;
?>
                    <tbody>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['skill']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo urldecode($row['id']); ?>">Edit ||</a>

                        </td>
                    </tbody>
                    <?php
                        }
                        }else{
                            echo 'Data not Available';
                        }
                   ?>
                </table>
            </div>
            <div class="btnn">
                <a href="create.php" class="btn btn-info ask">Create</a>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<?php
include 'lib/footer.php';
?>