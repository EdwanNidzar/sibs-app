<x-app-layout>
  <x-slot name="header">
    {{ __('Tambah Bantuan') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h1 class="text-2xl font-semibold text-gray-800">Tambah Bantuan</h1>

    <div class="overflow-hidden mb-8 w-full rounded-lg shadow-xs">
      <div class="overflow-x-auto w-full">
        <form action="{{ route('bantuan.store') }}" method="POST" autocomplete="off">
          @csrf

          <!-- Nama Bantuan -->
          <div class="mt-4">
            <x-input-label for="nama_bantuan" :value="__('Nama Bantuan')" />
            <x-text-input type="text" id="nama_bantuan" name="nama_bantuan" class="block w-full"
              value="{{ old('nama_bantuan') }}" required />
            <x-input-error :messages="$errors->get('nama_bantuan')" class="mt-2" />
          </div>

          <!-- Jenis Bantuan -->
          <div class="mt-4">
            <x-input-label for="jenis_bantuan" :value="__('Jenis Bantuan')" />
            <select id="jenis_bantuan" name="jenis_bantuan"
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600" required>
              <option value="">-- Pilih Jenis Bantuan --</option>
              @foreach ($jenisBantuan as $jenis)
                <option value="{{ $jenis }}">{{ $jenis }}</option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('jenis_bantuan')" class="mt-2" />
          </div>

          <!-- Keterangan -->
          <div class="mt-4">
            <x-input-label for="keterangan" :value="__('Keterangan')" />
            <textarea name="keterangan" id="keterangan" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600" required>{{ old('keterangan') }}</textarea>
            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
          </div>

          <!-- Submit Button -->
          <div class="mt-4">
            <x-primary-button class="float-right">
              {{ __('Tambah Bantuan') }}
            </x-primary-button>
            <a href="{{ route('bantuan.index') }}"
            class="float-right px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</x-app-layout>
