<x-app-layout>
  <x-slot name="header">
    {{ __('Detail Bantuan') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h1 class="text-2xl font-semibold text-gray-800">Detail Bantuan</h1>

    <div class="overflow-hidden mb-8 w-full rounded-lg shadow-xs">
      <div class="w-full">
        <!-- Nama Bantuan -->
        <div class="mt-4">
          <x-input-label for="nama_bantuan" :value="__('Nama Bantuan')" />
          <p class="block w-full mt-1 border-gray-300 rounded-md shadow-sm p-2 bg-gray-100">{{ $bantuan->nama_bantuan }}
          </p>
        </div>

        <!-- Jenis Bantuan -->
        <div class="mt-4">
          <x-input-label for="jenis_bantuan" :value="__('Jenis Bantuan')" />
          <p class="block w-full mt-1 border-gray-300 rounded-md shadow-sm p-2 bg-gray-100">
            {{ $bantuan->jenis_bantuan }}</p>
        </div>

        <!-- Keterangan -->
        <div class="mt-4">
          <x-input-label for="keterangan" :value="__('Keterangan')" />
          <p class="block w-full mt-1 border-gray-300 rounded-md shadow-sm p-2 bg-gray-100">{{ $bantuan->keterangan }}
          </p>
        </div>

        <!-- Back Button -->
        <div class="mt-4 mb-4 float-right">
          <a href="{{ route('bantuan.index') }}"
            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back</a>
        </div>
      </div>

    </div>
  </div>
  
</x-app-layout>
