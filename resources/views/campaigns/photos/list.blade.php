<section id="section-photo" class="section-photo">
{{--    list image--}}
    <div class="container">
        <ul class="photo-slider">
            @foreach(array_chunk($listPhotos, 9) as $photos)
                <li class="photo-item">
                    @foreach($photos as $photo)
                        @if(count($photo->files) !== 0 && !empty($photo->user))
                            <div class="image-photo modal-toggle">
                                <div class="image">
                                @foreach($photo->files as $file)
                                    @if($file->file_type === App\Enums\FileType::MAIN)
                                        <a class="__fancy-box" data-fancybox data-caption="<h3>{{$photo->user->name}}</h3><p>{{$photo->description}}</p>" href="{{$file->url}}">
                                    @endif
                                @endforeach
                                @foreach($photo->files as $file)
                                    @if($file->file_type != App\Enums\FileType::MAIN)
                                        <img alt="{{$photo->description}}" src="{{asset($file->url)}}" alt="desciption">
                                    @endif
                                @endforeach
                                        </a>
                                </div>
                                <div class="info">
                                    <h3>{{$photo->user->name}}</h3>
                                    <button class="btn-share share" data-campaign-id="{{ $photo->id }}">Share</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </li>
            @endforeach
        </ul>
    </div>
</section>
