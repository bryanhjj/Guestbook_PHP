<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<div class="form-container">
    <form action="/records" method="post">
        <?= csrf_field() ?>

        <label for="guestName">Guest name</label>
        <input type="input" name="guestName" class="inp" value="<?= set_value('guestName') ?>">
        <br>

        <label for="content">Comment</label>
        <textarea name="content" class="inp" cols="45" rows="4"><?= set_value('content') ?></textarea>
        <br>

        <input type="submit" name="submit" value="Create new guestbook entry">
    </form>
</div>
