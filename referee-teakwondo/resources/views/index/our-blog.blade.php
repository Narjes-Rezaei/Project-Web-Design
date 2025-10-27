        <div class="container site-section">
            <div class="row">
                <div class="col-6 title-section">
                    <h2 class="heading">Our Blog</h2>
                </div>
            </div>
            <div class="row">
                @foreach($ourBlogs as $ourBlog)
                <div class="col-lg-6">
                    <div class="custom-media d-flex">
                        <div class="img mr-4">
                            <img src="{{ asset('coverOurBlog/' . $ourBlog->image) }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="text">
                            <span class="meta">May 20, 2020</span>
                            <h3 class="mb-4"><a href="{{ $ourBlog->link }}">{{ $ourBlog->title }}</a></h3>
                            <p>{{ $ourBlog->text }}</p>
                            <p><a href="#">Read more</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>