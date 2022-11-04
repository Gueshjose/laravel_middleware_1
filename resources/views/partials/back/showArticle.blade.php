<div class="w-4/5 mx-auto my-8 bg-slate-500 shadow-sm shadow-red-900 border-[1px] border-yellow-700 py-2 px-3 relative">
    <p
        class="absolute top-[-15px] right-[-12px] w-2/12 shadow-sm shadow-black text-white {{ $article->user->role_id === 1 ? 'bg-red-700' : ($article->user->role_id === 2 ? 'bg-green-700' : ($article->user->role_id === 3 ? 'bg-blue-400' : 'bg-slate-800')) }} text-center p-1">
        {{ $article->user->name }} </p>
    <h2 class="mx-auto my-3">{{ $article->title }}</h2>
    <p class="p-3 drop-shadow-lg shadow-black bg-[rgba(255,255,255,0.2)]"> {{ $article->text }}</p>
    <div class="flex justify-end gap-4 my-2">
        <a href="/articlesCRUD/{{ $article->id }}/edit"><button
                class="bg-yellow-600 border-2 border-white shadow-sm shadow-black text-[1vw] p-2 rounded-md text-white font-semibold ">
                EDIT</button></a>
        @can('check-user', $article->user_id)
            <form action="/articlesCRUD/{{ $article->id }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="SUPPRIMER"
                    class="bg-red-700 border-2 border-white shadow-sm shadow-black text-[1vw] p-2 rounded-md text-white font-semibold hover:cursor-pointer ">
            </form>
        @endcan
    </div>
</div>
