<!DOCTYPE html>
<html lang="en">

{{-- Head --}}
@extends('layout.head')

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
  <div class="container sticky top-0 z-sticky">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0">
      </div>
    </div>
  </div>
  <main class="mt-0 transition-all duration-200 ease-soft-in-out">
    <section>
      <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
        <div class="container z-10">
          <div class="flex flex-wrap mt-0 -mx-3">
            <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
              <div
                class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                  <h3
                    class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">
                    Silahkan Daftar</h3>
                  <p class="mb-0">Daftar akun terlebih dahulu</p>
                </div>
                @if($errors->any())
                <div class="pl-6">
                  @foreach($errors->all() as $error)
                  <p style="color: red">{{ $error }}</p>
                  @endforeach
                </div>
                @endif
                @if(session('success'))
                <div class="pl-6">
                  <p style="color: blue">{{ session('success') }}</p>
                </div>
                @endif
                <div class="flex-auto p-6">
                  <form method="POST" action="{{ route('register') }}" role="form">
                    @csrf

                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Nama</label>
                    <div class="mb-4">
                      <input type="text" name="nama" value="{{ old('nama') }}"
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                        placeholder="Nama" aria-label="Nama" aria-describedby="Nama-addon" />
                    </div>
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                    <div class="mb-4">
                      <input type="email" name="email" value="{{ old('email') }}"
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                        placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
                    </div>
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
                    <div class="mb-4">
                      <input type="password" name="password"
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                        placeholder="Password" aria-label="Password" aria-describedby="password-addon" />
                    </div>
                    {{-- Menambahkan kolom untuk No.KTP --}}
                    <div id="noKtpField" class="mb-4" style="display: none;">
                      <label for="no_ktp" class="mb-2 ml-1 font-bold text-xs text-slate-700">No.KTP</label>
                      <input type="text" name="no_ktp" value="{{ old('no_ktp') }}"
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                        placeholder="No.KTP" aria-label="No.KTP" aria-describedby="no-ktp-addon" />
                      <p>Catatan : Pastikan Nama dan No.KTP sesuai dengan yang didaftarkan oleh admin.</p>
                    </div>
                    {{-- Menambahkan kolom untuk No.HP --}}
                    <label id="noHpLabel" class="mb-2 ml-1 font-bold text-xs text-slate-700"
                      style="display: none;">No.HP</label>
                    <div id="noHpField" class="mb-4" style="display: none;">
                      <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                        placeholder="Nomor HP" aria-label="Nomor HP" aria-describedby="no-hp-addon" />
                      <p>Catatan : Pastikan Nama dan No.HP sesuai dengan yang didaftarkan oleh admin.</p>
                    </div>

                    {{-- Menambahkan script JavaScript untuk menangani perubahan pada select --}}
                    <script>
                      document.addEventListener('DOMContentLoaded', function () {
                        var roleSelect = document.getElementById('roleSelect');
                        var noKtpField = document.getElementById('noKtpField');
                        var noHpLabel = document.getElementById('noHpLabel');
                        var noHpField = document.getElementById('noHpField');

                        roleSelect.addEventListener('change', function () {
                          if (this.value === '2') { // Ganti nilai '2' dengan nilai role pasien
                            noKtpField.style.display = 'block';
                            noHpLabel.style.display = 'none'; // Sembunyikan label nomor HP jika role pasien
                            noHpField.style.display = 'none'; // Sembunyikan nomor HP jika role pasien
                          } else if (this.value === '3') { // Ganti nilai '3' dengan nilai role dokter
                            noKtpField.style.display = 'none'; // Sembunyikan no.KTP jika role dokter
                            noHpLabel.style.display = 'block'; // Tampilkan label nomor HP jika role dokter
                            noHpField.style.display = 'block'; // Tampilkan nomor HP jika role dokter
                          } else {
                            noKtpField.style.display = 'none';
                            noHpLabel.style.display = 'none';
                            noHpField.style.display = 'none';
                          }
                        });
                      });
                    </script>

                    <select id="roleSelect" name="role" class="mb-4 border border-solid border-gray-300 rounded p-2">
                      <option value="" disabled selected>Silahkan Pilih Role</option>
                      @foreach($roles as $role)
                      <option value="{{ $role->id }}">Daftar Sebagai : {{ $role->nama_role }}</option>
                      @endforeach
                    </select>

                    {{-- Menambahkan script JavaScript untuk menonaktifkan opsi "Silahkan Pilih Role" setelah memilih
                    role --}}
                    <script>
                      document.addEventListener('DOMContentLoaded', function () {
                        var roleSelect = document.getElementById('roleSelect');

                        roleSelect.addEventListener('change', function () {
                          // Nonaktifkan opsi "Silahkan Pilih Role" setelah memilih role
                          this.options[0].disabled = true;
                        });
                      });
                    </script>

                    <div class="text-center">
                      <button type="submit"
                        class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Daftar</button>
                    </div>
                  </form>

                </div>
                <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                  <p class="mx-auto mb-6 leading-normal text-sm">
                    sudah punya akun?
                    <a href="../formlogin"
                      class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Masuk</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
              <div
                class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                <div class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10"
                  style="background-image: url('../assets/img/curved-images/bacLogin.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>

</html>