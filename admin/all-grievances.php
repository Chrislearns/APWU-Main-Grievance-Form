<?php
require_once('../connection.php');
session_start();
// Check if session is established
$admin = $_SESSION("admin");

if (isset($_SESSION["loggedIn"])) {
  if($admin === 1) {
   exit(header("location:admin/index.php"));

}

exit(header("location:../index.php"));

}
$perPage = 5; // number of results per page
if (isset($_GET['page']) && !empty($_GET['page'])){
  $currentPage = $_GET['page'];
} else {
  $currentPage = 1;
}
$start = ($currentPage * $perPage) - $perPage; // where to start. what results to load in query
$query = $handler->query("SELECT * FROM filed_grievances"); // get all filed grievances
$totalResults = $query->rowCount(); // get total number of grievances
$query = $handler->query("SELECT * FROM filed_grievances LIMIT $start, $perPage");
$endPage = ceil($totalResults / $perPage);
$startPage = 1;
$nextpage = $curentPage + 1;
$previousPage = $curentPage - 1;




// add comments to db
if (isset($_POST['submit-comment'])) {
  $topic = $_POST['topic'];
  $comment = $_POST['comment'];
  $grievance_id = $_POST['id'];
  try {
    $stmt = $handler->prepare("INSERT INTO comments (name, topic, comment, account_information_id) VALUES (?, ?, ?, ?)");
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $topic);
    $stmt->bindValue(3, $comment);
    $stmt->bindValue(4, $grievance_id);
    $stmt->execute();
    echo "Inserted";
  } catch (PDOException $e) {
    echo "We have an error: " . $e->getMessage() . "<br>";
  }
}

/*
 * Function format date
 */
function formatDate($date) {
  return date("M. j, Y", strtotime($date));
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="https://use.fontawesome.com/51aa15acbd.js"></script>
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/skeleton/2.0.4/css/skeleton.css">
    <link rel="stylesheet" href="../css/custom.css">
  </head>
  <body>
    <div class="container">
      <div class="content-container">
        <a href="index.php"><img src="https://www.advsol.com/ASI/images/NewSite/Clients/cs_logo_apwu.png" alt="APWU" class="apwu-logo" height="100px"></a>
        <div style="padding-top: 80px">
          <h3>Manage Grievances</h3><br>
          <table class="u-full-width">
            <thead>
              <tr>
                <th></th>
                <th>Date Filed</th>
                <th>Date of Grievance</th>
                <th>Supervisor</th>
                <th>Status</th>
                <th>Comment/s</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $query->fetch(PDO::FETCH_OBJ)) : ?>
              <tr>
                <td><!--<a href="#"><i class="fa fa-eye fa-2x fa-panel" aria-hidden="true"></i></a>-->
                  <form method="post" action="?page=<?php echo $currentPage; ?>&gId=<?php echo $row->id; ?>" class="blah" name="view-grievance<?php echo $row->id; ?>">
                    <i class="fa fa-eye fa-2x fa-panel view-comments" aria-hidden="true" data-id="<?php echo $row->id; ?>"  onclick="document.forms['view-grievance<?php echo $row->id; ?>'].submit();"></i>
                  </form>

                </td>
                <td><?php echo formatDate($row->date_filed); ?></td>
                <td><?php echo formatDate($row->date); ?></td>
                <td><?php echo $row->supervisor_name; ?></td>
                <td>
                  <form method="post" action="save-status-changes.php?id=<?php echo $row->id; ?>" class="blah" name="save-status-changes<?php echo $row->id; ?>">
                    <i class="fa fa-floppy-o fa-2x fa-panel view-comments" aria-hidden="true"  onclick="document.forms['save-status-changes<?php echo $row->id; ?>'].submit();"></i>
                    <select name="status-change" class="u-full-width" id="save-status">
                      <option <?php echo ((isset($row->status) && $row->status === 'Submitted') ? "value='Submitted' selected" : "value='Submitted'"); ?>>Submitted</option>
                      <option <?php echo ((isset($row->status) && $row->status === 'Resolved') ? "value='Resolved' selected" : "value='Resolved'"); ?>>Resolved</option>
                    </select>
                  </form>
                </td>
                <td>
                  <i class="fa fa-plus-square-o fa-2x fa-panel postButton" aria-hidden="true" id="add-comment" data-key="<?php echo $row->id; ?>" onclick="getIdCreateComment(this)"></i>&nbsp;

                  <form method="post" action="?page=<?php echo $currentPage; ?>&id=<?php echo $row->id; ?>" class="blah" name="view-all-comments<?php echo $row->id; ?>">
                    <i class="fa fa-comment-o fa-2x fa-panel view-comments" aria-hidden="true" data-id="<?php echo $row->id; ?>"  onclick="document.forms['view-all-comments<?php echo $row->id; ?>'].submit();"></i>
                    <input type="hidden" name="get-apwu-id" value="<?php echo $row->id; ?>">

                  </form>
                </td>
              </tr>
              <?php
                endwhile;
              ?>
            </tbody>

          </table>
          <span class="pagination">
          <?php
            for ($i = $startPage; $i <= $endPage; $i++) {
              if ($_GET['page'] == $i) {
                echo "[<a href='?page={$i}'>" . $i . "</a>] ";
              } else if (empty($_GET['page']) && $i == 1) {
                echo "[<a href='?page={$i}'>" . $i . "</a>] ";
              } else {
                echo "<a href='?page={$i}'>" . $i . "</a> ";
              }
            }
          ?>
          </span>
        </div>
      </div>
    </div>

    <footer class="">
      <small>&copy; 2017 American Postal Workers Union</a></small>
      <div class="social-box">
        <a href="http://www.facebook.com/apwunational" class="facebook" target="_blank">
          <i class="fa fa-facebook-official fa-fw social-icon" aria-hidden="true"></i>
        </a>
        <a href="http://twitter.com/apwunational" class="twitter" target="_blank">
          <i class="fa fa-twitter-square fa-fw social-icon" aria-hidden="true"></i>
        </a>
        <a href="http://www.youtube.com/apwucommunications" class="youtube">
          <i class="fa fa-youtube-square fa-fw social-icon" aria-hidden="true"></i>
        </a>
        <a href="https://www.flickr.com/photos/123834212@N05/" class="flickr" target="_blank">
          <i class="fa fa-flickr fa-fw social-icon" aria-hidden="true"></i>
        </a>
      </div>
    </footer>

    <div class="overlay"></div>

