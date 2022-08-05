<div>

    <div  @click="@this.likerColor" class="w-4 mr-2 transform cursor-pointer hover:text-purple-500 hover:scale-110" title="Vincular Cores">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
          </svg>
    </div>

    <x-modal.card title="Vicular Cores para o usuário: {{$user->name}}" blur wire:model.defer="modalLikerColor">


     <livewire:app.color.create :user="$user" :key="$user.'create'"/>



     <div class="w-full">
        <div class="my-6 bg-white rounded shadow-md">
            <table class="w-full table-auto min-w-max">
                <thead>
                    <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">

                        <th class="px-6 py-3 text-left">Cor</th>

                        <th class="px-6 py-3 text-center">Ações</th>
                    </tr>
                </thead>


                @foreach ($colors as $color )
                <tbody class="text-sm font-light text-gray-600">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">

                        <td class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <div class="mr-2">

                                    <div class="w-6 h-6 rounded-full" style="background-color: {{ $color->hex}}"></div>
                                </div>
                                <span>{{ $color->description }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-3 text-center">
                            <div class="flex justify-center item-center">
                                <livewire:app.color.delete  :color="$color" :key="$color.'delete'" />
                            </div>
                        </td>
                    </tr>

                </tbody>

                @endforeach


            </table>



        </div>
    </div>









    </x-modal.card>

</div>



