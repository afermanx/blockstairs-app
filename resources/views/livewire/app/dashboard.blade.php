<x-app.authlayout title="Dashboard">


        <div class="sm:text-center lg:text-left">
          <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Bem vindo </span>
            <span class="block text-indigo-600 xl:inline">{{ auth()->user()->name }}</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            Olá {{ auth()->user()->name }}! esse é o resultado do teste proposto para vaga de Dev na Blockstairs

          </p>
          <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="rounded-md shadow">
              <a href="{{ route("usuários") }}" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 md:py-4 md:text-lg md:px-10"> Vamos lá! </a>
            </div>

          </div>
        </div>


     




</x-app.authlayout>
