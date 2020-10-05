<head><title>Grupos Google Meet</title></head>

<?php

    foreach($groups as $gk => $gv) {
        echo "GRUPO $gk:<BR>";
        foreach($gv as $mk => $mv) {
            echo "- $mv<BR>";
        }
        echo "<BR>";
    }

?>