<section class="w-4/5 my-3 p-4 mx-auto ">
    <div class="bg-slate-500 shadow-sm shadow-red-900 border-[1px] border-yellow-700 py-2 px-3 relative ">
        <h2 class="mx-auto my-2 text-center uppercase font-black drop-shadow-lg shadow-black text-white  underline-offset-2 underline decoration-white ">Nouvelle article</h2>
        <form action="/articlesCRUD/{{$article->id}}" method="post" class="grid grid-cols-5 gap-3">
            @csrf
            @method('put')
            <div class="col-span-2">
                <x-input-label for="title" :value="__('Titre')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="title" :value="old('title')? old('title') : $article->title" required autofocus />

                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="col-span-3">
                <x-input-label for="text" :value="__('Texte')" />

                <textarea id="name" class="block mt-1 w-full" type="text" name="text" placeholder="le text"  required autofocus >
                    {{old("text")? old("text") : $article->text}}
                </textarea>

                <x-input-error :messages="$errors->get('text')" class="mt-2" />
            </div>
            <div class="col-start-2 col-end-4">
                <x-input-label for="user_id" :value="__('Utilisateur')" />
                <select class="bg-transparent w-full max-w-xs outline-none p-0" name="user_id">
                    <option  selected value="{{$article->user_id}}">{{$article->user->name}}</option>
                    <option  disabled >__________________</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  </select>
            </div>
            <input type="submit" value="Edit" class="col-start-5 col-span-1 bg-yellow-600 border-2 uppercase border-white shadow-sm shadow-black text-[1.5vw] cursor-pointer p-2 rounded-md text-white font-semibold">
        </form>
    </div>
</section>