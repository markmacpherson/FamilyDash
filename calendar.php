<?php

$newcss = 'stylish.css';
$context = stream_context_create(array(
    'http' => array(
        'header'  => "Authorization: Basic "
    )
));
$f = file_get_contents('https://calendar.google.com/calendar/embed?title=MacPherson%20Family%20Calendar&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=764cadets%40gmail.com&amp;color=%23A32929&amp;src=bvqu3ocd07cn1nrc246h5blh08%40group.calendar.google.com&amp;color=%2329527A&amp;src=canadian__en%40holiday.calendar.google.com&amp;color=%238D6F47&amp;src=6if4he6vh0652hpilrh26ull24%40group.calendar.google.com&amp;color=%230e61b9&amp;src=cfg3lqqtemm5rh49kqke1paio0%40group.calendar.google.com&amp;color=%23b90e28&amp;ctz=America%2FHalifax',false,$context);
$counter = stripos($f,"static/");
$counter = $counter + 7;
$f = str_replace("//calendar.google.com/calendar/static/$section",$newcss,$f);
$f = str_replace('/calendar/_','https://calendar.google.com/calendar/_',$f);
$f = str_replace('<script>function _onload()', '<script>function _onload()', $f );

echo $f;
?>
