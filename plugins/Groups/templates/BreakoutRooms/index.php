<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Game $game
 */
?>
<style>
textarea {
  width: 100%;
  height: 300px;
}
</style>
<div class="row">
    <div class="column-responsive column-80">
        <div class="games form content">
            <?= $this->Form->create(null, ['url' => ['action' => 'build']]) ?>
            <fieldset>
                <?php
                    echo $this->Form->label('Quantidade de grupos');
                    echo $this->Form->number('count');
                    echo $this->Form->label('Cole as mensagens do chat do Google Meet');
                    echo $this->Form->textarea('chat');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Dividir grupos')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>