<h1
    class="mx-auto my-6 text-center uppercase font-black drop-shadow-lg shadow-black text-white  underline-offset-2 underline decoration-white">
    Page User</h1>





<section class="w-4/5 grid grid-cols-2 gap-6 mx-auto ">
    @foreach ($users as $user)
        <div class="bg-slate-500 shadow-sm shadow-red-900 border-[1px] border-yellow-700 py-2 px-3 relative">
            <p
                class="absolute top-[-15px] right-[-12px] w-2/12 shadow-sm text-[0.8vw] uppercase shadow-black text-white {{ $user->role_id === 1 ? 'bg-red-700' : ($user->role_id === 2 ? 'bg-blue-400' : ($user->role_id === 3 ? 'bg-green-700' : 'bg-slate-800')) }} text-center p-1">
                {{ $user->role->role }} </p>
            <h2 class="mx-auto my-3">{{ $user->name }}</h2>
            @can('admin-user', [$user->id, $user->role_id])
                <div class="flex justify-end gap-4 my-2">
                    <a href="/user/{{ $user->id }}/edit"><button
                            class="bg-yellow-600 border-2 border-white shadow-sm shadow-black text-[1vw] p-2 rounded-md text-white font-semibold ">
                            EDIT</button></a>
                    <form action="/user/{{ $user->id }}" method="post">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="SUPPRIMER"
                            class="bg-red-700 border-2 border-white shadow-sm shadow-black text-[1vw] p-2 rounded-md text-white font-semibold hover:cursor-pointer ">
                    </form>
                </div>
            @endcan
        </div>
    @endforeach
</section>
