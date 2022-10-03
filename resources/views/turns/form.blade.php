
<form class="w-full max-w-sm" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset

    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <div class="flex justify-center">
                <div class="mb-3 w-96">
                    <div class="datepicker relative form-floating mb-3 xl:w-96">
                    <label for="" class="text-gray-700">Select a turn</label>
                        <input type="time"
                        name="turn"
                        id="turn"
                        @isset($turnsArray)
                            @foreach($turnsArray as $turn)
                            value="{{"$turn[turn]"}}"
                            @endforeach
                        @endisset
                        class="w-full px-3 py-1.5 font-normal text-gray-700 bg-white border border-solid border-gray-300 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Select a date" />
                    </div>
                </div>
            </div>
        </div>      
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 m-4">

        <label for="active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Estado</label>
            <select id="active" name="active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Selecciona</option>
                <option {{old('active',"$turn[active]")=="0" ? 'selected':''}}  value="0">Desactivado</option>
                <option {{old('active',"$turn[active]")=="1" ? 'selected':''}}  value="1">Activado</option>
            </select>
        </div>
  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
        <div class="md:w-2/3">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded" type="submit">
            {{$textButton}}
        </button>
        </div>
  </div>
</form>

