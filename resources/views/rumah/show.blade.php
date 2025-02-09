<x-app-layout>
  <x-slot name="header">
    {{ __('Detail Data Rumah') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Detail Data Rumah</h1>

    <div class="space-y-4">
      <div>
        <span class="font-semibold text-gray-700">Penerima:</span>
        <p class="text-gray-900">{{ $rumah->penerima->nama }}</p>
      </div>

      <div>
        <span class="font-semibold text-gray-700">Alamat Rumah:</span>
        <p class="text-gray-900">{{ $rumah->alamat_rumah }}</p>
      </div>

      <div>
        <span class="font-semibold text-gray-700">Kondisi Rumah:</span>
        <p class="text-gray-900">{{ $rumah->kondisi_rumah }}</p>
      </div>

      <div>
        <span class="font-semibold text-gray-700">Status Bantuan:</span>
        <span
          class="px-2 py-1 text-white rounded-md {{ $rumah->status_bantuan == 'yes' ? 'bg-green-500' : 'bg-red-500' }}">
          {{ $rumah->status_bantuan == 'yes' ? 'Diberikan' : 'Belum Diberikan' }}
        </span>
      </div>

      <div>
        <span class="font-semibold text-gray-700">Dokumen Pendukung:</span>
        @if ($rumah->document_pendukung)
          <p>
            <a href="{{ url('storage/' . $rumah->document_pendukung) }}" target="_blank" class="text-blue-500">Lihat
              Dokumen</a>
          </p>
        @else
          <p class="text-gray-500">Tidak Ada Dokumen</p>
        @endif
      </div>
    </div>

    <div class="mt-6">
      <a href="{{ route('rumah.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
        Kembali
      </a>
      <a href="{{ route('rumah.edit', $rumah->id) }}"
        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 ml-2">
        Edit
      </a>
    </div>
  </div>
</x-app-layout>
