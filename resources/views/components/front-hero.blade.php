<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1 class="heading" data-aos="fade-up">
                        Logic and the Art of Harmonious Collaboration.
                    </h1>
                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                        vulputate velit imperdiet
                        dolor tempor tristique.</p>
                    <form action="{{ route('article_search') }}" method="POST"
                        class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                        data-aos-delay="200">
                        @csrf
                        <input type="text" name="keywords" class="form-control px-4"
                            placeholder="Explore articles by topic, e.g. Technology, Health" />
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{ asset('assets/front/images/couch.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>