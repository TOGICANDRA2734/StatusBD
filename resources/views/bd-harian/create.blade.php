@extends('layout.app', ['title' => 'Homepage | PT RCI | PMA 2023'])

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Transaksi Unit Baru
        </h2>

        <form
            action="{{route('bd-harian.store')}}"
            method="POST"
            id="storeUtama"
            class="px-4 py-3 mb-8 grid grid-cols-2 gap-5 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
            @csrf
            <label class="block mt-4 text-sm">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Nomor Unit</span>
                <select class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" name="nom_unit" id="nom_unit">
                    @foreach($nom_unit as $nu)
                        <option value="{{$nu->Nom_unit}}">{{$nu->Nom_unit}}</option>
                    @endforeach
                </select>
            </label>
            

            <label class="block mt-4 text-sm">
                <span class="font-semibold text-gray-700 dark:text-gray-400">
                    Tanggal Breakdown
                </span>
                <input class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" type="date" name="tgl_bd" id="tgl_bd">
            </label>

            <label class="block mt-4 text-sm">
                <span class="font-semibold text-gray-700 dark:text-gray-400">
                    Rencana RFU
                </span>
                <input class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" type="date" name="tgl_rfu" id="tgl_rfu">
            </label>

            <label class="block mt-4 text-sm">
                <span class="font-semibold text-gray-700 dark:text-gray-400">
                    Ket. Rencana RFU
                </span>
                <input class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" type="text" name="ket_tgl_rfu" id="ket_tgl_rfu">
            </label>

            <label class="block mt-4 text-sm">
                <span class="font-semibold text-gray-700 dark:text-gray-400">
                    Status BD
                </span>
                <select
                    name="kode_bd"
                    class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray"
                >
                    @foreach($kode_bd as $data)
                        <option value="{{$data->kode_bd}}">{{$data->kode_bd}}</option>
                    @endforeach
                </select>
            </label>

            <label class="block mt-4 text-sm">
                <span class="font-semibold text-gray-700 dark:text-gray-400">
                    HM
                </span>
                <input class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" type="text" name="hm" id="hm">
            </label>

            <label class="block mt-4 text-sm">
                <span class="font-semibold text-gray-700 dark:text-gray-400">
                    PIC
                </span>
                <input class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" type="text" name="pic" id="pic">
            </label>

            <label class="block mt-4 text-sm">
                <span class="font-semibold text-gray-700 dark:text-gray-400">
                    Site
                </span>

                <select
                    name="site"
                    class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray"
                >
                    @foreach($site as $st)
                        <option value="{{$st->kodesite}}">{{$st->namasite}} - {{$st->lokasi}}</option>
                    @endforeach
                </select>
            </label>


            <button type="submit" class="px-5 py-3 mt-4 col-span-2 font-medium leading-5 text-white transition-colors duration-150 bg-stone-700 border border-transparent rounded-lg active:bg-stone-600 hover:bg-stone-900 focus:outline-none focus:shadow-outline-stone w-full">Submit</button>
        </form>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <!-- Dokumen -->
            <form
                action="{{route('bd-harian-dok.store')}}"
                method="POST"
                id="storeDok"
                class="px-4 py-3 mb-8 grid grid-cols-2 gap-5 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
                @csrf
                <label class="block mt-4 text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Tiket</span>
                    <select class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" name="id_tiket" id="id_tiket">
                        @foreach($dok_tiket as $it)
                            <option value="{{$it->id_tiket}}">{{$it->id_tiket}}</option>
                        @endforeach
                    </select>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Dokumen</span>
                    <select class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" name="dok_type" id="dok_type">
                        @foreach($dok_type as $nu)
                            <option value="{{$nu->dok_type}}">{{$nu->dok_type}}</option>
                        @endforeach
                    </select>
                </label>
                

                <label class="block mt-4 text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">
                        No
                    </span>
                    <input class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" type="text" name="dok_no" id="dok_no">
                </label>

                <label class="block mt-4 text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">
                        Tanggal
                    </span>
                    <input class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" type="date" name="dok_tgl" id="dok_tgl">
                </label>

                <label class="block mt-4 text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">
                        Deskripsi
                    </span>
                    <input class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" type="text" name="uraian" id="uraian">
                </label>

                <label class="block mt-4 text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">
                        Keterangan
                    </span>
                    <input class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" type="text" name="keterangan" id="keterangan">
                </label>

                <button type="submit" class="px-5 py-3 mt-4 col-span-2 font-medium leading-5 text-white transition-colors duration-150 bg-stone-700 border border-transparent rounded-lg active:bg-stone-600 hover:bg-stone-900 focus:outline-none focus:shadow-outline-stone w-full">Submit</button>
            </form>

            <!-- Uraian -->
            <form
                action="{{route('bd-harian-desc.store')}}"
                method="POST"
                id="storeDesc"
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
                @csrf
                <label class="block mt-4 text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Tiket</span>
                    <select class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray" name="id_tiket" id="id_tiket">
                        @foreach($dok_tiket as $it)
                            <option value="{{$it->id_tiket}}">{{$it->id_tiket}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Uraian</span>
                    <textarea name="uraian_bd" id="uraian_bd" cols="30" rows="10" class="block shadow-sm border p-2 rounded-md w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-stone-400 focus:outline-none focus:shadow-outline-stone dark:focus:shadow-outline-gray"></textarea>
                </label>

                <button type="submit" class="px-5 py-3 mt-4 col-span-2 font-medium leading-5 text-white transition-colors duration-150 bg-stone-700 border border-transparent rounded-lg active:bg-stone-600 hover:bg-stone-900 focus:outline-none focus:shadow-outline-stone w-full">Submit</button>
            </form>
        </div>
    </div>    
</main>


<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script>
    var urlUtama = "/bd-harian";
    $('#storeUtama').submit(function(event){
        event.preventDefault();
        $.ajax({
            url: urlUtama,
            type: 'POST',
            data: $('#storeUtama').serialize(),
            success: function(response){
                toastr.success("Data Berhasil Diinput");
            },
            error: function(response){
            }
        })
    });

    var urlDok = "/bd-harian-dok";
    $('#storeDok').submit(function(event){
        event.preventDefault();
        $.ajax({
            url: urlDok,
            type: 'POST',
            data: $('#storeDok').serialize(),
            success: function(response){
                toastr.success("Data Berhasil Diinput");

            },
            error: function(response){
            }
        })
    });

    var urlDesc = "/bd-harian-desc";
    $('#storeDesc').submit(function(event){
        event.preventDefault();
        $.ajax({
            url: urlDesc,
            type: 'POST',
            data: $('#storeDesc').serialize(),
            success: function(response){
                toastr.success("Data Berhasil Diinput");
            },
            error: function(response){
            }
        })
    });

</script>
@endsection