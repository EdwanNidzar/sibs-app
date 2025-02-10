<x-app-layout>
    <x-slot name="header">
      {{ __('Detail Penerima Bantuan') }}
    </x-slot>
  
    <div class="p-4 bg-white rounded-lg shadow-xs">
      <h1 class="text-2xl font-semibold text-gray-800">Detail Penerima Bantuan</h1>
  
      <div class="mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Jenis Bantuan -->
          <div>
            <h2 class="text-lg font-semibold">Jenis Bantuan</h2>
            <p class="text-gray-700">{{ $penerima_bantuan->bantuan->nama_bantuan }}, {{ $penerima_bantuan->bantuan->jenis_bantuan }}</p>
          </div>
  
          <!-- Penerima -->
          <div>
            <h2 class="text-lg font-semibold">Penerima</h2>
            <p class="text-gray-700">{{ $penerima_bantuan->penerima->nama_lengkap }}</p>
          </div>
  
          <!-- Tanggal Penerimaan -->
          <div>
            <h2 class="text-lg font-semibold">Tanggal Penerimaan</h2>
            <p class="text-gray-700">{{ \Carbon\Carbon::parse($penerima_bantuan->tanggal_penerimaan)->translatedFormat('d F Y') }}</p>
          </div>
        </div>
  
        <!-- Dokumentasi -->
        <div class="mt-6">
          <h2 class="text-lg font-semibold">Dokumen Pendukung</h2>
          @if($penerima_bantuan->dokumentasi)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
              @foreach (json_decode($penerima_bantuan->dokumentasi, true) as $file)
                <div class="p-2 border rounded-md">
                  @if(in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                    <img src="{{ asset('storage/' . $file) }}" alt="Dokumentasi" class="w-full h-40 object-cover rounded-md">
                  @else
                    <a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-blue-600 underline">
                      {{ basename($file) }}
                    </a>
                  @endif
                </div>
              @endforeach
            </div>
          @else
            <p class="text-gray-500">Tidak ada dokumentasi</p>
          @endif
        </div>
  
        <!-- Tombol Aksi -->
        <div class="mt-6">
          <a href="{{ route('penerima-bantuan.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Kembali</a>
          <a href="{{ route('penerima-bantuan.edit', $penerima_bantuan->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Edit</a>
        </div>
      </div>
    </div>
  </x-app-layout>
  