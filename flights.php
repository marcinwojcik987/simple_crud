
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
        <?php require_once 'fprocess.php';  ?>
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
                    $result = $mysql->query("SELECT * FROM flights") or 
                    die($mysql->error);
        ?>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Departure</th>
                                <th>Arrival</th>
                                <th>Seats</th>
                                <th>Tourist</th>
                                <th>Price</th>  
                                <th colspan ="2">Action</th>
                            </tr>
                        </thead>
                        <?php       
                        while($row = $result->fetch_assoc()){ ?>
                            <tr>
                                <td><?php echo $row['departure'] ?></td>
                                <td><?php echo $row['arrival'] ?></td>
                                <td><?php echo $row['seats'] ?></td>
                                <td><?php echo $row['tourist'] ?></td>
                                <td><?php echo $row['price'] ?></td>                                
                                <td><a href ="flights.php?edit=<?php echo $row['id']; ?>"
                                    class="btn btn-info" >Edit</a>
                                    <a href ="flights.php?delete=<?php echo $row['id']; ?>"
                                    class="btn btn-danger" >Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <div class="row justify-content-center">
                <form action="fprocess.php" method="POST">
                <input type = "hidden" name = "id" class="form-control" value="<?php echo $id; ?>" >
                        <div class="form-group">
                        <label>Departure</label>
                        <input type="date" name="departure" class="form-control" value="<?php echo $departure; ?>" placeholder="enter departure">
                        </div>
                        <div class="form-group">
                        <label>Arrival</label>
                        <input type="date" name="arrival" class="form-control"  value="<?php echo $arrival; ?>" placeholder="enter arrival">
                        </div>
                        <div class="form-group">
                        <label>Seats</label>
                        <input type="text" name="seats" class="form-control"  value="<?php echo $seats; ?>" placeholder="enter seats">
                        </div>                      
                        <div class="form-group">
                        <label>List of tourist</label>
                        <select  class="form-control"> 
                        <option name="tourist">Please Select</option>
                            <?php
                                $get=$mysql->query("SELECT * FROM turist") or 
                                die($mysql->error);
                                while($row2 =$get->fetch_assoc())
                                {
                                ?>
                                <option value = "<?php echo($row2['name'])?>" >
                                    <?php echo($row2['name']) ?>
                                </option>
                                <?php
                                }               
                            ?>
                        </select> 
                        </div>
                        <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control"  value="<?php echo $price; ?>" placeholder="enter price">
                        </div>
                        <div class="form-group">
                        <?php 
                            if ($update==TRUE):
                        ?>
                        <button type="submit" name="update" class="btn btn-info">Update</button>
                        <a href ="flights.php" class="btn btn-primary" >Back</a>
                            <?php  else: ?>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                        <a href ="index.php" class="btn btn-info" >Go to Tourist</a>
                        <?php endif ?>
                        </div>
                    </form>
            </div>     
            </div>        
   </body>  
</html>