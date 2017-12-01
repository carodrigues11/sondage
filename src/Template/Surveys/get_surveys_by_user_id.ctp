<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Survey[]|\Cake\Collection\CollectionInterface $surveys
 */
$title = 'Accueil';
$this->assign('title',$title);
?>

<div class="surveys index large-9 medium-8 columns content">
    <h3><?= __('Liste des sondages') ?></h3>
    <div>
        <ul>
            <li><?= $this->Paginator->sort('id') ?></li>
            <li><?= $this->Paginator->sort('user_id') ?></li>
            <li><?= $this->Paginator->sort('question') ?></li>
            <li><?= $this->Paginator->sort('created') ?></li>
            <li><?= $this->Paginator->sort('modified') ?></li>
            <li><?= __('Actions') ?></li>
        </ul>
    </div>
    <?php foreach ($surveys as $survey): ?>
    <div class="survey">
        <div class="question">
          <p>#<?= $this->Number->format($survey->id) ?> - <?= h($survey->question) ?></p>
          <ul>
              <li>Réponse 1
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <button type="button" class="btn btn-danger"><?= __('Voter') ?></button>
              </li>
              <li>Réponse 2
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>            
                  <button type="button" class="btn btn-danger"><?= __('Voter') ?></button>
              </li>
              <li>Réponse 3
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <button type="button" class="btn btn-danger"><?= __('Voter') ?></button>
              </li>
          </ul>
        <p class="meta">
            <?= __('créé par') ?> <?= $survey->has('user') ? $this->Html->link($survey->user->nickname, ['controller' => 'Users', 'action' => 'view', $survey->user->id]) : '' ?>,
            <?= __('le') ?> <?= h($this->Time->format($survey->created,'dd/MM/yyyy')) ?>
        </p>

        <td><?= h($survey->modified) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $survey->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $survey->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $survey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $survey->id)]) ?>
        </td>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
