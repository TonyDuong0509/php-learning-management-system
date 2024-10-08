<?php require ABSPATH . 'resources/user/layout/header.php'; ?>

<section class="breadcrumb-area section-padding img-bg-2">
  <div class="overlay"></div>
  <div class="container">
    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
      <div class="section-heading">
        <h2 class="section__title text-white">All Blog Posts</h2>
      </div>
      <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
        <li><a href="index.html">Home</a></li>
        <li>Blog Posts</li>
        <li>All</li>
      </ul>
    </div><!-- end breadcrumb-content -->
  </div><!-- end container -->
</section><!-- end breadcrumb-area -->

<section class="blog-area section--padding">
  <div class="container">
    <div class="row">

      <?php if (!empty($blogPosts)): ?>
        <?php foreach ($blogPosts as $blogPost): ?>
          <div class="col-lg-4">
            <div class="card card-item">
              <div class="card-image">
                <a href="/blog/details/<?php echo $blogPost->getPostSlug(); ?>" class="d-block">
                  <img style="width: 100%; height: 250px;" class="card-img-top lazy" src="/<?php echo $blogPost->getPostImage(); ?>" data-src="images/img8.jpg" alt="Card image cap">
                </a>
                <div class="course-badge-labels">
                  <div class="course-badge"><?php echo $blogPost->getCreatedAt(); ?></div>
                </div>
              </div><!-- end card-image -->
              <style>
                .giveMeEllipsis {
                  overflow: hidden;
                  text-overflow: ellipsis;
                  display: -webkit-box;
                  -webkit-box-orient: vertical;
                  -webkit-line-clamp: 1;
                  line-height: X;
                  max-height: X*N;
                }
              </style>
              <div class="card-body">
                <h5 class="card-title giveMeEllipsis"><a href="/blog/details/<?php echo $blogPost->getPostSlug(); ?>"><?php echo $blogPost->getPostTitle(); ?></a></h5>
                <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center flex-wrap fs-14 pt-2">
                  <li class="d-flex align-items-center">By<a href="#">TechyDevs</a></li>
                  <li class="d-flex align-items-center"><a href="#">4 Comments</a></li>
                  <li class="d-flex align-items-center"><a href="#">130 Likes</a></li>
                </ul>
                <div class="d-flex justify-content-between align-items-center pt-3">
                  <a href="/blog/details/<?php echo $blogPost->getPostSlug(); ?>" class="btn theme-btn theme-btn-sm theme-btn-white">Read More <i class="la la-arrow-right icon ml-1"></i></a>
                  <div class="share-wrap">
                    <ul class="social-icons social-icons-styled">
                      <li class="mr-0"><a href="#" class="facebook-bg"><i class="la la-facebook"></i></a></li>
                      <li class="mr-0"><a href="#" class="twitter-bg"><i class="la la-twitter"></i></a></li>
                      <li class="mr-0"><a href="#" class="instagram-bg"><i class="la la-instagram"></i></a></li>
                    </ul>
                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer share-toggle" title="Toggle to expand social icons"><i class="la la-share-alt"></i></div>
                  </div>
                </div>
              </div><!-- end card-body -->
            </div><!-- end card -->
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

    </div><!-- end row -->
    <div class="text-center pt-3">
      <nav aria-label="Page navigation example" class="pagination-box">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
      <p class="fs-14 pt-2">Showing 1-6 of 56 results</p>
    </div>
  </div><!-- end container -->
</section><!-- end blog-area -->

<?php require ABSPATH . 'resources/user/layout/footer.php'; ?>

<!-- start scroll top -->
<div id="scroll-top">
  <i class="la la-arrow-up" title="Go top"></i>
</div>

<?php require ABSPATH . 'resources/user/layout/footerScript.php'; ?>
</body>

</html>