<ul class="flickr-photos">
    @foreach ($galleries as $gallery)
        {{-- <li>
            <a href="#"><img class="img-responsive" src="{{ asset('uploads/frontend/' . $gallery->image_path) }}"
                    alt="flickr"></a>
        </li> --}}
        <div class="col-md-4">
            <a href="{{ asset('uploads/frontend/' . $gallery->image_path) }}" data-lightbox="image">
                <img src="{{ asset('uploads/frontend/' . $gallery->image_path) }}" alt="Bronze Time Hotel"
                    height="200px" />
            </a>
        </div>
    @endforeach
</ul>
