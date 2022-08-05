<div>
    <button @click="$openModal('modalUserCreate') " class="inline-flex items-center px-4 py-2 font-bold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
          </svg>
        <span>Adicionar usuário</span>
    </button>


    <x-modal.card title="Cadastrar usuário" blur wire:model.defer="modalUserCreate"  >


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

                    <x-button primary label="Salvar" wire:click="register" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
