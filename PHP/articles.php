<?php
// Page par Jul
require_once('configuration.php');
// Pagination
$articles_par_page = 5; // Le nom de la variable veut tout dire.
$allArticlesRequest = $db->query('SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 5');
$articles = $allArticlesRequest->rowCount();
$allPages = ceil($articles/$articles_par_page);
if(isset($GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0)
{
  $_GET['page'] = intval($_GET['page']);
  $pageActuelle = $_GET['page'];
}
else
{
  $pageActuelle = 1;
}
$start = ($pageActuelle-1)*$articles_par_page;
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/blog.css">
    <title>Les articles</title>
  </head>
  <body>
    <div class=" container-fluid gray">
      <header>
        <?php
        include ("header-articles.php");
        ?>
      </header>      
    </div>
    <main>
      <div class="background">
        <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
      </div>
      <body>
        <article>
          <div class="table-wrapper">
            <table class="fl-table">
              <thead>
                <tr>
                  <th>Titre</th>
                  <th>Article</th>
                  <th>Commentaire</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $articles = $db->query('SELECT * FROM `articles` ORDER BY `id` DESC LIMIT '.$start.','.$articles_par_page);
                while ($data = $articles->fetch())
                {
                  ?>
                  <tr>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['article']; ?></td>
                  </tr>
              </tbody>
              <?php
              }
              ?>
              <?php
              for($pagination=1;$pagination<=$allPages;$pagination++)
              if($pagination == $pageActuelle)
              {
                echo $pagination.' ';
              }
              else
              {
                echo '<a href="articles.php?page='.$pagination.'">'.$pagination.'</a>';
              }
              ?>
            </table>
          </div>
        </article>
        <footer>
          <?php
          include('footer2.php');
          ?>
          </footer>
      </body>
</html>