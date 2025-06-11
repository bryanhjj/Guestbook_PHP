<h2>Edit an entry</h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<div class="form-container">
    <form action="/edit" method="post">
        <?= csrf_field() ?>

        <label for="guestName">Guest name</label>
        <input type="input" name="guestName" class="inp" value="<?= $entryData['guestName']?>">
        <br>

        <label for="content">Comment</label>
        <textarea name="content" cols="45" class="inp" rows="4"><?= $entryData['content']?></textarea>
        <br>

        <input type="hidden" name="id" value="<?= $entryData['id']?>">

        <input type="submit" name="submit" value="Edit guestbook entry">
    </form>
</div>