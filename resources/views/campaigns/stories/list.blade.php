<section id="section-story" class="section-story">
    <div class="container">
        <ul class="photo-slider">
            @foreach(array_chunk($listStories, 6) as $stories)
                <li class="photo-item">
                    @foreach($stories as $key => $story)
                        <div class="image-story">
                            <div class="image">
                                <img src="{{ in_array($key, [1,2,5]) ? asset("assets/images/Asset2.png") : asset("assets/images/Asset1.png") }}" alt="animal">
                            </div>
                            <div class="info" data-modal="true">
                                <h3>{{$story->user->name}}</h3>
                                <h4>{{$story->title}}</h4>
                                <p>{{ $story->content }}</p>
                                <span class="btn-more modal-toggle">
                                    <a data-fancybox data-src="#modal-{{$story->id}}" href="javascript:;" class="btn btn-primary">More</a>
                                </span>
                                <div style="display: none;" id="modal-{{$story->id}}">
                                  <h3>{{$story->user->name}}</h3>
                                  <h4>{{$story->title}}</h4>
                                  <p>{{ $story->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </li>
            @endforeach
        </ul>
    </div>
</section>
