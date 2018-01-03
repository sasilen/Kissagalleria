        <?php if (!empty($cat->exhibitions)): ?>
				<h4><?= __('Exhibitions') ?></h4>
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Place') ?></th>
                <th scope="col"><?= __('Ems') ?></th>
                <th scope="col"><?= __('Class') ?></th>
                <th scope="col"><?= __('Result') ?></th>
                <th scope="col"><?= __('Judge') ?></th>
<!--                <th scope="col" class="actions"><?= __('Actions') ?></th> -->
            </tr>
            <?php foreach ($cat->exhibitions as $exhibitions): ?>
            <tr>
                <td><?= h($exhibitions->name) ?></td>
                <td><?= h($exhibitions->date) ?></td>
                <td><?= h($exhibitions->place) ?></td>
                <td><?= h($exhibitions->ems) ?></td>
                <td><?= h($exhibitions->class) ?></td>
                <td><?= h($exhibitions->result) ?></td>
                <td><?= h($exhibitions->judge) ?></td>
<!--                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Exhibitions', 'action' => 'view', $exhibitions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Exhibitions', 'action' => 'edit', $exhibitions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exhibitions', 'action' => 'delete', $exhibitions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exhibitions->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>

