
<?php

require_once(dirname(__FILE__).'/../config/AppConfiguration.php');

session_start();

$text = '';
if (isset($_POST['text'])) {
  $text = $_POST['text'];
} elseif (isset($_GET['text'])) {
  $text = $_GET['text'];
}
?>

<style>
.photo {
  margin: 2px;
}
.pager {
  margin-top: 10px;
  padding-left: 50px;
}
ul li {
  display: inline;
}
</style>

<form method="post" action="/index.php">
<input type="text" name="text" value="<?php echo $text; ?>">
<button type="submit">Search</button>
</form>

<?php

use FAN\LIFCKR\Model\Fetcher;
use FAN\LIFCKR\Model\Pager;
use FAN\LIFCKR\Model\PhotoList;

$page = 1;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}

if (!empty($text)) {
  $fetcher = new Fetcher();

  if ($content = $fetcher->fetchData($text, $page)) {
    $pl = new PhotoList($content);
    $_SESSION['pl'] = serialize($pl);
    $pager = new Pager($pl->getPage(), $pl->getPages(), $text);

    echo $pl.'<br>'.$pager;
  }
}