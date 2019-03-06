
<!doctype html>
<html>
   <head lang="en">
      <meta charset="utf-8">
      <title>Ajax File Upload with jQuery and PHP</title>
      <link rel="stylesheet" href="style.css" type="text/css" />
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="script.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>
   <body> 
        <?php require_once 'process.php';  ?>
        <?php 
            if (isset($_SESSION['message'])):
        ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
                <?php echo $_SESSION['message']; ?>
                <!-- unset for clear message after refresh, without that unset it would be always on the top with the same info -->
                <?php unset($_SESSION['message']); ?>
        </div>
        <?php endif ?>
        <div class = "container">        
        <?php    
                    $mysql = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysql));
                    $result = $mysql->query("SELECT * FROM data") or 
                    die($mysql->error);
        ?>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th colspan ="2">Action</th>
                            </tr>
                        </thead>
                        <?php       
                        while($row = $result->fetch_assoc()){ ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['location'] ?></td>
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
                        <label>Location</label>
                        <input type="text" name="location" class="form-control"  value="<?php echo $location; ?>" placeholder="enter yourlocation">
                        </div>
                        <div class="form-group">
                        <?php 
                            if ($update==TRUE):
                        ?>
                        <button type="submit" name="update" class="btn btn-info">Update</button>
                            <?php  else: ?>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                        <?php endif ?>
                        </div>
                    </form>
            </div>     
            </div>        
   </body>  
</html>