<!--START OF COMMENT SUBMISSION FORM-->
    <div class="comment-form">
      <!--START OF FORM - tabbed left for spacing-->
      <form id="sign-up-form" method="post" action="all-grievances.php">
        <h3 class="center-text">Add Comment</h3><br>
        <div class="row"> <!--FORM ROW-->
          <div class="twelve columns">
            <label for="topic">Topic</label>
            <input class="u-full-width" id="topic-name" type="text" name="topic">
          </div>
          <div class="error" id = "full-name-error">Full Name Required</div>
        </div> <!--END ROW-->
        <div class="row"> <!--FORM ROW-->
          <div class="twelve columns">
            <label for="comment">Comment</label>
            <textarea class="u-full-width" placeholder="Comment here..." id="comment" name="comment"></textarea>
          </div>
        </div> <!--END ROW-->
        <input type="hidden" id="setId" value="" name="id">
        <input id="submit" type="submit" value="Add Comment" class="submit-button" name="submit-comment">
      </form>
      <!--END OF FORM - tabbed left for spacing-->
    </div>
<!--END OF COMMENT SUBMISSION FORM-->

<!--START OF VIEW COMMENTS-->
    <div class="view-related-comments">
      <?php $id = $_GET['id']; ?>
      <?php $query = $handler->query("SELECT * FROM comments Where account_information_id = '$id'"); ?>
      <div>
        <h3 class="center-text">Comment/s</h3><br>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Message</th>
            </tr>
          </thead>
          <?php
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
          ?>
          <tbody>
            <?php while ($row = $query->fetch(PDO::FETCH_OBJ)) : ?>
            <tr>
              <td><?php echo $row->name; ?></td>
              <td><?php echo $row->comment; ?></td>
            </tr>
            <?php endwhile; ?>

            <script>
            // NEED TO CHECK AND see if there is any comments first.
              // waiting for the page to load
              document.addEventListener("DOMContentLoaded", function() {
                viewComments();
                //console.log("you");
              });
            </script>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
<!--END OF VIEW COMMENTS-->


<!--START OF VIEW GRIEVANCE-->
    <div class="view-grievance">
      <?php $gId = $_GET['gId']; ?>
      <?php $query = $handler->query("SELECT * FROM filed_grievances Where id = '$gId'"); ?>
      <div>
        <h3 class="center-text">Grievance</h3><br>
          <?php
            if (isset($_GET['gId'])) {
              $id = $_GET['gId'];
          ?>
          <tbody>
            <?php $row = $query->fetch(PDO::FETCH_OBJ); ?>
            <ul>
              <li><strong>Employee ID:</strong> <?php echo $row->employee_id; ?></li>
              <li><strong>Date of grievance:</strong> <?php echo formatDate($row->date); ?></li>
              <li><strong>Date filed:</strong> <?php echo formatDate($row->date_filed); ?></li>
              <li><strong>Time worked alone:</strong> <?php echo $row->time_alone; ?></li>
              <li><strong>Machine number:</strong> <?php echo $row->machine_number; ?></li>
              <li><strong>Feed and sweep alone:</strong> <?php echo $row->feed_sweep; ?></li>
              <li><strong>Supervisor's name:</strong> <?php echo $row->supervisor_name; ?></li>
              <li><strong>Number of mail sorted during period:</strong> <?php echo $row->mail_processed; ?></li>
              <li><strong>Received help:</strong> <?php echo $row->time_help_received; ?></li>
              <li><strong>Received assistance for:</strong> <?php echo $row->time_help_swept_machine; ?></li>
              <li><strong>Total time worked alone:</strong> <?php echo $row->time_worked_alone; ?></li>

            </ul>
            <script>
            // NEED TO CHECK AND see if there is any comments first.
              // waiting for the page to load
              document.addEventListener("DOMContentLoaded", function() {
                viewGrievance();
                //console.log("you");
              });
            </script>
            <?php } ?>
      </div>
    </div>
<!--END OF VIEW GRIEVANCE-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <script>
      /*
       * gets data-key of comment that is clicked on
       * Will move into main script later
       */
      function getIdCreateComment(e){
        var theId = e.getAttribute("data-key");
        document.getElementById('setId').value = theId;
        createComment();
      }
    </script>

  </body>
</html>
