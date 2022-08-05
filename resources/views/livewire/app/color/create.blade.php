<div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 ">

        <x-input
         icon="tag"
         label="Descrição"
         placeholder=""
         wire:model.lazy='description'
         />


        <x-color-picker
        label="Selecione uma cor"
        placeholder="Selecione a cor desejada"

        wire:model.lazy='color'
        />
    </div>
    <div class="grid grid-cols-1">
        <x-button class="col-span-end" icon="beaker" secondary wire:click="addColor" spinner="addColor" rounded label="Vincular cor" />
    </div>
</div>
