<x-app-layout>
  <x-slot name="header">
    {{ __('Detail Penerima') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h1 class="text-2xl font-semibold text-gray-800">Detail Penerima</h1>

    <div class="mt-4">
      <p><strong>NIK:</strong> {{ $penerima->nik }}</p>
      <p><strong>No KK:</strong> {{ $penerima->no_kk }}</p>
      <p><strong>Nama Lengkap:</strong> {{ $penerima->nama_lengkap }}</p>
      <p><strong>Jenis Kelamin:</strong> {{ $penerima->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
      <p><strong>Kecamatan:</strong> {{ $penerima->district->name ?? '-' }}</p>
      <p><strong>Desa:</strong> {{ $penerima->village->name ?? '-' }}</p>
      <p><strong>Alamat:</strong> {{ $penerima->alamat_penerima }}</p>
      <p><strong>Status DTKS:</strong> {{ $penerima->dtks_status }}</p>
      <p><strong>Kategori:</strong> {{ $penerima->kategori }}</p>
      <p><strong>Status Hidup:</strong>
        <span
          class="px-2 py-1 rounded {{ $penerima->status_hidup == 'Hidup' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
          {{ $penerima->status_hidup }}
        </span>
      </p>
    </div>

    <div class="mt-4">
      <a href="{{ route('penerima.index') }}"
        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Kembali</a>
      <a href="{{ route('penerima.edit', $penerima) }}"
        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Edit</a>
    </div>
  </div>
</x-app-layout>
