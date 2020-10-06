<head><title>Grupos Google Meet</title></head>

<?php

    foreach($groups as $gk => $gv) {
        if ($class != 'geral') {
            $link = "<a href=\"http://".$class ."grupo". $gk ."treinamentopfle.fergs.org.br" . "\">" .$class ."grupo". $gk ."treinamentopfle.fergs.org.br</a>";
        } else {
            $link = "<a href=\"http://grupo". $gk ."treinamentopfle.fergs.org.br" . "\">grupo". $gk ."treinamentopfle.fergs.org.br</a>";
        }
        echo "GRUPO $gk - $link:<BR>";
        foreach($gv as $mk => $mv) {
            echo "- $mv<BR>";
        }
        echo "<BR>";
    }

?>