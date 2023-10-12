<ul class="flickr-photos">
    @foreach ($galleries as $gallery)
        <li>
            <a href="#"><img class="img-responsive" src="{{ asset('uploads/frontend/' . $gallery->image_path) }}"
                    alt="flickr"></a>
        </li>
    @endforeach
</ul>
