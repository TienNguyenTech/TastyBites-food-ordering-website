<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Database\StatementInterface $error
 * @var string $message
 * @var string $url
 */
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.php');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
    <strong>SQL Query Params: </strong>
    <?php Debugger::dump($error->params) ?>
<?php endif; ?>

<?php
    echo $this->element('auto_table_warning');

    $this->end();
endif;
?>
<h2>Error 404: Page not found</h2>
<p class="error">
    <strong><?= __d('cake', 'Error 404') ?>: </strong>
    <?= __d('cake', 'This page could not be found or does not exist.', "<strong>'{$url}'</strong>") ?>
</p>

