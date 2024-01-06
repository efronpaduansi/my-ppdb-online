<ul class="flickr-photos">
    @foreach ($galleries as $gallery)
        <div class="col-md-3 justify-content-center text-center">
            <a href="{{ asset('uploads/frontend/' . $gallery->image_path) }}" data-lightbox="image">
                <img src="{{ asset('uploads/frontend/' . $gallery->image_path) }}" alt="PPDB Online"
                    height="200px" />
            </a>
        </div>
    @endforeach
</ul>
