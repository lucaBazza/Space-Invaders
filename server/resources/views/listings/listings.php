<h1><?php echo $heading ?></h1>
<?php foreach($listings as $listing) : ?>
    <h2><?= $listing['title'] ?></h2>
    <p><?= $listing['description'] ?></p>
<?php endforeach; ?>