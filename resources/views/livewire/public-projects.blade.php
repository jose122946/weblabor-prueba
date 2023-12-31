<div class="w-full items-center justify-center">

<div class="grid grid-cols-4 gap-1 max-w-[1000px] self-center">
    @foreach($projects as $project)
<div class="flex items-center justify-center bg-slate-100">
    <div class="group h-80 w-80 [perspective:1000px]">
        <div class="relative h-full w-full rounded-xl shadow-xl transition-all duration-500 [transform-style:preserve-3d] group-hover:[transform:rotateY(180deg)]">
            <div class="absolute inset-0">
                <img class="h-full w-full rounded-xl object-cover shadow-xl shadow-black/40" src="{{\Illuminate\Support\Facades\Storage::disk('files')->url($project->imagen)}}" alt="" />
            </div>
            <div class="absolute inset-0 h-full w-full rounded-xl bg-pink-500/80 px-12 text-center text-slate-200 [transform:rotateY(180deg)] [backface-visibility:hidden]">
                <div class="flex min-h-full flex-col items-center justify-center border-2 border-white">
                    <h1 class="text-3xl font-bold">{{$project->name}}</h1>
                    <p class="text-base">{{strip_tags($project->description)}}</p>

                </div>
            </div>
        </div>
    </div>
</div>
    @endforeach
</div>
{{$projects->links()}}
</div>

