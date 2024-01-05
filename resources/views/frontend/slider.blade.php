<div class="slider1-area overlay-default">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider-3" class="slides" style="max-height: 450px; object-fit: cover;">
            @foreach ($sliders as $key => $slider)
                <img src="{{ asset('uploads/frontend/' . $slider->image) }}" alt="slider"
                    title="#slider-direction-{{ $key + 1 }}" style="max-height: 450px" />
            @endforeach
        </div>
        @foreach ($sliders as $key => $slider)
            <div id="slider-direction-{{ $key + 1 }}" class="t-cn slider-direction">
                <div class="slider-content s-tb slide-{{ $key + 1 }}">
                    <div class="title-container s-tb-c">
                        <div class="title1" style="margin-top: 5em!important;">{{ $slider->title }}</div>
                        <p>{{ $slider->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
