
<h1 class="mx-auto my-6 text-center uppercase font-black drop-shadow-lg shadow-black text-white  underline-offset-2 underline decoration-white">Page Article</h1>
<section class="w-4/5 grid grid-cols-2 gap-6 mx-auto ">
@foreach ($articles as $article )
    <div class="bg-slate-500 shadow-sm shadow-red-900 border-[1px] border-yellow-700 py-2 px-3 relative">
        <p class="absolute top-[-15px] right-[-12px] w-2/12 shadow-sm shadow-black text-white {{ $article->user->role_id === 1 ? 'bg-red-700' : ($article->user->role_id === 2 ? 'bg-green-700' : ($article->user->role_id === 3 ?'bg-blue-400' : 'bg-slate-800')) }} text-center p-1"> {{$article->user->name}} </p>
        <h2 class="mx-auto my-3">{{$article->title}}</h2>
        <p class="p-3 drop-shadow-lg shadow-black bg-[rgba(255,255,255,0.2)]"> {{$article->text}}</p>
    </div>
@endforeach
</section>