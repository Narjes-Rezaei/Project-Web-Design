<style>
    .fixed-img {
        width: 200px;
        height: 250px;
        object-fit: cover;
        border-radius: 8px;
    }
</style>

<div class="container site-section" id="our" data-aos="fade-up" data-aos-duration="500">
    <div class="row" data-aos="fade-up" data-aos-duration="600">
        <div class="col-6 title-section" data-aos="fade-right" data-aos-duration="700">
            <h2 class="heading" data-aos="fade-up" data-aos-duration="800">Our Blog</h2>
        </div>
    </div>
    <div class="row">
        @foreach($ourBlogs as $ourBlog)
        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="900">
            <div class="custom-media d-flex" data-aos="fade-up" data-aos-duration="1000">
                <div class="img mr-4" data-aos="zoom-in" data-aos-duration="1100">
                    <img src="{{ asset('coverOurBlog/' . $ourBlog->image) }}" alt="Image" class="img-fluid fixed-img">
                </div>

                <div class="text" data-aos="fade-left" data-aos-duration="1200">
                    <span class="meta" data-aos="fade-up" data-aos-duration="1300">May 20, 2020</span>
                    <h3 class="mb-4" data-aos="fade-up" data-aos-duration="1400">
                        <a href="{{ $ourBlog->link }}">{{ $ourBlog->title }}</a>
                    </h3>
                    <p data-aos="fade-up" data-aos-duration="1500">{{ $ourBlog->text }}</p>
                </div>
            </div>
            <br>
        </div>
        @endforeach
    </div>
</div>
<div id="footer"></div>
