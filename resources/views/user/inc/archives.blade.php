@foreach ($archives as $a)    
    <div class="col-md-4 mb-2 archive row container">
        <div class="header bg-info text-center font-play" style="max-height: 20px;">
            {{ $a->name }}
        </div>
        <?php $posts=$a->posts ?>
        @foreach ($posts as $post)
            <div class="col-md-4 mb-3 mr-1" style="border: 1px solid #ddd; border-radius: 5px;">
                <div class="row">
                    <img class="img rounded w-100" style="height: 25% !important; max-height: 25% !important;" src="{{ asset('user/images/uploads/post/'.$post->image) }}" alt="Failed to load image">
                    <br>
                    <br>
                    <div class="text-area col-xs-6 text-center">
                        <p class="font-shondip font-slipi"><a href="{{ url('posts/' . $post->title) }}">{{ $post->title }}</a></p>
                    </div>
                </div>    
            </div>
        @endforeach
        
    </div>

@endforeach
    <div style="width: 10px;"></div>
    
</div>