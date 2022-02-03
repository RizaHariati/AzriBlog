 <div class="card border-secondary p-0 mt-3 bg-white  ">
   @if ($posts[0]->image)
     <img class="card-img-top w-100" height="350px" width="1000px"
       style="object-fit: cover" src="{{ asset('/storage/' . $posts[0]->image) }}"
       alt="{{ $posts[0]->category->slug }}">
   @else
     <img class="card-img-top w-100 d-sm-none d-md-block"
       src="http://source.unsplash.com/1000x300/?{{ $posts[0]->category->slug }}"
       alt="{{ $posts[0]->category->slug }}">
   @endif
   <div class="card-body">
     <h5 class="display-2 text-capitalize">{{ rtrim($posts[0]->title, '.') }}</h5>
     <p class="card-text">By : <a class="text-info"
         href="/posts?user={{ $posts[0]->user->username }}">
         {{ $posts[0]->user->name }}
       </a> in :
       <a class="text-info"
         href="/posts?category={{ $posts[0]->category->slug }}">
         {{ $posts[0]->category->name }}
       </a>
     </p>
     <p>{{ $posts[0]->excerpt }}</p>
     <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-secondary">read more</a>
   </div>
 </div>

 <div class="row justify-content-between p-0">
   @foreach ($posts->skip(1) as $post)
     <div class="mt-3 col-sm-12 col-md-6 col-lg-4 d-inline-block">
       <div class="card border-light p-0 bg-white ">
         @if ($post->image)
           <img class="card-img-top w-100" height="300px" style="object-fit: cover"
             src="{{ asset('/storage/' . $post->image) }}"
             alt="{{ $post->category->slug }}">
         @else
           <img class="card-img-top w-100 d-sm-none d-md-block"
             src="http://source.unsplash.com/400x300/?{{ $post->category->slug }}"
             alt="{{ $post->category->slug }}">
         @endif
         <div class="card-body">
           <h5 class="display-3 text-capitalize">{{ rtrim($post->title, '.') }}
           </h5>
           <small class="card-text">By : <a class="text-info"
               href="/posts?user={{ $post->user->username }}">
               {{ $post->user->name }}
             </a> in :
             <a class="text-info"
               href="/posts?category={{ $post->category->slug }}">
               {{ $post->category->name }}
             </a>
           </small>
           <p class="text-primary">{{ $post->excerpt }}</p>
           <a href="/posts/{{ $post->slug }}" class="btn text-light btn-info">read
             more</a>
         </div>
       </div>

     </div>
   @endforeach

 </div>
