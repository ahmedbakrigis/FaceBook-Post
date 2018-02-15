<?php
 include_once ("DB.php");
 $reqest=$_REQUEST['req'];
 $user=$_REQUEST["u"];
 $post=$_REQUEST['P'];
 $id  =$_REQUEST['id'];
if ($reqest!= ''){
   if ($reqest=="add"){
     $ins="INSERT INTO posts(user,PostText) VALUES('$user','$post')";
     $run=mysqli_query($con,$ins);
   }
   elseif ($reqest=="del"){
       $del="DELETE FROM posts WHERE ID=$id";
       $run=mysqli_query($con,$del);
   }
   elseif ($reqest=="edit"){
       $upd="UPDATE posts SET PostText='$post' WHERE ID='$id'";
       $run=mysqli_query($con,$upd);
   }
 }
 $sel="SELECT * FROM posts ORDER BY ID DESC";
 $run=mysqli_query($con,$sel);
 while ($row=mysqli_fetch_assoc($run)) {
     ?>

     <div class="card-panel post">
         <i class="small material-icons right " onclick="post('del',<?php echo $row["ID"]?>)">delete</i>
         <!--Custom Atribute -->
         <i class="small material-icons right action" data-id="<?php echo $row["ID"]?>">edit</i>
         <h5><?php echo $row["user"];?></h5>
         <small><i class="tiny material-icons">query_builder</i><?php echo $row["time"];?></small>
         <p>
             <?php echo $row["PostText"];?>
         </p>
     </div>
     <?php
 }
  ?>