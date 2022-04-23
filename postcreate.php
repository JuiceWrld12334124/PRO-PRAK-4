<?php
declare(strict_types=1);
require __DIR__.'/views/header.php';
?>
<main class="container grid grid-1">
  <?php if (isset($_SESSION['userid'])): ?>
    <form name="postForm" class="card text-center"  onsubmit="return false;">
      <div class="form-group">
        <label for="formGroupTitle">Title</label>
        <input type="text" class="form-control" id="formGroupTitle" placeholder="Jouw titel" name="postTitle" required>
      </div>
      <div class="form-group">
        <label for="formGroupLink">Link</label>
        <input type="text" class="form-control" id="formGroupLink" placeholder="Website link" name="website">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Text</label>
        <textarea rows="4" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Mooi verhaaltje" name="postText" required></textarea>
      </div>
      <div class="form-group">
            <label for="Foto">Foto</label>
            <input name="picture_url" type="file" class="form-control" id="updatebanner"  placeholder="Select file" accept="image/*"> 
        </div>
      <input type="hidden" name="postAuthor" value="<?php echo $_SESSION['userid']; ?>">
      <input type="submit" name="postSubmit" value="Post" class="btn btn-primary">
    </form>
    <script src="assets/scripts/posts.js" charset="utf-8"></script>
    <?php
  endif; ?>
</main>

<?php require __DIR__.'/views/footer.php'; ?>
