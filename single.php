<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");

if(isset($_GET['id'])) {
$post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/bbc375b4ba.js" crossorigin="anonymous"></script>
    <title><?php echo $post['title']; ?> | BlogPost</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <div class="page-wrapper">
        <div class="content clearfix">
            <div class="main-content single">
                <h1 class="post-title"><?php echo $post['title']; ?></h1>
                <div class="post-content">
                    <?php echo html_entity_decode($post['body']); ?>
                </div>
            </div>

            <div class="sidebar single">
                <div class="section popular">
                    <h2 class="section-title">Popular Posts</h2>
                    <?php foreach ($posts as $p): ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="" />
                            <a href="#" class="title"><?php echo $p['title'] ?></a>
                        </div>
                        <?php endforeach; ?>
                </div>
                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <?php  foreach ($topics as $topic) : ?>
                            <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>

                            <?php endforeach; ?>

                    </ul>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>