<h1>Recover your password</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email', ['type' => 'email']); ?>
<?= $this->Form->button('recover') ?>
<?= $this->Form->end() ?>