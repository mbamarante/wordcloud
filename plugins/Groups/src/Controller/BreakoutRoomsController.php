<?php
declare(strict_types=1);

namespace Groups\Controller;

use Groups\Form\SetupGroupsForm;

class BreakoutRoomsController extends AppController
{
    public function index()
    {
        $class = null;
        $count = null;
        
        if ($this->request->is(['get'])) {
            if ($this->request->getQuery('class')) {
                $class = $this->request->getQuery('class');
            }
            if ($this->request->getQuery('count')) {
                $count = $this->request->getQuery('count');
            }
        }    

        $this->set('class', $class);
        $this->set('count', $count);
    }

    public function build()
    {
        if ($this->request->is(['post', 'put'])) {
            
            $setup = new SetupGroupsForm();
            $isValid = $setup->validate($this->request->getData());
            if (!$isValid) {
                $errors = $setup->getErrors();
                foreach ($errors as $error => $e) {
                    foreach ($e as $message) {
                        $this->Flash->error($message);
                    } 
                }
            }
            
            // exit();

            $groups_count = $this->request->getData('count');
            $data = $this->request->getData('chat');
            $class = $this->request->getData('class');

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

            $this->set(compact('groups', 'class'));
        }
    }
}