<?php 
//echo ocitaj_works_text_file();
//debagovanje(ocitaj_works_text_file());
//normalizacija_podataka(ocitaj_works_text_file());
//izlistaj_sve_projekte();
$svi_projekti = izlistaj_sve_projekte();
?>

<?php foreach($svi_projekti as $projekat) : ?>
<article class="works">
    <div class="img">
        <img src="<?php echo $projekat['slika']; ?>" alt="">
    </div>
    <div class="text">
        <h2><?php echo $projekat['naslov']; ?></h2>
        <div class="meta">
            <p><?php echo $projekat['datum']; ?></p>
            <p><?php echo $projekat['kategorija']; ?></p>
        </div>
        <p><?php echo $projekat['tekst']; ?></p>
    </div>
</article>
<?php endforeach; ?> 