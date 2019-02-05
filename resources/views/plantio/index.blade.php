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
                                    <i class="notika-icon notika-windows"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Todos os plantios</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->

 <div class="normal-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="normal-table-list mg-t-30">
                    <div class="basic-tb-hd">
                        <h2>Todos os Plantios</h2>
                    </div>
                    <div class="bsc-tbl-hvr">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#Lote</th>
                                    <th>Variedade</th>                                   
                                    <th>Quantidade</th>
                                    <th>Início</th>
                                    <th>Previsão Fim</th>
                                    <th>Produtor</th>
                                    <th>Endereço</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($plantios as $plantio)
                                    <tr>
                                        <td>{{ $plantio->id }}</td>
                                        <td>{{ $plantio->variedade->nome }}</td>
                                        <td>{{ $plantio->quantidade }}</td>
                                        <td>{{ date('d/m/Y', strtotime($plantio->inicio)) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($plantio->fim)) }}</td>
                                        {{-- <td>{{ $plantio->endereco->user->name }}</td> --}}
                                        <td>{{ $plantio->endereco->nome }}</td>                                        
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection