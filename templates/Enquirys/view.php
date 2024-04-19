<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<div class="row">
<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('Edit Enquiry'), ['action' => 'edit', $enquiry->enquiry_id], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Form->postLink(__('Delete Enquiry'), ['action' => 'delete', $enquiry->enquiry_id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->enquiry_id), 'class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('List Enquirys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New Enquiry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
<!--    <div class="column column-80">-->
<!--        <div class="enquirys view content">-->
<!--            <h3>--><?php //= h($enquiry->enquiry_name) ?><!--</h3>-->
<!--            <table>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Enquiry Name') ?><!--</th>-->
<!--                    <td>--><?php //= h($enquiry->enquiry_name) ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Enquiry Email') ?><!--</th>-->
<!--                    <td>--><?php //= h($enquiry->enquiry_email) ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Enquiry Message') ?><!--</th>-->
<!--                    <td>--><?php //= h($enquiry->enquiry_message) ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th>--><?php //= __('Enquiry Id') ?><!--</th>-->
<!--                    <td>--><?php //= $this->Number->format($enquiry->enquiry_id) ?><!--</td>-->
<!--                </tr>-->
<!--            </table>-->
<!--            -->
<!--            -->
<!--        </div>-->
    </div>    <div class="column column-80 text-gray-800">
        <div class="enquirys view content">
            <h3><?= h('Enquiry Information') ?></h3>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th><?= __('Enquiry Id') ?></th>
                    <td><?= $this->Number->format($enquiry->enquiry_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Name') ?></th>
                    <td><?= h($enquiry->enquiry_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Email') ?></th>
                    <td><?= $this->Number->currency($enquiry->enquiry_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Message') ?></th>
                    <td><?= h($enquiry->enquiry_message) ?></td>
                </tr>
            </table>


</div>
