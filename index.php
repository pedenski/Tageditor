<?php
include_once('lib/database.class.php');
include_once('lib/user.class.php');
include_once('lib/tags.class.php');

$db = new Database();
$User = new User($db);
//$Tags = new Tags($db);


$UserList = $User->Users();
// foreach ($UserList as $key ) {
//   $id = $key['id'];
//   $user = $key['user'];

//   echo "$user";
// }



?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
    <link rel="stylesheet" href="style/index.css">
    
    <!--JQUERY-->
    <script
      src="https://code.jquery.com/jquery-3.2.1.js"
      integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
      crossorigin="anonymous">
    </script>
   
    <!--TAG EDITOR CSS -->  
    <link rel="stylesheet" href="style/jquery.tag-editor.css">  

  </head>
  <body>
  <section class="section">
  <div class="container">
      <h1 class="title">
        Tageditor
      </h1>
    
    <form id="tags" action="parse.php" method="POST">
    <table class="table is-bordered">
    <thead>
    </thead>

    <tbody>
      <tr>
        <td colspan="3">
          <div style="margin:0 0 1.2em">
            <input class="input" type="text" id="demo3" ></textarea>
          </div>
        </td>
      </tr>
      <tr>
        <td><a id="remove_all_tags" class="button is-danger is-outlined">Remove All</a></td>
        <td><a onclick="$('#demo3').tagEditor('addTag', 'Innovation');" class="button is-warning is-outlined">Innovation</a></td>
        <td><button type="submit" class="button is-info is-outlined">Submit</a></td>
      </tr>
    </tbody>
    </table>
    </form>


  </div> <!--/container-->
  </section>

  <footer>

  <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous">
  </script>
  

   <!--TAG EDITOR JS -->   
  <script src="style/jquery.caret.min.js"></script>
  <script src="style/jquery.tag-editor.js"></script>    

  <script>
  $('#demo3').tagEditor({ 
    initialTags: ['Hello', 'World'], 
    placeholder: 'Enter tags ...' 
  });

  $('#remove_all_tags').click(function() {
    var tags = $('#demo3').tagEditor('getTags')[0].tags;
    for (i=0;i<tags.length;i++){ $('#demo3').tagEditor('removeTag', tags[i]); }
  });  
 </script> 


 <!--SUBMIT AJAX FORM DAT  --> 
  <script>
    $(document).ready(function() {
        // process the form
        $('form').submit(function(event) {
                                 
            var formData = {
               'tag'     : $('#demo3').tagEditor('getTags')[0].tags   
            };
               
            // process the form
            $.ajax
            ({
                type        : 'POST', 
                url         : 'parse.php',
                data        : formData
            })
              .done(function(data) 
              {
              console.log(data); 
              });
           
          event.preventDefault();
        });
    });
  </script>
</footer>
</body>
</html>

<div class="test">  </div>