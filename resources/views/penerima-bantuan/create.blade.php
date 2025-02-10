<x-app-layout>
  <x-slot name="header">
    {{ __('Tambah Penerima Bantuan') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h1 class="text-2xl font-semibold text-gray-800">Tambah Penerima Bantuan</h1>

    <div class="overflow-hidden mb-8 w-full rounded-lg shadow-xs">
      <div class="overflow-x-auto w-full">
        <form action="{{ route('penerima-bantuan.store') }}" method="POST" enctype="multipart/form-data"
          autocomplete="off">
          @csrf

          <!-- Bantuan ID -->
          <div class="mt-4">
            <x-input-label for="bantuan_id" :value="__('Jenis Bantuan')" />
            <select id="bantuan_id" name="bantuan_id"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600"
              required>
              <option value="">-- Pilih Jenis Bantuan --</option>
              @foreach ($bantuan as $b)
                <option value="{{ $b->id }}">{{ $b->nama_bantuan }}</option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('bantuan_id')" class="mt-2" />
          </div>

          <!-- Penerima ID -->
          <div class="mt-4">
            <x-input-label for="penerima_id" :value="__('Penerima')" />
            <select id="penerima_id" name="penerima_id"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600"
              required>
              <option value="">-- Pilih Penerima --</option>
              @foreach ($penerima as $p)
                <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('penerima_id')" class="mt-2" />
          </div>

          <!-- Tanggal Penerimaan -->
          <div class="mt-4">
            <x-input-label for="tanggal_penerimaan" :value="__('Tanggal Penerimaan')" />
            <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600"
              required />
            <x-input-error :messages="$errors->get('tanggal_penerimaan')" class="mt-2" />
          </div>

          <!-- Dokumen Pendukung -->
          <div class="mt-4">
            <x-input-label for="dokumentasi" :value="__('Dokumen Pendukung')" />
            <input type="file" id="dokumentasi" name="dokumentasi[]" multiple
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600" />
            <x-input-error :messages="$errors->get('dokumentasi')" class="mt-2" />
          </div>

          <!-- Submit Button -->
          <div class="mt-4">
            <x-primary-button class="float-right">
              {{ __('Tambah Penerima') }}
            </x-primary-button>
            <a href="{{ route('penerima-bantuan.index') }}"
              class="float-right px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</x-app-layout>
