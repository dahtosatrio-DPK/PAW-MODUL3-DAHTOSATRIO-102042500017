@extends('layouts.app')

@section('title', 'Edit ' . $course->kode_mk)

@section('content')
<div style="max-width: 760px; margin: 0 auto;">
    <div style="margin-bottom: 1.25rem;">
        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-secondary btn-sm">
            Kembali ke Detail Mata Kuliah
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <h1 class="card-title">Edit Mata Kuliah</h1>
                <p class="card-subtitle">Perbarui data mata kuliah <strong>{{ $course->nama_mk }}</strong> ({{ $course->kode_mk }}).</p>
            </div>
            <span class="code-pill">{{ $course->kode_mk }}</span>
        </div>

        <div class="card-body">
            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1.25rem;">
                
                    <!-- Kode Mata Kuliah -->
                    <div>
                        <label>Kode Mata Kuliah</label>
                        <input
                            type="text"
                            name="kode_mk"
                            value="{{ old('kode_mk', $course->kode_mk) }}"
                            placeholder="Masukkan kode mata kuliah"
                        >

                        @error('kode_mk')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Nama Mata Kuliah -->
                    <div>
                        <label>Nama Mata Kuliah</label>
                        <input
                            type="text"
                            name="nama_mk"
                            value="{{ old('nama_mk', $course->nama_mk) }}"
                            placeholder="Masukkan nama mata kuliah"
                        >
        
                        @error('nama_mk')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- SKS -->
                <div>
                    <label>SKS</label>
                    <input
                        type="number"
                        name="sks"
                        value="{{ old('sks', $course->sks) }}"
                        min="1"
                        max="6"
                    >

                    @error('sks')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Semester -->
                <div>
                    <label>Semester</label>
                    <select name="semester">
                        <option value="">Pilih Semester</option>

                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}"
                                {{ old('semester', $course->semester) == $i ? 'selected' : '' }}>
                                Semester {{ $i }}
                            </option>
                        @endfor
                    </select>

                    @error('semester')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>

                    <!-- Semester -->
                    <div class="form-group">
                        <label for="semester" class="form-label">
                            Semester Perkuliahan <span class="required-indicator">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="semester" 
                            id="semester" 
                            class="form-control @error('semester') is-invalid @enderror" 
                            value="{{ old('semester', $course->semester) }}" 
                            required
                        >
                        @error('semester')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Dosen Pengampu -->
                <div class="form-group">
                    <label class="form-label">
                        Dosen Pengampu Utama
                    </label>
                    <div style="padding: 0.625rem 0.875rem; background-color: var(--slate-50); border: 1px solid var(--slate-200); border-radius: 6px; font-size: 0.875rem; color: var(--slate-800); font-weight: 600;">
                        {{ $course->dosen->name ?? Auth::user()->name }} ({{ $course->dosen->nomor_induk ?? Auth::user()->nomor_induk ?: '-' }})
                    </div>
                </div>

                <!-- Deskripsi / Silabus -->
                <div class="form-group">
                    <label for="deskripsi" class="form-label">
                        Silabus / Deskripsi Mata Kuliah
                    </label>
                    <textarea 
                        name="deskripsi" 
                        id="deskripsi" 
                        rows="4" 
                        class="form-control @error('deskripsi') is-invalid @enderror"
                    >{{ old('deskripsi', $course->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid var(--slate-200);">
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
