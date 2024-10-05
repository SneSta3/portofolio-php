<?php 

function debagovanje($parametar) {
    echo "<pre>";
    print_r($parametar);
    echo "</pre>";
}

//funkcija za citanje fajla works.txt
function ocitaj_works_text_file() {
    return file_get_contents('baza/works.txt');
}

function normalizacija_podataka($podaci ) {
    $prelomi_works = explode('//////////', $podaci);
    //debagovanje($prelomi_works);
    unset($prelomi_works[0]);
    //debagovanje($prelomi_works);

    $novi_red_formatiran = [];
    foreach ($prelomi_works as $novi_red) {
        //debagovanje($novi_red);
        $novi_red_razbijen = explode(PHP_EOL, $novi_red);
        //debagovanje($novi_red_razbijen);
        $novi_red_razbijen = array_filter($novi_red_razbijen);
        //debagovanje($novi_red_razbijen);
        //debagovanje(normalizacija_redova($novi_red_razbijen[1]));
        //debagovanje(normalizacija_redova($novi_red_razbijen[2]));
        //debagovanje(normalizacija_redova($novi_red_razbijen[3]));
        //debagovanje(normalizacija_redova($novi_red_razbijen[4]));
        //debagovanje(normalizacija_redova($novi_red_razbijen[5]));
        //debagovanje(normalizacija_redova($novi_red_razbijen[6]));
        $works_id = normalizacija_redova($novi_red_razbijen[1]);
        $works_slika = normalizacija_redova($novi_red_razbijen[2]);
        $works_naslov = normalizacija_redova($novi_red_razbijen[3]);
        $works_datum = normalizacija_redova($novi_red_razbijen[4]);
        $works_kategorija = normalizacija_redova($novi_red_razbijen[5]);
        $works_tekst = normalizacija_redova($novi_red_razbijen[6]);
        //debagovanje($works_id);
        //debagovanje($works_slika);
        //debagovanje($works_naslov);
        //debagovanje($works_datum);
        //debagovanje($works_kategorija);
        //debagovanje($works_tekst);
        $red_podaci = [
            'id' => $works_id,
            'slika' => $works_slika,
            'naslov' => $works_naslov,
            'datum' => $works_datum,
            'kategorija'=> $works_kategorija,
            'tekst'=> $works_tekst
        ];
        //debagovanje($red_podaci);
        $novi_red_formatiran[] = $red_podaci;
    }
    //debagovanje($novi_red_formatiran);
    return $novi_red_formatiran;
    
}    

function normalizacija_redova($podaci_red) {
    $normalizuj_podatke = ['ID:', 'Slika:','Naslov:','Datum:','Kategorija:','Tekst:'];
    $red = str_replace($normalizuj_podatke, '', $podaci_red);
    $red = trim($red);
    return $red;
}

//funkcije za izlistavanje podataka
function izlistaj_sve_projekte() {
    $works_podaci = ocitaj_works_text_file();
    $works_podaci = normalizacija_podataka($works_podaci);
    //debagovanje($works_podaci);
    return $works_podaci;
}

// blog listing
// funkcija za citanje fajla posts.txt
function ocitaj_posts_text_file() {
    return file_get_contents('baza/posts.txt');

}    

function normalizacija_blog_podataka($blog_podaci) {
    $prelomi_blog = explode('//////////', $blog_podaci);
    //debagovanje($prelomi_blog);
    unset($prelomi_blog[0]);
    //debagovanje($prelomi_blog);
    $novi_red_formatiran = [];
    foreach ($prelomi_blog as $novi_red) {
        //debagovanje($novi_red);
        $novi_red_razbijen = explode(PHP_EOL, $novi_red);
        //debagovanje($novi_red_razbijen);
        $novi_red_razbijen = array_filter($novi_red_razbijen);
        //debagovanje($novi_red_razbijen);
        //debagovanje(normalizacija_blog_redova($novi_red_razbijen[1]));
        //debagovanje(normalizacija_blog_redova($novi_red_razbijen[2]));
        //debagovanje(normalizacija_blog_redova($novi_red_razbijen[3]));
        //debagovanje(normalizacija_blog_redova($novi_red_razbijen[4]));
        //debagovanje(normalizacija_blog_redova($novi_red_razbijen[5]));
        $blog_id = normalizacija_blog_redova($novi_red_razbijen[1]);
        $blog_naslov = normalizacija_blog_redova($novi_red_razbijen[2]);
        $blog_datum = normalizacija_blog_redova($novi_red_razbijen[3]);
        $blog_kategorija = normalizacija_blog_redova($novi_red_razbijen[4]);
        $blog_tekst = normalizacija_blog_redova($novi_red_razbijen[5]);
        //debagovanje($blog_id);
        //debagovanje($blog_naslov);
        //debagovanje($blog_datum);
        //debagovanje($blog_kategorija);  
        //debagovanje($blog_tekst);
        $red_podaci = [
            'id' => $blog_id,
            'naslov' => $blog_naslov,
            'datum'=> $blog_datum,  
            'kategorija'=> $blog_kategorija,
            'tekst'=> $blog_tekst
        ];
        //debagovanje($red_podaci);
        $novi_red_formatiran[] = $red_podaci;   
     }
     //debagovanje($novi_red_formatiran);
     return $novi_red_formatiran;
}


function normalizacija_blog_redova($blog_podaci_red) {
    $normalizuj_podatke = ['ID:', 'Naslov:', 'Datum:', 'Kategorija:', 'Tekst:'];
    $red = str_replace($normalizuj_podatke, '', $blog_podaci_red);
    $red = trim($red);
    return $red;
}

function izlistaj_sve_postove() {
    $blog_podaci = ocitaj_posts_text_file();
    $blog_podaci = normalizacija_blog_podataka($blog_podaci);
    //debagovanje($blog_podaci);
    return $blog_podaci;
}