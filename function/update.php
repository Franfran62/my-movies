<?php 

require_once "../Controller/MovieController.php";
$movie = new MovieController();

$title = htmlspecialchars($_POST['title']);
$description  = htmlspecialchars($_POST['description']);
$release_date = htmlspecialchars($_POST['release_date']);
$image_url = htmlspecialchars($_POST['image_url']);
$director = htmlspecialchars($_POST['director']);
$category_id = htmlspecialchars($_POST['category_id']);
$id = htmlspecialchars($_GET['id']);

$movie->update($title, $description, $release_date, $image_url, $director, $category_id, $id);

header('Location: ../view/bibliotheque.php');

?> 
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>
<?php 
exit();
