<?php require ABSPATH . 'resources/admin/layout/sidebar.php'; ?>

<?php require ABSPATH . 'resources/admin/layout/header.php'; ?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Orders</p>
                                <h4 class="my-1 text-info">4805</h4>
                                <p class="mb-0 font-13">+2.5% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Revenue</p>
                                <h4 class="my-1 text-danger">$84,245</h4>
                                <p class="mb-0 font-13">+5.4% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-wallet'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Bounce Rate</p>
                                <h4 class="my-1 text-success">34.6%</h4>
                                <p class="mb-0 font-13">-4.5% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Customers</p>
                                <h4 class="my-1 text-warning">8.4K</h4>
                                <p class="mb-0 font-13">+8.4% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Recent Orders</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Photo</th>
                                <th>Product ID</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Shipping</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Iphone 5</td>
                                <td><img src="<?php ABSPATH ?>/public/backend/images/products/01.png" class="product-img-2" alt="product img"></td>
                                <td>#9405822</td>
                                <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Paid</span></td>
                                <td>$1250.00</td>
                                <td>03 Feb 2020</td>
                                <td>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Earphone GL</td>
                                <td><img src="<?php ABSPATH ?>/public/backend/images/products/02.png" class="product-img-2" alt="product img"></td>
                                <td>#8304620</td>
                                <td><span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span></td>
                                <td>$1500.00</td>
                                <td>05 Feb 2020</td>
                                <td>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>HD Hand Camera</td>
                                <td><img src="<?php ABSPATH ?>/public/backend/images/products/03.png" class="product-img-2" alt="product img"></td>
                                <td>#4736890</td>
                                <td><span class="badge bg-gradient-bloody text-white shadow-sm w-100">Failed</span></td>
                                <td>$1400.00</td>
                                <td>06 Feb 2020</td>
                                <td>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 70%"></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Clasic Shoes</td>
                                <td><img src="<?php ABSPATH ?>/public/backend/images/products/04.png" class="product-img-2" alt="product img"></td>
                                <td>#8543765</td>
                                <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Paid</span></td>
                                <td>$1200.00</td>
                                <td>14 Feb 2020</td>
                                <td>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Sitting Chair</td>
                                <td><img src="<?php ABSPATH ?>/public/backend/images/products/06.png" class="product-img-2" alt="product img"></td>
                                <td>#9629240</td>
                                <td><span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span></td>
                                <td>$1500.00</td>
                                <td>18 Feb 2020</td>
                                <td>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Hand Watch</td>
                                <td><img src="<?php ABSPATH ?>/public/backend/images/products/05.png" class="product-img-2" alt="product img"></td>
                                <td>#8506790</td>
                                <td><span class="badge bg-gradient-bloody text-white shadow-sm w-100">Failed</span></td>
                                <td>$1800.00</td>
                                <td>21 Feb 2020</td>
                                <td>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 40%"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end page wrapper -->

<?php require ABSPATH . 'resources/admin/layout/footer.php'; ?>

</div>
<!--end wrapper-->


<!-- search modal -->
<div class="modal" id="SearchModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header gap-2">
                <div class="position-relative popup-search w-100">
                    <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
                    <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
                </div>
                <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="search-list">
                    <p class="mb-1">Html Templates</p>
                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
                    </div>
                    <p class="mb-1 mt-3">Web Designe Company</p>
                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4'></i>Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
                    </div>
                    <p class="mb-1 mt-3">Software Development</p>
                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
                    </div>
                    <p class="mb-1 mt-3">Online Shoping Portals</p>
                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search modal -->

<?php require ABSPATH . 'resources/admin/layout/footerScript.php'; ?>

<script>
    new PerfectScrollbar(".app-container")
</script>
</body>

</html>