<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>LG Imoveis - @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.2.0 core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    {{--  CSS Bootstrap 5 Local  --}}
    {{--  <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-utilities.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">  --}}

    <!-- CSS Global -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    <!-- Custom styles for Admin page -->
    <link href="{{ asset('css/sidebars.css') }}" rel="stylesheet">

    @livewireStyles

</head>


    @yield('content_global')

    <footer>
        {{--  Inicio do footer  --}}
            {{--  Inicio dos Scripts  --}}
            <!-- jquery 2.0 -->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

            {{--  CSS Bootstrap 5 Local  --}}
            {{--  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('js/bootstrap.esm.min.js') }}"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>  --}}

            {{--  popperjs  --}}
            <script src="https://unpkg.com/@popperjs/core@2"></script>

            {{--  BsMultiSelect  --}}
            <script src="{{ asset('js/BsMultiSelect.min.js') }}"></script>

            <script>
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

                $(function(){
                    $("#installations").bsMultiSelect({
                        useCssPatch: true,
                        containerClass: "installations",
                        css: {
                            choices: 'dropdown-menu overflow-auto h-25', // div.dropdown-menu - corpo principal da lista
                            choicesList: 'list-group-item', // div.dropdown-menu>ul (first child) - cada item da lista
                            choice_hover:  'bg-primary', // 'ul.dropdown-menu li.hover' - efeito mouse:hover de cada item da lista
                            choice_selected: 'active', // Item selecionado
                            choice_disabled: 'disabled', // item desativado

                            picks: 'form-select', // bs, in scss 'ul.form-control - campo select'
                            picks_focus: 'form-control', // not bs, in scss 'ul.form-control.focus - campo em foco'
                            picks_disabled: 'disabled', //  not bs, in scss 'ul.form-control.disabled'
                            pick_disabled: '',

                            pickFilter: 'form-control', // campo select não selecionado
                            filterInput_empty:'form-control', // campo select vazio
                            filterInput: {
                                border:'0px',
                                height:'auto',
                                boxShadow:'none',
                                padding:'0',
                                margin:'0',
                                outline:'none',
                                backgroundColor:'transparent',
                                backgroundImage:'none'
                            },

                            pick: 'badge text-dark mx-1', // Lista de itens selecionado
                            pickContent: 'p-2', // item selecionado
                            pickContent_disabled: 'disabled', // not bs, in scss 'ul.form-control li span.disabled'
                            pickButton: 'btn-close', // botão deselect

                            choice:  'dropdown-item', // Itens não escolhidos (não selecionados)
                            choiceCheckBox_disabled: 'disabled',
                            choiceContent: 'form-check',
                            choiceCheckBox: 'form-check-input',
                            choiceLabel: 'form-check-label',
                            choiceLabel_disabled: '',

                            label_floating_lifted: 'form-floating',
                            picks_floating_lifted: 'form-floating',

                            warning: 'alert-warning'
                      },
                        placeholder: 'Selecione toas as instalações',

                        staticContentGenerator:true,
                        getLabelElement:true,
                        pickContentGenerator:true,
                        choiceContentGenerator:true,
                        //buildConfiguration:true,
                        //isRtl:true, // *
                        setSelected:false,
                        required:false,
                        optionsAdapter:true,
                        options:true,
                        //getDisabled:true,
                        //getSize: true,
                        //getValidity:true,
                        labelElement:true,
                        valueMissingMessage:'',
                        getIsValueMissing:true

                    });
                });
            </script>


            <!-- yield Scripts -->
            @yield('scripts')

            @livewireScripts

            {{--  Fim dos Scripts  --}}
        {{--  Fim do footer  --}}
    </footer>
</body>
</html>

