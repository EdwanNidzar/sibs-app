<x-app-layout>
  <x-slot name="header">
    {{ __('Tambah Penerima') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h1 class="text-2xl font-semibold text-gray-800">Tambah Penerima</h1>

    <div class="overflow-hidden mb-8 w-full rounded-lg shadow-xs">
      <div class="overflow-x-auto w-full">
        <form action="{{ route('penerima.store') }}" method="POST" autocomplete="off">
          @csrf

          <!-- NIK -->
          <div class="mt-4">
            <x-input-label for="nik" :value="__('NIK')" />
            <x-text-input type="text" id="nik" name="nik" class="block w-full" maxlength="16"
              value="{{ old('nik') }}" required />
            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
          </div>

          <!-- No KK -->
          <div class="mt-4">
            <x-input-label for="no_kk" :value="__('No. KK')" />
            <x-text-input type="text" id="no_kk" name="no_kk" class="block w-full" maxlength="16"
              value="{{ old('no_kk') }}" required />
            <x-input-error :messages="$errors->get('no_kk')" class="mt-2" />
          </div>

          <!-- Nama Lengkap -->
          <div class="mt-4">
            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
            <x-text-input type="text" id="nama_lengkap" name="nama_lengkap" class="block w-full"
              value="{{ old('nama_lengkap') }}" required />
            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
          </div>

          <!-- Jenis Kelamin -->
          <div class="mt-4">
            <x-input-label for="jk" :value="__('Jenis Kelamin')" />
            <select id="jk" name="jk" class="block w-full border-gray-300 rounded-md shadow-sm" required>
              <option value="">-- Pilih Jenis Kelamin --</option>
              <option value="Laki-laki" {{ old('jk') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
              <option value="Perempuan" {{ old('jk') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('jk')" class="mt-2" />
          </div>

          <!-- Kecamatan -->
          <div class="mt-4">
            <x-input-label for="district_id" :value="__('Kecamatan')" />
            <select id="district_id" name="district_id" class="block w-full border-gray-300 rounded-md shadow-sm"
              required>
              <option value="">-- Pilih Kecamatan --</option>
              @foreach ($districts as $district)
                <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                  {{ $district->name }}
                </option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('district_id')" class="mt-2" />
          </div>

          <!-- Desa -->
          <div class="mt-4">
            <x-input-label for="village_id" :value="__('Desa')" />
            <select id="village_id" name="village_id" class="block w-full border-gray-300 rounded-md shadow-sm"
              required>
              <option value="">-- Pilih Desa --</option>
            </select>
            <x-input-error :messages="$errors->get('village_id')" class="mt-2" />
          </div>

          <!-- Alamat -->
          <div class="mt-4">
            <x-input-label for="alamat_penerima" :value="__('Alamat')" />
            <textarea id="alamat_penerima" name="alamat_penerima" class="block w-full border-gray-300 rounded-md shadow-sm"
              required>{{ old('alamat_penerima') }}</textarea>
            <x-input-error :messages="$errors->get('alamat_penerima')" class="mt-2" />
          </div>

          <!-- Status DTKS -->
          <div class="mt-4">
            <x-input-label for="dtks_status" :value="__('Status DTKS')" />
            <select id="dtks_status" name="dtks_status" class="block w-full border-gray-300 rounded-md shadow-sm"
              required>
              <option value="">-- Pilih Status --</option>
              <option value="Terdaftar" {{ old('dtks_status') == 'Terdaftar' ? 'selected' : '' }}>Terdaftar</option>
              <option value="TidakTerdaftar" {{ old('dtks_status') == 'TidakTerdaftar' ? 'selected' : '' }}>Tidak
                Terdaftar</option>
            </select>
            <x-input-error :messages="$errors->get('dtks_status')" class="mt-2" />
          </div>

          <!-- Kategori -->
          <div class="mt-4">
            <x-input-label for="kategori" :value="__('Kategori')" />
            <select id="kategori" name="kategori" class="block w-full border-gray-300 rounded-md shadow-sm" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="Lansia" {{ old('kategori') == 'Lansia' ? 'selected' : '' }}>Lansia</option>
              <option value="Penyandang Disabilitas"
                {{ old('kategori') == 'Penyandang Disabilitas' ? 'selected' : '' }}>Penyandang Disabilitas</option>
              <option value="Yatim Piatu" {{ old('kategori') == 'Yatim Piatu' ? 'selected' : '' }}>Yatim Piatu</option>
              <option value="Keluarga Miskin" {{ old('kategori') == 'Keluarga Miskin' ? 'selected' : '' }}>Keluarga
                Miskin</option>
            </select>
            <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
          </div>

          <!-- Status Hidup -->
          <div class="mt-4">
            <x-input-label for="status_hidup" :value="__('Status Hidup')" />
            <select id="status_hidup" name="status_hidup" class="block w-full border-gray-300 rounded-md shadow-sm"
              required>
              <option value="">-- Pilih Status Hidup --</option>
              <option value="Hidup" {{ old('status_hidup') == 'Hidup' ? 'selected' : '' }}>Hidup</option>
              <option value="Meninggal" {{ old('status_hidup') == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
            </select>
            <x-input-error :messages="$errors->get('status_hidup')" class="mt-2" />
          </div>

          <!-- Submit Button -->
          <div class="mt-4">
            <x-primary-button class="float-right">
              {{ __('Tambah Penerima') }}
            </x-primary-button>
            <a href="{{ route('penerima.index') }}"
              class="float-right px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back</a>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Script untuk Mengisi Desa Berdasarkan Kecamatan -->
  <script>
    document.getElementById('district_id').addEventListener('change', function() {
      let districtId = this.value;
      let villageSelect = document.getElementById('village_id');

      villageSelect.innerHTML = '<option value="">-- Pilih Desa --</option>';

      if (districtId) {
        fetch(`/get-villages/${districtId}`)
          .then(response => response.json())
          .then(data => {
            data.forEach(village => {
              villageSelect.innerHTML += `<option value="${village.id}">${village.name}</option>`;
            });
          });
      }
    });
  </script>
</x-app-layout>
