<div class="rating-section mt-4">
    <h5>Rate this customer</h5>
    <form id="ratingForm">
        <?= csrf_field() ?>
        <input type="hidden" name="customer_id" value="<?= $customer['id'] ?>">
        <div class="stars mb-3">
            <?php for($i = 1; $i <= 5; $i++): ?>
                <input type="radio" name="rating" value="<?= $i ?>" id="star<?= $i ?>">
                <label for="star<?= $i ?>">★</label>
            <?php endfor; ?>
        </div>
        <div class="mb-3">
            <textarea class="form-control" name="comment" rows="3" 
                      placeholder="Add a comment (optional)"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Rating</button>
    </form>
</div>