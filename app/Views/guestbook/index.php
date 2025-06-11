<h2>Comments from guests :</h2>

<?php if ($records_list !== []): ?>

    <?php foreach ($records_list as $record_item): ?>

        <div class="record-container">
            <h3 class="g-name"><?= esc($record_item['guestName']) ?></h3>
            <p class="g-content"><?= esc($record_item['content']) ?></p>
            <p><a href="/edit/<?= esc($record_item['id'], 'url') ?>">Edit</a></p>
            <p><a onclick="return confirm('Are you sure you want to delete this entry?');" href="/delete/<?= esc($record_item['id'], 'url') ?>">Delete</a></p>
        </div>


    <?php endforeach ?>

<?php else: ?>

    <h3>Nothing here ...</h3>

<?php endif ?>

<div class="new-container">
    <a href="/new">
        <button class="new-btn">Leave a comment</button>
    </a>
</div>
