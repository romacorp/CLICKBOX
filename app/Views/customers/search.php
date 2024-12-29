<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Customer Search</h3>
                </div>
                <div class="card-body">
                    <?= $this->include('components/alerts') ?>
                    
                    <form action="/customers/search" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="identification" 
                                   placeholder="Enter customer identification number" 
                                   value="<?= esc($this->request->getGet('identification')) ?>">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>

                    <?php if (isset($customer) && $customer): ?>
                        <?= $this->include('customers/_customer_details') ?>
                    <?php elseif ($this->request->getGet('identification')): ?>
                        <div class="alert alert-info mt-3">
                            No customer found with the provided identification number.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>