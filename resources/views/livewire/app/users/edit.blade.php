<div>


    <div  @click="$openModal('{{$user->id}}')" class="w-4 mr-2 transform cursor-pointer hover:text-purple-500 hover:scale-110" title="Editar Usuários">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
          </svg>
    </div>



    <x-modal.card title="Editar usuário {{ $user->name }}" blur wire:model.defer="{{ $user->id }}">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">


            <x-input label="Nome" placeholder="Nome completo" wire:model.lazy="name"  />


            <x-input label="Email" placeholder="examplo@mail.com" wire:model.lazy="email"/>


            <x-input label="Senha" type="password"  wire:model.lazy="password" />

            <x-input type="password"  label="Confirme a senha" wire:model.lazy="passwordConfirmation"/>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat label="Cancelar" @click="close" />

                <div class="flex">

                    <x-button primary label="Salvar" wire:click="edit" @click="close" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
