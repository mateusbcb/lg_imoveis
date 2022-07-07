@extends('layouts.page.page')

@section('content_page')
    <div>
        <div id="carousel" class="carousel slide carousel-fade mx-auto rounded shadow-lg my-5" style="width: 40%" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                {{--  data-bs-interval="5000" opicional, esse valor é o intervalo em milisegundos para cada item --}}
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="https://picsum.photos/id/10/1080" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/id/20/1080" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/id/30/1080" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-sm-12">

                    <div class="container px-4">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                            <div class="col mb-4">
                                <div class="p-3 border bg-light">Custom column padding</div>
                            </div>
                            <div class="col mb-4">
                                <div class="p-3 border bg-light">Custom column padding</div>
                            </div>
                            <div class="col mb-4">
                                <div class="p-3 border bg-light">Custom column padding</div>
                            </div>
                            <div class="col mb-4">
                                <div class="p-3 border bg-light">Custom column padding</div>
                            </div>
                            <div class="col mb-4">
                                <div class="p-3 border bg-light">Custom column padding</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-sm-12">

                    <div class="row row-cols-2 row-cols-sm-1">
                        <div class="col">
                            <h4>Categorias</h4>
                            <ul>
                                <li>Categoria 1</li>
                                <li>Categoria 2</li>
                                <li>Categoria 3</li>
                                <li>Categoria 4</li>
                                <li>Categoria 5</li>
                                <li>Categoria 6</li>
                            </ul>
                        </div>
                        <div class="col">
                            SIMULE SEU FINANCIAMENTO
                            <div class="container">
                                <div class="row ">
                                    <div class="col">
                                        <img src="{{ asset('img/flags/caixa.jpg') }}" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="{{ asset('img/flags/santander.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col">
                                        <img src="{{ asset('img/flags/itau.jpg') }}" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="{{ asset('img/flags/bradesco.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col">
                                        <img src="{{ asset('img/flags/banco-do-brasil.jpg') }}" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="{{ asset('img/flags/hsbc.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>

            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection
