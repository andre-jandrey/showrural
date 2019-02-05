@extends('layouts.master')

@section('content')

<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">5,472</span></h2>
                        <p>Transações Totais</p>
                    </div>
                    <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">16,000</span>k</h2>
                        <p>Produtores ativos</p>
                    </div>
                    <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2>R$<span class="counter">400,000</span></h2>
                        <p>Movimentado em vendas</p>
                    </div>
                    <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">390</span></h2>
                        <p>Visitas ao cooperado</p>
                    </div>
                    <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Status area-->
<!-- Start Sale Statistic area-->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="sale-statistic-inner notika-shadow mg-tb-30">
                    <div class="curved-inner-pro">
                        <div class="curved-ctn">
                            <h2>Estatísticas de Venda</h2>
                            <p>Acompanhe seus números</p>
                        </div>
                    </div>
                    <div id="curved-line-chart" class="flot-chart-sts flot-chart"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <div class="past-day-statis">
                        <h2>Nos últimos 30 dias</h2>
                        
                    </div>
                    <div class="dash-widget-visits"></div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">3,20,000</span></h3>
                            <p>Visualizações</p>
                        </div>
                        <div class="past-statistic-graph">
                            <div class="stats-bar"></div>
                        </div>
                    </div>                  
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">24,00,000</span></h3>
                            <p>Visitantes</p>
                        </div>
                        <div class="past-statistic-graph">
                            <div class="stats-bar-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sale Statistic area-->
<!-- Start Email Statistic area-->
<div class="notika-email-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <div class="email-ctn-round">
                        <div class="email-rdn-hd">
                            <h2>Email Statistics</h2>
                        </div>
                        <div class="email-statis-wrap">
                            <div class="email-round-nock">
                                <input type="text" class="knob" value="0" data-rel="55" data-linecap="round" data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true">
                            </div>
                            <div class="email-ctn-nock">
                                <p>Total Emails Sent</p>
                            </div>
                        </div>
                        <div class="email-round-gp">
                            <div class="email-round-pro">
                                <div class="email-signle-gp">
                                    <input type="text" class="knob" value="0" data-rel="75" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                </div>
                                <div class="email-ctn-nock">
                                    <p>Bounce Rate</p>
                                </div>
                            </div>
                            <div class="email-round-pro">
                                <div class="email-signle-gp">
                                    <input type="text" class="knob" value="0" data-rel="35" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                </div>
                                <div class="email-ctn-nock">
                                    <p>Total Opened</p>
                                </div>
                            </div>
                            <div class="email-round-pro sm-res-ds-n lg-res-mg-bl">
                                <div class="email-signle-gp">
                                    <input type="text" class="knob" value="0" data-rel="45" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                </div>
                                <div class="email-ctn-nock">
                                    <p>Total Ignored</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    <div class="recent-post-ctn">
                        <div class="recent-post-title">
                            <h2>Últimos Plantios</h2>
                        </div>
                    </div>
                    <div class="recent-post-items">
                        <div class="recent-post-signle rct-pt-mg-wp">
                            <a href="#">
                                <div class="recent-post-flex">
                                    <div class="recent-post-img">
                                        <img src="img/post/2.jpg" alt="" />
                                    </div>
                                    <div class="recent-post-it-ctn">
                                        <h2>Alface Roxa</h2>
                                        <p>Ínicio: 05/02/2019</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="recent-post-signle">
                            <a href="#">
                                <div class="recent-post-flex rct-pt-mg">
                                    <div class="recent-post-img">
                                        <img src="img/post/1.jpg" alt="" />
                                    </div>
                                    <div class="recent-post-it-ctn">
                                        <h2>Cenoura</h2>
                                        <p>Ínicio: 13/01/2019</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="recent-post-signle">
                            <a href="#">
                                <div class="recent-post-flex rct-pt-mg">
                                    <div class="recent-post-img">
                                        <img src="img/post/4.jpg" alt="" />
                                    </div>
                                    <div class="recent-post-it-ctn">
                                        <h2>Beterraba</h2>
                                        <p>Ínicio: 01/02/2019</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="recent-post-signle">
                            <a href="#">
                                <div class="recent-post-flex rct-pt-mg">
                                    <div class="recent-post-img">
                                        <img src="img/post/2.jpg" alt="" />
                                    </div>
                                    <div class="recent-post-it-ctn">
                                        <h2>Cebola</h2>
                                        <p>Ínicio: 23/01/2019</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="recent-post-signle">
                            <a href="#">
                                <div class="recent-post-flex rct-pt-mg">
                                    <div class="recent-post-img">
                                        <img src="img/post/1.jpg" alt="" />
                                    </div>
                                    <div class="recent-post-it-ctn">
                                        <h2>Alface Crespa</h2>
                                        <p>Ínicio: 05/02/2019</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="recent-post-signle">
                            <a href="#">
                                <div class="recent-post-flex rc-ps-vw">
                                    <div class="recent-post-line rct-pt-mg">
                                        <p>Ver todos</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                    <div class="rc-it-ltd">
                        <div class="recent-items-ctn">
                            <div class="recent-items-title">
                                <h2>Variedades</h2>
                            </div>
                        </div>
                        <div class="recent-items-inn">
                            <table class="table table-inner table-vmiddle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Ciclo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($variedades as $variedade)
                                        <tr>
                                            <td class="f-500 c-cyan">{{ $variedade->id }}</td>
                                            <td>{{ $variedade->nome }}</td>
                                            <td class="f-500 c-cyan">{{ $variedade->ciclo }}</td>
                                            <td class="f-500 c-cyan"><a href="#mailbox"><i class="notika-icon notika-trash"></i></td>
                                        </tr>
                                    @endforeach
                                  
                                    
                                </tbody>
                            </table>
                        </div>
                        <div id="todo-form">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 todo-inputbar">
                                    <form method='POST' action="{{ url('/variedade') }}">
                                    {{ csrf_field() }}
                                        <div class="form-group todo-flex">
                                            <div class="nk-int-st">
                                                <input type="text" id="todo-input-text" name="nome" class="form-control" placeholder="Nome">
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="number" id="todo-input-text" name="ciclo" class="form-control" placeholder="Ciclo (dias)">
                                            </div>
                                            <div class="todo-send">
                                            <button type="submit" class="btn-primary btn-md btn-block btn notika-add-todo" type="button" id="todo-btn-submit">Nova</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Email Statistic area-->
<
<!-- End Realtime sts area-->
@endsection
