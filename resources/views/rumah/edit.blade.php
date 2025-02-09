<x-app-layout>
  <x-slot name="header">
    {{ __('Edit Data Rumah') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h1 class="text-2xl font-semibold text-gray-800">Edit Data Rumah</h1>

    <div class="overflow-hidden mb-8 w-full rounded-lg shadow-xs">
      <div class="overflow-x-auto w-full">
        <form action="{{ route('rumah.update', $rumah->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- Penerima -->
          <div class="mt-4">
            <x-input-label for="penerima_id" :value="__('Penerima')" />
            <select id="penerima_id" name="penerima_id"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
              @foreach ($penerimas as $penerima)
                <option value="{{ $penerima->id }}" {{ $penerima->id == $rumah->penerima_id ? 'selected' : '' }}>
                  {{ $penerima->nama_lengkap }}
                </option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('penerima_id')" class="mt-2" />
          </div>

          <!-- Alamat Rumah -->
          <div class="mt-4">
            <x-input-label for="alamat_rumah" :value="__('Alamat Rumah')" />
            <x-text-input type="text" id="alamat_rumah" name="alamat_rumah" class="block w-full"
              value="{{ old('alamat_rumah', $rumah->alamat_rumah) }}" required />
            <x-input-error :messages="$errors->get('alamat_rumah')" class="mt-2" />
          </div>

          <!-- Kondisi Rumah -->
          <div class="mt-4">
            <x-input-label for="kondisi_rumah" :value="__('Kondisi Rumah')" />
            <select id="kondisi_rumah" name="kondisi_rumah"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
              <option value="Layak" {{ $rumah->kondisi_rumah == 'Layak' ? 'selected' : '' }}>Layak</option>
              <option value="Tidak layak" {{ $rumah->kondisi_rumah == 'Tidak layak' ? 'selected' : '' }}>Tidak layak
              </option>
            </select>
            <x-input-error :messages="$errors->get('kondisi_rumah')" class="mt-2" />
          </div>

          <!-- Document Pendukung -->
          <div class="mt-4">
            <x-input-label for="document_pendukung" :value="__('Dokumen Pendukung')" />
            <input type="file" id="document_pendukung" name="document_pendukung"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50" />
            <x-input-error :messages="$errors->get('document_pendukung')" class="mt-2" />

            @if ($rumah->document_pendukung)
              <div class="mt-2">
                <a href="{{ url('storage/' . $rumah->document_pendukung) }}" target="_blank" class="text-blue-500">Lihat
                  File</a>
              </div>
            @endif
          </div>

          <!-- Status Bantuan -->
          <div class="mt-4">
            <x-input-label for="status_bantuan" :value="__('Status Bantuan')" />
            <select id="status_bantuan" name="status_bantuan"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
              <option value="yes" {{ $rumah->status_bantuan == 'yes' ? 'selected' : '' }}>Yes</option>
              <option value="no" {{ $rumah->status_bantuan == 'no' ? 'selected' : '' }}>No</option>
            </select>
            <x-input-error :messages="$errors->get('status_bantuan')" class="mt-2" />
          </div>

          <!-- Submit Button -->
          <div class="mt-4">
            <x-primary-button class="float-right">
              {{ __('Update Data') }}
            </x-primary-button>
            <a href="{{ route('rumah.index') }}"
              class="float-right px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 mr-2">Back</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</x-app-layout>
