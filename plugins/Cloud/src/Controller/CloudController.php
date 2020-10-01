<?php
declare(strict_types=1);

namespace Cloud\Controller;

class CloudController extends AppController
{
    public function index()
    {
        $config_path = ROOT . '/plugins/Cloud/config/';
        $txt_path = ROOT . '/tmp';
        $img_path = ROOT . '/tmp';
        shell_exec("wordcloud_cli --text $txt_path/projeto-inter-regionais.txt --stopwords $config_path/stopwords/stopwords-pt-br.txt --imagefile $img_path/projeto-inter-regionais.png --fontfile $config_path/fonts/Pacifico.ttf --width=1024 --height=720");
    }
}