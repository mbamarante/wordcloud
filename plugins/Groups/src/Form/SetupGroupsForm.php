<?php

namespace Groups\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class SetupGroupsForm extends Form
{
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('class', ['type' => 'string'])
            ->addField('count', ['type' => 'number'])
            ->addField('chat', ['type' => 'text']);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->requirePresence('class')
            ->notEmptyString('class', 'Informe a turma');

        $validator->requirePresence('count')
            ->notEmptyString('count', 'Informe a quantidade de grupos desejada');

        $validator->requirePresence('chat')
            ->notEmptyString('chat', 'Informe as mensagens do chat');

        return $validator;
    }
}