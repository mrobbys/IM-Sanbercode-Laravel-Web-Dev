<footer id="footer" class="text-center text-md-start">
    <div class="container py-5">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <div class="company-brand">
                    <img src="{{ asset('template/images/main-logo.png') }}" alt="logo" class="footer-logo mb-5">
                    <p>Portal literasi modern yang menyediakan koleksi buku terlengkap. Temukan bacaan berkualitas,
                        dan perluas wawasan bersama kami.</p>
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Pages</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="/" class="text-body">Home</a>
                    </li>
                    <li>
                        <a href="/books" class="text-body">Books</a>
                    </li>
                    <li>
                        <a href="/genres" class="text-body">Genres</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Account</h5>

                <ul class="list-unstyled mb-0">
                    @guest
                        <li>
                            <a href="/login" class="text-body">Login</a>
                        </li>
                        <li>
                            <a href="/register" class="text-body">Register</a>
                        </li>
                    @endguest
                    @auth
                        <li>
                            <a href="/profile" class="text-body">Profile</a>
                        </li>
                    @endauth

                </ul>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
</footer>

<div id="footer-bottom" class="pb-5">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <!-- Copyright Text -->
            <div class="mb-2 mb-md-0 text-center text-md-start">
                <p class="m-0">Copyright &copy; 2025 Booksaw. All rights reserved</p>
            </div>

            <!-- Social Media Links -->
            <div class="social-links">
                <ul class="list-unstyled d-flex justify-content-center justify-content-md-end mb-0">
                    <li class="ms-3">
                        <a href="https://www.facebook.com/" target="_blank" aria-label="Facebook">
                            <i class="ri-facebook-fill"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a href="https://www.instagram.com/" target="_blank" aria-label="Instagram">
                            <i class="ri-instagram-fill"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a href="https://www.youtube.com/" target="_blank" aria-label="YouTube">
                            <i class="ri-youtube-fill"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a href="https://www.linkedin.com/" target="_blank" aria-label="LinkedIn">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
