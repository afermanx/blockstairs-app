@props(
    ['mobile' =>null, 'title' => null ]
)


<div @if($mobile) @else class="hidden md:block" @endif  x-data>
    <div class="ml-10 flex items-baseline space-x-4">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a   {{ $attributes }} @if(Route::current()->getName() == strtolower($title)) class=" bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"  @endif class="text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">{{$title}}</a>



    </div>
</div>

