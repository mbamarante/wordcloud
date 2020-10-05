<?php
declare(strict_types=1);

namespace Groups\Controller;

class BreakoutRoomsController extends AppController
{
    public function index()
    {
      
    }

    public function build()
    {
        if ($this->request->is(['post', 'put'])) {
            $groups_count = $this->request->getData('count');
            $data = $this->request->getData('chat');

            $re = '/^.*\b:\b.*\n([^\n]*)/m';
            $subst = '\\1';
            $result = preg_replace($re, $subst, $data);

            $persons = [];
            foreach(preg_split("/((\r?\n)|(\r\n?))/", $result) as $line){
                if (strlen(trim($line)) > 0) {
                    $persons[$line] = $line;
                }
            } 

            $groups = [];
            $group = 1;
            foreach ($persons as $k => $v) {
                if (!key_exists($group, $groups)) {
                    $groups[$group] = [];
                }
                array_push($groups[$group], $v);
                $group++;
                if ($group > $groups_count) {
                    $group = 1;
                }
            } 

            $this->set(compact('groups'));
        }
    }
}