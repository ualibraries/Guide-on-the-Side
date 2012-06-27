
<?php if ($this->Paginator->hasPage(null, 2)): ?>
<div class="paging">
  <?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled')) ?>
  |
  <?php echo $this->Paginator->numbers() ?>
  |
  <?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled')) ?>
</div>
<?php endif ?>