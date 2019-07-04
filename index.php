
<!doctype html>
<html>
   <head lang="en">
      <meta charset="utf-8">
      <title>flights</title>
      <link rel="stylesheet" href="style.css" type="text/css" />
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>
   <body> 
        <?php require_once 'process.php';  ?>
        <?php 
            if (isset($_SESSION['message'])):
        ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
                <?php echo $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
        </div>
        <?php endif ?>
        <div class = "container">        
        <?php    
                    $mysql = new mysqli('localhost', 'root', '', 'loty') or die(mysqli_error($mysql));
                    $result = $mysql->query("SELECT * FROM turist") or 
                    die($mysql->error);
        ?>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Sex</th>
                                <th>Country</th>
                                <th>Notes</th>
                                <th>Birth</th>
                                <th>List of flights</th>                                
                                <th colspan ="2">Action</th>
                            </tr>
                        </thead>
                        <?php       
                        while($row = $result->fetch_assoc()){ ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['surname'] ?></td>
                                <td><?php echo $row['sex'] ?></td>
                                <td><?php echo $row['country'] ?></td>
                                <td><?php echo $row['notes'] ?></td>
                                <td><?php echo $row['birth'] ?></td>
                                <td><?php echo $row['flylist'] ?></td>
                                <td><a href ="index.php?edit=<?php echo $row['id']; ?>"
                                    class="btn btn-info" >Edit</a>
                                    <a href ="index.php?delete=<?php echo $row['id']; ?>"
                                    class="btn btn-danger" >Delete</a>
                                </td>
                                
                            </tr>
                        <?php } ?>                        
                    </table>
                </div>
            <div class="row justify-content-center">
                <form action="process.php" method="POST">
                <input type = "hidden" name = "id" class="form-control" value="<?php echo $id; ?>" >
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="enter your name">
                        </div>
                        <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control"  value="<?php echo $surname; ?>" placeholder="enter your surname">
                        </div>
                        <div class="form-group">
                        <label>Sex</label>
                        <input type="text" name="sex" class="form-control"  value="<?php echo $surname; ?>" placeholder="enter your sex">
                        </div>
                        <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control"  value="<?php echo $country; ?>" placeholder="enter your country">
                        </div>
                        <div class="form-group">
                        <label>Notes</label>
                        <input type="text" name="notes" class="form-control"  value="<?php echo $notes; ?>" placeholder="enter your notes">
                        </div>
                        <div class="form-group">
                        <label>Birth</label>
                        <input type="date" name="birth" class="form-control"  value="<?php echo $birth; ?>" placeholder="enter your birthdate">
                        </div>                        
                        <div class="form-group">
                        <label>List of flights</label>
                        <select class="form-control"> 
                        <option  name="flylist">Please Select</option>
                            <?php
                                $get=$mysql->query("SELECT * FROM flights") or 
                                die($mysql->error);
                                while($row2 =$get->fetch_assoc())
                                {
                                ?>
                                <option value = "<?php echo($row2['arrival'])?>" >
                                    <?php echo($row2['arrival']) ?>
                                </option>
                                <?php
                                }               
                            ?>
                        </select> 
                        </div>
                        <div class="form-group">
                        <?php 
                            if ($update==TRUE):
                        ?>
                        <button type="submit" name="update" class="btn btn-info">Update</button>
                        <a href ="index.php" class="btn btn-primary" >Back</a>
                            <?php  else: ?>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                        <a href ="flights.php" class="btn btn-info" >Go to Flights</a>
                        <?php endif ?>
                        </div>
                    </form>
            </div>     
            </div>        
   </body>  
</html>