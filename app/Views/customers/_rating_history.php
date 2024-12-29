<?php if (!empty($ratings)): ?>
    <div class="ratings-history mt-4">
        <h5>Rating History</h5>
        <?php foreach($ratings as $rating): ?>
            <div class="rating-item border-bottom py-2">
                <div class="stars">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <span class="star <?= $i <= $rating['rating'] ? 'filled' : '' ?>">★</span>
                    <?php endfor; ?>
                </div>
                <p class="mb-1"><?= esc($rating['comment']) ?></p>
                <small class="text-muted">
                    By <?= esc($rating['username']) ?> on 
                    <?= date('M d, Y', strtotime($rating['created_at'])) ?>
                </small>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>