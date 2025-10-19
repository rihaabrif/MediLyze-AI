    </main> <!-- End Main Content -->

    <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
    <!-- SOS Button -->
    <a href="tel:1990" class="btn btn-danger btn-lg rounded-circle position-fixed shadow d-flex align-items-center justify-content-center" id="sos-button">
        <strong class="small">SOS</strong>
    </a>

    <!-- Bottom Navigation for Mobile -->
    <nav class="navbar navbar-light bg-white fixed-bottom d-lg-none border-top shadow-lg">
        <div class="container-fluid">
            <ul class="navbar-nav flex-row justify-content-around w-100">
                 <?php foreach ($nav_items as $url => $item): ?>
                    <li class="nav-item">
                        <a href="<?= $url ?>" class="nav-link text-center <?= ($current_page == $url) ? 'active' : '' ?>">
                            <i class="bi <?= $item['icon'] ?> fs-4"></i>
                            <small class="d-block"><?= $item['text'] ?></small>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
    <?php endif; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>

