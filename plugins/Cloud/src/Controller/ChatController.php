<?php
declare(strict_types=1);

namespace Cloud\Controller;

class ChatController extends AppController
{
    public function index()
    {
        $txt_path = ROOT . '/tmp';

        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->getData('chat');

            $re = '/^.*\b:\b.*\n([^\n]*)/m';
            $subst = '\\1';
            $result = preg_replace($re, $subst, $data);

            file_put_contents("$txt_path/chat.txt", strtolower($result));
            $this->redirect(['action' => 'build']);
        }        
    }

    public function build()
    {
        $this->viewBuilder()->disableAutoLayout();
        
        $config_path = ROOT . '/plugins/Cloud/config/';
        $txt_path = ROOT . '/tmp';
        $img_path = ROOT . '/webroot/img/cloud';
        
        $output = shell_exec("python3 -m wordcloud \
            --text $txt_path/chat.txt \
            --stopwords $config_path/stopwords/stopwords-pt-br.txt \
            --relative_scaling 0 \
            --imagefile $img_path/chat.png \
            --background white \
            --fontfile $config_path/fonts/Pacifico.ttf \
            --width=1024 \
            --height=720  2>&1"
        );

        debug($output);
    }
}