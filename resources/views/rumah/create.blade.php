<x-app-layout>
  <x-slot name="header">
    {{ __('Tambah Rumah') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h1 class="text-2xl font-semibold text-gray-800">Tambah Rumah</h1>

    <div class="overflow-hidden mb-8 w-full rounded-lg shadow-xs">
      <div class="overflow-x-auto w-full">
        <form action="{{ route('rumah.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
          @csrf

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

          <!-- Alamat Rumah -->
          <div class="mt-4">
            <x-input-label for="alamat_rumah" :value="__('Alamat Rumah')" />
            <x-text-input type="text" id="alamat_rumah" name="alamat_rumah" class="block w-full"
              value="{{ old('alamat_rumah') }}" required />
            <x-input-error :messages="$errors->get('alamat_rumah')" class="mt-2" />
          </div>

          <!-- Kondisi Rumah -->
          <div class="mt-4">
            <x-input-label for="kondisi_rumah" :value="__('Kondisi Rumah')" />
            <select id="kondisi_rumah" name="kondisi_rumah"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600"
              required>
              <option value="">-- Pilih Kondisi Rumah --</option>
              <option value="Layak">Layak</option>
              <option value="Tidak layak">Tidak Layak</option>
            </select>
            <x-input-error :messages="$errors->get('kondisi_rumah')" class="mt-2" />
          </div>

          <!-- Document Pendukung -->
          <div class="mt-4">
            <x-input-label for="document_pendukung" :value="__('Dokumen Pendukung')" />
            <input type="file" id="document_pendukung" name="document_pendukung"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600" />
            <x-input-error :messages="$errors->get('document_pendukung')" class="mt-2" />
          </div>

          <!-- Status Bantuan -->
          <div class="mt-4">
            <x-input-label for="status_bantuan" :value="__('Status Bantuan')" />
            <select id="status_bantuan" name="status_bantuan"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600"
              required>
              <option value="">-- Pilih Status Bantuan --</option>
              <option value="yes">Ya</option>
              <option value="no">Tidak</option>
            </select>
            <x-input-error :messages="$errors->get('status_bantuan')" class="mt-2" />
          </div>

          <!-- Submit Button -->
          <div class="mt-4">
            <x-primary-button class="float-right">
              {{ __('Tambah Rumah') }}
            </x-primary-button>
            <a href="{{ route('rumah.index') }}"
              class="float-right px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</x-app-layout>
