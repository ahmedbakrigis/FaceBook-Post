
<!DOCTYBE html>
<html>
 <head>
  <title>Facebook System Post</title>
   <meta charset="UTF-8">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="materialize.min.css">
     <link rel="stylesheet" href="style.css">
 </head>
 <body class="light-blue" onload="post()" >

 <!-- Start Contaier -->
  <div class="container">
   <!-- Start Row -->
      <div class="row">
    <!-- Start Col -->
          <div class="col m10 offset-m1">
        <h3 class="center white-text">Facebook Post</h3>
          <br>
    <!-- Start Carr-Panel -->
              <div class="card-panel">
                  <?php
                  session_start();
                  if (isset($_SESSION['name'])){
         echo " <form action='' method=''>
            <div class='input-field'>
              <input type='radio'name='group'>
              <label for='post_msg'>What's On Your Mind</label>
              <textarea id='post_msg' onkeyup='check()' class='materialize-textarea'></textarea>
              </div>
              <input type='ubmit' class='btn blue darken-3' value='Post' onclick='post(\"add\")'
              disabled id='btn-post'>
          </form>

        </div>
             <!-- End Carr-Panel -->
              <br>
      <!-- Start Cart-Panel Post -->
        <div id='post_contaier'>
        </div>
      <!-- End Cart-Panel Post -->
          </div>
     <!-- End Col -->
      </div>
   <!-- End Row -->
  </div>
 <!-- End Contaier -->
 <!-- Modal Structure -->
 <div id='modal1' class='modal'>
 
     <div class='modal-content'>
         <form>
             <div class='input-field'>
                 <textarea id='edit_post_msg' onkeyup='check()' autofocus 
                 class='materialize-textarea'></textarea>
             </div>
             <input type='ubmit' class='btn blue darken-3 modal-close' value='Edit'
              onclick='post(\"edit\")' id='edit_btn-post'>
             <input type='hidden'id='post_id'>
         </form>
         </div>
 
     <div class='modal-footer'>
       <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Cancel</a>
     </div>
 </div>";

 }
 else{
     header("Refresh:5,url=log.html");

     echo "So You Can't Come This Page Directly You Are Redirect To LogInl";
 }
 ?>

 <script  src="jquery-3.1.1.min.js"></script>
 <script src="materialize.min.js"></script>
 <script>
     $(document).ready(function() {
         // the "href" attribute of the modal trigger must specify the modal
         // ID that wants to be triggered
         $('.modal').modal();
         // To Run Model
         /*
         $(".action").click(function () {
             $('#modal1').modal('open');
         })
         This not Worl Because ii call class not found in the same page
         */
         /*
         use the func on to call class  not found the same page
         but you should use id or class found in this page
          */
         $("#post_contaier").on("click", ".action", function () {
             $('#modal1').modal('open');
             $("#post_id").val($(this).data("id"));
             // Call The Text Found In P
             $("#edit_post_msg").val($(this).siblings("p").text());
         })
     });

     // Check at text area empty or no
   function check() {
       var text=document.getElementById("post_msg").value;
    if(text !=""){
        document.getElementById("btn-post").removeAttribute("disabled");
    }   else {
        document.getElementById("btn-post").setAttribute("disabled","disabled");
    }
    //***************************************************************


   }
   function post(ReqTybe,id) {
       var post = document.getElementById("post_msg").value,
           user = "Ahmed Bakri";
       var xhr = new XMLHttpRequest();
       // ceck to func send para or no
       if (ReqTybe == undefined && id == undefined)
       {
           ReqTybe = "";
           id = "";
       }
       else if (ReqTybe == "add") {
           id = "";
       } else if (ReqTybe == "del") {
           var a = window.confirm("Are You Sure To Delete ?")
           if (a == false) {
               id = "";
           }
       }
       else if (ReqTybe == "edit") {
           post = document.getElementById('edit_post_msg').value;
           id = document.getElementById("post_id").value;
       }
    xhr.onreadystatechange=function () {
    if (xhr.readyState==4&&xhr.status==200){
       document.getElementById("post_contaier").innerHTML=xhr.responseText;
        document.getElementById("post_msg").value="";
        document.getElementById("btn-post").setAttribute("disabled","disabled");
    }
    }
    xhr.open("GET","server.php?req="+ReqTybe+"&id="+id+"&u="+user+"&P="+post,true);
    xhr.send();
    }
    $("form").submit(function (para1) {
        para1.preventDefault();// that means stop the default work such as reload in form
    })
 </script>
 </body>
</html>