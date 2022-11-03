<h1
    class="mx-auto my-6 text-center uppercase font-black drop-shadow-lg shadow-black text-white  underline-offset-2 underline decoration-white">
    Page User</h1>





<section class="w-4/5 grid grid-cols-2 gap-6 mx-auto ">
    @foreach ($users as $user)
        <div class="bg-slate-500 shadow-sm shadow-red-900 border-[1px] border-yellow-700 py-2 px-3 relative">
            <p
                class="absolute top-[-15px] right-[-12px] w-2/12 shadow-sm text-[0.7git addvw] uppercase shadow-black text-white {{ $user->role_id === 1 ? 'bg-red-700' : ($user->role_id === 2 ? 'bg-green-700' : ($user->role_id === 3 ? 'bg-blue-400' : 'bg-slate-800')) }} text-center p-1">
                {{ $user->role->role }} </p>
            <h2 class="mx-auto my-3">{{ $user->name }}</h2>
        </div>
    @endforeach
</section>
