<div class="customer-details mt-4">
    <h4><?= esc($customer['first_name']) ?> <?= esc($customer['last_name']) ?></h4>
    <p>ID: <?= esc($customer['identification_number']) ?></p>
    
    <?= $this->include('customers/_rating_form') ?>
    <?= $this->include('customers/_rating_history') ?>
</div>