<x-app-layout>
  <x-slot name="header">
    {{ __('Edit Penerima Bantuan') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h1 class="text-2xl font-semibold text-gray-800">Edit Penerima Bantuan</h1>

    <div class="overflow-hidden mb-8 w-full rounded-lg shadow-xs">
      <div class="overflow-x-auto w-full">
        <form action="{{ route('penerima-bantuan.update', $penerima_bantuan->id) }}" method="POST"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- Bantuan ID -->
          <div class="mt-4">
            <x-input-label for="bantuan_id" :value="__('Jenis Bantuan')" />
            <select id="bantuan_id" name="bantuan_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
              required>
              <option value="">-- Pilih Jenis Bantuan --</option>
              @foreach ($bantuan as $b)
                <option value="{{ $b->id }}" {{ $penerima_bantuan->bantuan_id == $b->id ? 'selected' : '' }}>
                  {{ $b->nama_bantuan }}
                </option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('bantuan_id')" class="mt-2" />
          </div>

          <!-- Penerima ID -->
          <div class="mt-4">
            <x-input-label for="penerima_id" :value="__('Penerima')" />
            <select id="penerima_id" name="penerima_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
              required>
              <option value="">-- Pilih Penerima --</option>
              @foreach ($penerima as $p)
                <option value="{{ $p->id }}" {{ $penerima_bantuan->penerima_id == $p->id ? 'selected' : '' }}>
                  {{ $p->nama_lengkap }}
                </option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('penerima_id')" class="mt-2" />
          </div>

          <!-- Tanggal Penerimaan -->
          <div class="mt-4">
            <x-input-label for="tanggal_penerimaan" :value="__('Tanggal Penerimaan')" />
            <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
              value="{{ $penerima_bantuan->tanggal_penerimaan }}" required />
            <x-input-error :messages="$errors->get('tanggal_penerimaan')" class="mt-2" />
          </div>

          <!-- Dokumen Pendukung -->
          <div class="mt-4">
            <x-input-label for="dokumentasi" :value="__('Dokumen Pendukung (Opsional)')" />
            <input type="file" id="dokumentasi" name="dokumentasi[]" multiple
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            <x-input-error :messages="$errors->get('dokumentasi')" class="mt-2" />

            @if ($penerima_bantuan->dokumentasi)
              <div class="mt-2">
                <p class="text-sm text-gray-600">Dokumen saat ini:</p>
                @foreach (json_decode($penerima_bantuan->dokumentasi, true) as $file)
                  <a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-primary-600 underline">
                    {{ basename($file) }}
                  </a><br>
                @endforeach
              </div>
            @endif
          </div>

          <!-- Submit Button -->
          <div class="mt-4">
            <x-primary-button class="float-right">
              {{ __('Simpan Perubahan') }}
            </x-primary-button>
            <a href="{{ route('penerima-bantuan.index') }}"
              class="float-right px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</x-app-layout>
