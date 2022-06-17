@extends('layouts.main')

@section('title', 'Безопасность - ' . $user->name)

@section('content')
    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-lock"></i> Безопасность
            </h1>

        </div>
        <form action="">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Обновление эл. адреса и пароля</h2>
                            </div>
                            <div class="panel-content">
                                <!-- email -->
                                <div class="form-group">
                                    <label class="form-label" for="">Email</label>
                                    <input type="text" class="form-control" value="{{$user->email}}">
                                </div>

                                <!-- password -->
                                <div class="form-group">
                                    <label class="form-label" for="">Пароль</label>
                                    <input type="password" class="form-control">
                                </div>

                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button class="btn btn-warning waves-effect waves-themed">Изменить</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection