
</div> <!-- /.container from header or page content -->

<!-- FOOTER -->
<footer class="mt-5" style="background-color:#111; color:#fff; padding:60px 0;">
    <div class="container">

        <div class="row text-center text-md-start align-items-center">

            <!-- Company Info -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h5 class="fw-bold text-accent">🚚 Cargo Nest</h5>
                <p style="color:#b0b0b0; opacity:0.85;">
                cargo nest management platform. Send, track, and manage parcels easily with our secure system.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-3 mb-4 mb-md-0">
                <h6 class="fw-bold text-white">Quick Links</h6>
                <ul class="list-unstyled" style="color:#b0b0b0; opacity:0.85;">

                    <li>
                        <a href="/courier_managment_system/index.php" class="footer-link">Home</a>
                    </li>

                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <!-- Logged Out -->
                        <li>
                            <a href="/courier_managment_system/auth/login.php" class="footer-link">Login</a>
                        </li>
                        <li>
                            <a href="/courier_managment_system/auth/register.php" class="footer-link">Register</a>
                        </li>
                    <?php else: ?>
                        <!-- Logged In -->
                        <li>
                            <a href="/courier_managment_system/dashboard.php" class="footer-link">Dashboard</a>
                        </li>
                        <li>
                            <a href="/courier_managment_system/auth/logout.php" class="footer-link">Logout</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <!-- Social -->
            <div class="col-md-3 text-center text-md-end">
                <h6 class="fw-bold text-white">Follow Us</h6>

                <a href="https://www.facebook.com/" target="_blank"
                   class="text-accent fs-5 me-2 social-icon">
                    <i class="bi bi-facebook"></i>
                </a>

                <a href="https://twitter.com/" target="_blank"
                   class="text-accent fs-5 me-2 social-icon">
                    <i class="bi bi-twitter"></i>
                </a>

                <a href="https://www.linkedin.com/" target="_blank"
                   class="text-accent fs-5 me-2 social-icon">
                    <i class="bi bi-linkedin"></i>
                </a>

                <a href="https://www.instagram.com/" target="_blank"
                   class="text-accent fs-5 social-icon">
                    <i class="bi bi-instagram"></i>
                </a>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="text-center small" style="color:#b0b0b0; opacity:0.85;">
            &copy; 2026 Cargo Nest. All rights reserved.
        </div>

    </div>
</footer>

<!-- Footer Custom Styles -->
<style>
.text-accent { color: #ff4b2b !important; }

.footer-link {
    color: #b0b0b0;
    text-decoration: none;
    display: inline-block;
    margin-bottom: 6px;
    transition: color 0.3s, transform 0.3s;
}
.footer-link:hover {
    color: #ff4b2b;
    transform: translateX(4px);
}

.social-icon {
    display: inline-block;
    transition: all 0.3s;
}
.social-icon:hover {
    transform: scale(1.2);
    color: #ff4b2b;
}
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
