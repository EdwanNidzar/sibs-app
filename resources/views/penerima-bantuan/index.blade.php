<x-app-layout>
  <x-slot name="header">
    {{ __('Penerima Bantuan') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h1 class="text-2xl font-semibold text-gray-800">Penerima Bantuan</h1>

    <x-alert-notification />

    <div class="mt-4 mb-4 float-right">
      <a href="{{ route('penerima-bantuan.create') }}"
        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Tambah Penerima Bantuan</a>
      <a href="{{ route('exportPdfPenerimaBantuan') }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600" target="_blank">Export
        PDF</a>
    </div>

    <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
      <div class="overflow-x-auto w-full">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
              <th class="px-4 py-3">Nama Penerima</th>
              <th class="px-4 py-3">Jenis Bantuan</th>
              <th class="px-4 py-3">Tanggal Penerimaan</th>
              <th class="px-4 py-3">Dokumentasi</th>
              <th class="px-4 py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y">
            @foreach ($penerima_bantuans as $penerima_bantuan)
              <tr class="text-gray-700">
                <td class="px-4 py-3 text-sm">{{ $penerima_bantuan->penerima->nama_lengkap }}</td>
                <td class="px-4 py-3 text-sm">{{ $penerima_bantuan->bantuan->nama_bantuan }}, {{ $penerima_bantuan->bantuan->jenis_bantuan }}</td>
                <td class="px-4 py-3 text-sm">{{ $penerima_bantuan->tanggal_penerimaan }}</td>
                <td class="px-4 py-3 text-sm">
                  @if ($penerima_bantuan->dokumentasi)
                    @foreach (json_decode($penerima_bantuan->dokumentasi) as $dokumentasi)
                      <a href="{{ asset('storage/' . $dokumentasi) }}" target="_blank" class="text-blue-500">Lihat
                        Dokumentasi</a><br>
                    @endforeach
                  @else
                    Tidak ada dokumentasi
                  @endif
                </td>
                <td class="px-4 py-3 flex items-center space-x-4 text-sm">
                  <a href="{{ route('penerima-bantuan.edit', $penerima_bantuan->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                      <path
                        d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.886L17.5 5.501a2.121 2.121 0 0 0-3-3L3.58 13.419a4 4 0 0 0-.885 1.343Z" />
                    </svg>
                  </a>

                  <a href="{{ route('penerima-bantuan.show', $penerima_bantuan->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                      <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                      <path fill-rule="evenodd"
                        d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                        clip-rule="evenodd" />
                    </svg>
                  </a>

                  <form action="{{ route('penerima-bantuan.destroy', $penerima_bantuan->id) }}" method="POST"
                    class="inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                          d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                          clip-rule="evenodd" />
                      </svg>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div
        class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
        {{ $penerima_bantuans->links() }}
      </div>
    </div>
  </div>
</x-app-layout>
