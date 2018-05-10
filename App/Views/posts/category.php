<!-- Category Content -->
<div class="container">
    <h1 class="title-id"><?= $category->title ?></h1>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <?php foreach($articles as $post): ?>
          <div class="post-preview">
            <a href="<?= htmlspecialchars($post->url); ?>">
              <h2 class="post-title"><?= htmlspecialchars($post->title); ?></h2>
            </a>
            <p class="post-meta"><?= htmlspecialchars($posts->category); ?></p>
          </div>
          <hr>
        <?php endforeach; ?>
        </div>
        <div class="col-md-4">
            <h2 class="title-id">Catégouries</h2>
               <ul>
                   <?php foreach($categories as $category): ?>
                      <li <i>class="fas fa-book"></i><a href="<?= htmlspecialchars($category->url); ?>"><?= htmlspecialchars($category->title); ?></a></li>
                   <?php endforeach ?>
               </ul>
        </div>
    </div>
</div>
<!-- end Category Content -->