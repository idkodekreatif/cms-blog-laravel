<footer class="footer-section">
    <div class="container relative">

        <div class="sofa-img mb-4">
            <img src="{{ asset('assets/front/images/footer.png') }}" alt="Image" class="img-fluid">
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="subscription-form">
                    <h3 class="d-flex align-items-center mb-3">
                        <span class="me-1">
                            <img src="{{ asset('assets/front/images/envelope-outline.svg') }}" alt="Image"
                                class="img-fluid">
                        </span>
                        <span>Subscribe to Newsletter</span>
                    </h3>

                    <form action="#" class="row g-3">
                        <div class="col-12 col-md-auto mb-3">
                            <input type="text" class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="col-12 col-md-auto mb-3">
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="col-12 col-md-auto mb-3">
                            <button class="btn btn-primary w-100" type="submit">
                                <span class="fa fa-paper-plane"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="mb-4 footer-logo-wrap"><a href="{{ url('/') }}" class="footer-logo"><img class="logo-img"
                            src="{{ asset('assets/img/logo-back.png') }}" alt="Logo" /></a>
                </div>
                <p class="mb-4">Kode kreatif menggabungkan kecerdasan teknis dengan keindahan artistik, menghasilkan
                    solusi pemrograman yang tak hanya
                    efisien, melainkan juga menginspirasi dan memperkaya pengalaman pengguna.</p>

                <ul class="list-unstyled custom-social">
                    <li><a href="https://twitter.com/idkodekreatif" target="_blank"><span
                                class="fa fa-brands fa-twitter"></span></a></li>
                    <li><a href="https://instagram.com/idkodekreatif" target="_blank"><span
                                class="fa fa-brands fa-instagram"></span></a></li>
                    <li><a href="https://linkedin.com/idkodekreatif" target="_blank"><span
                                class="fa fa-brands fa-linkedin"></span></a></li>
                    <li><a href="https://github.com/idkodekreatif" target="_blank"><span
                                class="fa fa-brands fa-github"></span></a></li>
                </ul>
            </div>

            <div class="col-lg-8">
                <div class="row links-wrap justify-content-end">
                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            {{-- <li><a href="Javascript:void(0)">About us</a></li> --}}
                            <li><a href="{{ route('article') }}">Blog</a></li>
                            <li><a href="{{ route('portofolio') }}">Portofolio</a></li>
                            <li><a href="{{ route('contact_as') }}">Contact us</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="Javascript:void(0)">Support</a></li>
                            <li><a href="Javascript:void(0)">Privacy Policy</a></li>
                            <li><a href="Javascript:void(0)">Services</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6">
                    <p class="mb-2 text-center text-lg-start">Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Code Creatif&trade;. All Rights Reserved.
                    </p>
                </div>

                <div class="col-lg-6 text-center text-lg-end">
                    <ul class="list-unstyled d-inline-flex ms-auto">
                        <li class="me-4"><a href="Javascript:void(0)">Terms &amp; Conditions</a></li>
                        <li><a href="Javascript:void(0)">Privacy Policy</a></li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
</footer>