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
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Cole as mensagens do chat do Google Meet:') ?></legend>
                <?php
                    echo $this->Form->textarea('chat');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Gerar Nuvem de Palavras')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>