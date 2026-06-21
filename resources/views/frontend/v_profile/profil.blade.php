@extends('layouts.layouts')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <form action="{{ route('frontend.v1.profile.update') }}" method="POST" enctype="multipart/form-data" 
              class="bg-white shadow-xl rounded-2xl overflow-hidden border" style="border-color: #D88C9A;">
            @csrf
            @method('PUT')
            
            <div class="h-32" style="background-color: #D88C9A;"></div>
            
            <div class="px-8 pb-8">
                <div class="relative -mt-16 mb-6 flex justify-center">
                    <div class="w-32 h-32 bg-white rounded-full p-1 shadow-md border-4 border-white cursor-pointer overflow-hidden flex items-center justify-center" 
                        onclick="document.getElementById('imageUpload').click()">
                        
                        @php
                            $fotoPath = Auth::guard('customer')->user()->foto;
                        @endphp

                        <div id="iconPlaceholder" class="w-full h-full rounded-full flex items-center justify-center {{ $fotoPath ? 'hidden' : '' }}" style="background-color: #fdf2f4; color: #D88C9A;">
                            <i class="fa-regular fa-user text-5xl"></i>
                        </div>

                        <img id="profilePreview" 
                            src="{{ $fotoPath ? asset('storage/'.$fotoPath) : '' }}" 
                            alt="Profile" 
                            class="w-full h-full rounded-full object-cover {{ $fotoPath ? '' : 'hidden' }}">
                        
                        <input type="file" name="foto" id="imageUpload" class="hidden" accept="image/*" onchange="previewProfileImage(event)">
                    </div>
                </div>

                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">{{ Auth::guard('customer')->user()->nama }}</h2>
                    <p class="font-medium" style="color: #D88C9A;">{{ Auth::guard('customer')->user()->email }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 rounded-xl border" style="background-color: #fdf2f4; border-color: #e5b9c1;">
                        <p class="text-xs uppercase tracking-widest font-bold" style="color: #D88C9A;">No. HP</p>
                        <p class="text-gray-700 font-semibold mt-1">{{ Auth::guard('customer')->user()->hp ?? 'Belum diatur' }}</p>
                    </div>
                    <div class="p-4 rounded-xl border" style="background-color: #fdf2f4; border-color: #e5b9c1;">
                        <p class="text-xs uppercase tracking-widest font-bold" style="color: #D88C9A;">Kode Pos</p>
                        <p class="text-gray-700 font-semibold mt-1">{{ Auth::guard('customer')->user()->pos ?? 'Belum diatur' }}</p>
                    </div>
                    <div class="p-4 rounded-xl border" style="background-color: #fdf2f4; border-color: #e5b9c1;">
                        <p class="text-xs uppercase tracking-widest font-bold" style="color: #D88C9A;">Jenis Kelamin</p>
                        <p class="text-gray-700 font-semibold mt-1">{{ Auth::guard('customer')->user()->gender ?? 'Belum diatur' }}</p>
                    </div>
                    <div class="p-4 rounded-xl border" style="background-color: #fdf2f4; border-color: #e5b9c1;">
                        <p class="text-xs uppercase tracking-widest font-bold" style="color: #D88C9A;">Umur</p>
                        <p class="text-gray-700 font-semibold mt-1">{{ Auth::guard('customer')->user()->umur ? Auth::guard('customer')->user()->umur . ' Tahun' : 'Belum diatur' }}</p>
                    </div>
                    <div class="p-4 rounded-xl border" style="background-color: #fdf2f4; border-color: #e5b9c1;">
                        <p class="text-xs uppercase tracking-widest font-bold" style="color: #D88C9A;">Negara</p>
                        <p class="text-gray-700 font-semibold mt-1">{{ Auth::guard('customer')->user()->negara ?? 'Belum diatur' }}</p>
                    </div>
                    <div class="p-4 rounded-xl border col-span-full" style="background-color: #fdf2f4; border-color: #e5b9c1;">
                        <p class="text-xs uppercase tracking-widest font-bold" style="color: #D88C9A;">Alamat Lengkap</p>
                        <p class="text-gray-700 font-semibold mt-1 leading-relaxed">{{ Auth::guard('customer')->user()->alamat ?? 'Belum diatur' }}</p>
                    </div>
                </div>

                <div class="mt-8 flex justify-center gap-4">
                    <button type="submit" class="px-8 py-3 text-white rounded-xl transition duration-300 font-semibold flex items-center gap-2 shadow-lg" 
                            style="background-color: #D88C9A; box-shadow: 0 4px 14px 0 rgba(216, 140, 154, 0.39);">
                        <i class="fa-solid fa-save"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function previewProfileImage(event) {
    const input = event.target;
    const preview = document.getElementById('profilePreview');
    const iconPlaceholder = document.getElementById('iconPlaceholder');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            iconPlaceholder.classList.add('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection