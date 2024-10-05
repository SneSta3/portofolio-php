<?php include('partials/header.php'); ?>

<?php 
//normalizacija_blog_podataka(ocitaj_posts_text_file());
//izlistaj_sve_postove();
$svi_postovi = izlistaj_sve_postove();
?>
<?php foreach($svi_postovi as $post): ?>
<section class="container blog">
    <article class="post">
         <a href=""><h2><?php echo $post['naslov']; ?></h2></a>
         <div class="meta">
            <span><?php echo $post['datum']; ?></span> &nbsp;&nbsp;|&nbsp;&nbsp;
            <span><?php echo $post['kategorija']; ?></span>
         </div>
         <p><?php echo $post['tekst']; ?></p>
    </article>
</section>
<?php endforeach; ?>

<?php include('partials/footer.php'); ?> 