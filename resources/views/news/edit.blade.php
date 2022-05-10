@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Berita</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Tambah Berita</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('news.update', $news->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>JUDUL BERITA</label>
                                <input type="text" name="title" value="{{ old('title', $news->title) }}" placeholder="Masukkan Judul Berita" class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ISI BERITA</label>
                                <textarea class="form-control detail @error('detail') is-invalid @enderror" name="detail" placeholder="Masukkan Konten / Isi Berita" rows="10">{!! old('detail', $news->detail) !!}</textarea>
                                @error('detail')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop