<x-app.authlayout title="Usuários">



    <div class="overflow-x-auto">

        <div class="grid grid-cols-2 gap-2">

            <div class="relative col-start-1 col-end-3 text-gray-600 focus-within:text-gray-400">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
                </span>
                <input wire:model="search" type="search" name="q" class="w-48 py-2 pl-10 text-sm text-white rounded-md md:w-52 lg:w-60 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Buscar usuários" autocomplete="off">
            </div>
            <div class="col-span-2 col-end-7 ">
               <livewire:app.users.create />
            </div>
        </div>




        </div>

            <div class="w-full">
                <div class="my-6 bg-white rounded shadow-md">
                    <table class="w-full table-auto min-w-max">
                        <thead>
                            <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">

                                <th class="px-6 py-3 text-left">Usuários</th>
                                <th class="px-6 py-3 text-center">Cores</th>
                                <th class="px-6 py-3 text-center">Ações</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user )
                        <tbody class="text-sm font-light text-gray-600">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">

                                <td class="px-6 py-3 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">

                                            <img class="w-8 h-8 rounded-full" src="https://source.unsplash.com/random/{{ $user->id }}"/>
                                        </div>
                                        <div class="grid col-span-1">
                                            <span>{{ $user->name }}</span>
                                            <span class="text-xs italic">{{ $user->email }}</span>
                                        </div>

                                    </div>
                                </td>
                                <td class="px-6 py-3 text-center">
                                    <div class="flex items-center justify-center">
                                        @foreach ( $user->colors as $color )

                                        <div class="flex items-center justify-center ">
                                            <div class="w-6 h-6 transform border border-gray-200 rounded-full hover:scale-125" style="background-color: {{ $color->hex }}"></div>
                                        </div>

                                        @endforeach

                                        @if ($user->colors->count() == 0)

                                        <div class="flex items-center justify-center ">
                                            <div class="" >Não há cor vinculada para esse usuário.</div>
                                        </div>

                                        @endif

                                    </div>
                                </td>

                                <td class="px-6 py-3 text-center">
                                    <div class="flex justify-center item-center">
                                      <livewire:app.color :user="$user" :key="$user->id.'linker'" />
                                       <livewire:app.users.edit :user="$user" :key="$user->id.'edit'" />
                                        <livewire:app.users.delete  :user="$user" :key="$user->id.'delete'"/>
                                    </div>
                                </td>
                            </tr>

                        </tbody>

                        @endforeach


                    </table>
                    @if ($users->count() == 0)
                    <div class="flex justify-center text-red-500 lg:text-xl sm:tex-sm md:text-base "> Nenhum usuário encontrado com o nome: {{ $search }}</div>

                    @endif
                    <div class="p-2">
                        {{ $users->links() }}
                    </div>



                </div>
            </div>
        </div


    </div>
</x-app.authlayout>
