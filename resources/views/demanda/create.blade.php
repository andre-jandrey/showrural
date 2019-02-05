@extends('layouts.master')

@section('content')
<!-- Breadcomb area Start-->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-form"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Cadastro de nova demanda</h2>
                                    <p>Preencha as informações corretamente</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Breadcomb area End-->
<!-- Form Examples area start-->
<div class="form-example-area">
    <div class="container">
        <div class="row">
            <form method='POST' action="{{ url('/demanda') }}">
                {{ csrf_field() }}         
                <div class="form-example-wrap">                    
                    <div class="col-md-6 form-example-int">
                        <div class="form-group">
                            <label>Variedade</label>
                            <div class="nk-int-st">
                                <select class="form-control selectpicker" name="variedade_id" data-live-search="true" placeholder="Enter Email">
                                    @foreach ($variedades as $variedade)
                                        <option value="{{ $variedade->id }}">{{ $variedade->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Quantidade</label>
                            <div class="nk-int-st">
                                <input type="number" name="quantidade" class="form-control input-sm" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-example-int mg-t-15">
                        <div class="form-group">
                            <label>Valor</label>
                            <div class="nk-int-st">
                                <input type="text" name="valor" class="form-control input-sm" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-example-int mg-t-15">
                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                            <label>Data</label>
                            <div class="input-group date nk-int-st">
                                <span class="input-group-addon"></span>
                                <input type="date" name="data" class="form-control" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 form-example-int mg-t-15">
                        <button type="submit" class="btn btn-success notika-btn-success">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    
    </div>
</div>
<!-- Form Examples area End-->
@endsection