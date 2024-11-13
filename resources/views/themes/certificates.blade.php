<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="certificate-gallery">
                @foreach ($certificates as $certificate)
                    <div class="certificate-item">
                    
                        <a href="{{ RvMedia::getImageUrl($certificate->image_url) }}" data-fslightbox="certificate-gallery" title="{{ $certificate->title }}">
                            <img src="{{ RvMedia::getImageUrl($certificate->image_url) }}" alt="{{ $certificate->title }}" class="certificate-image">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>