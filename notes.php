<?php 
session_start();
include_once 'php/inc/config.php'; //import config
if(!$_SESSION["id"]){
   header("location: signin.php");
}
// get note
$notes= mysqli_query($conn,"SELECT * FROM note WHERE id_user='{$_SESSION["id"]}'");
$notes_data= mysqli_fetch_all($notes,MYSQLI_ASSOC);
 
  ////
//delete note 
$id = $_POST['delete'];
if(isset($_POST['delete'])){
  $delete=mysqli_query($conn,"DELETE FROM note WHERE id_note= '{$id}'");
  echo "<meta http-equiv='refresh' content='0'>";
}
////////////////// 


// logout form

if(isset($_POST['logout'])){
  session_destroy();  
  echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/notes.css" />
    <title>Notes</title>
</head>

<body>
    <div class="container">
        <!--logout--->
        <form class="logout" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <button type="submit" name="logout">Logout</button>
        </form>
        <!--end logout--->
        <!--new note-->
        <form class="newnotes">
            <!--header-->
            <h1>New Note</h1>
            <!--end header-->
            <!---error-->
            <div class="error">
                <h1></h1>
            </div>
            <!---end error-->
            <!--title-->
            <div class="title">
                <input type="text" name="title" id="title" />
                <label for="title" id="label">Title </label>
            </div>

            <!---end title-->
            <!---context-->
            <div class="context">
                <label for="context">context</label>
                <textarea name="context" id="context" cols="40" rows="10"></textarea>
            </div>

            <!---end context-->
            <div class="button">
                <input type="submit" value="Save" id="save" />
            </div>
        </form>
        <!--end new note-->
        <!--show all notes--->
        <div class="notes">
            <!--loading note here--->
            <?php
            foreach($notes_data as $note):
   
      echo '
            <div class="note">
                <!---delete and title here--->
                <form class="delete" action='.$_SERVER['PHP_SELF'].' method="POST">
            <h1> '. $note["title"] .'</h1>
            <!--delete button-->
            <button type="submit" name="delete" value='.$note['id_note'].'>

                <svg xmlns=" http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash"
                    viewBox="0 0 16 16">
                    <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd"
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>

            </button>


            </form>
            <!---end delete and title here--->
            <Section>
                <p>
                   '.$note['content'].'
                </p>
            </Section>
        </div>
        <!----------------------------------------------->

        '; endforeach;
        //end forecah
        ?>

            <!--end load note here--->

        </div>
        <!--show all notes--->
        <!--icon add note --->
        <div class="show">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg>
        </div>

        <!--end icon add note --->
    </div>
    <script src="./js/style.js"></script>
    <!---show and hide div new note--->
    <script src="./js/show.js"></script>
    <!---send new note -->
    <script src="./js/newnote.js"></script>

</body>

</html>