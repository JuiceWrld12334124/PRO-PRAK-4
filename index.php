<?php
declare(strict_types=1);
require __DIR__.'/views/header.php';
?>
<main class="container grid grid-1">
  <?php if (isset($_SESSION['userid'])): ?>
    <form name="postForm" class="container grid grid-1"onsubmit="return false;">


    <button class="button2"><a href="postcreate.php">Create post</a></button>

    </form>
    <script src="assets/scripts/posts.js" charset="utf-8"></script>
    <?php
  else:
    echo "<section>
            <div class='container grid grid-1'>
              <div>
                <h1 class='text-center'>Geen toegang log eerst in</h1>
              </div>
           </div>
          </section>";
  endif; ?>
</main>
<div class="row posts container grid grid-1">

</div>

<?php require __DIR__.'/views/footer.php'; ?>
<script src="assets/scripts/posts.js" charset="utf-8"></script>
