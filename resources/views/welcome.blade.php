<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Style -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Bootstrap -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

    <title>Projeto Pratico</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body>

    <div id='wrap'>

        <div id='external-events'>
            <h4>Esportes</h4>
            <button id="modalButton" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display: none;">
                Abrir Modal
            </button>


            <div id='external-events-list'>
                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                    <div class='fc-event-main'>Quadra poliesportiva</div>
                </div>
                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                    <div class='fc-event-main'>Basquete</div>
                </div>
                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                    <div class='fc-event-main'>Volêi</div>
                </div>
            </div>

            <p>
                <input type='checkbox' id='drop-remove' />
                <label for='drop-remove'>Remover ao arrastar</label>
            </p>
        </div>

        <div id='calendar-wrap'>
            <div id='calendar'></div>

            <!-- Modal Adicionar-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Criação de atividade esportiva</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput1" class="form-label">Evento</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Descrição</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="container">
                                            <div class="row row-cols-auto">
                                                <div class="col">

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label for="formGroupExampleInput" class="form-label">De:</label>
                                                                    <input type="date" class="form-control" id="formGroupExampleInput" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>Inicio</p>
                                                                    <input type="text" class="form-control" placeholder="Horário">
                                                                </div>
                                                                <div class="col">
                                                                    <p>Fim</p>
                                                                    <input type="text" class="form-control" placeholder="Horário">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="container mt-5">
                                                    <div class="card p-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="repeat" id="no-repeat" value="no-repeat">
                                                            <label class="form-check-label" for="no-repeat">
                                                                Não se repete
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="repeat" id="repeat" value="repeat" checked>
                                                            <label class="form-check-label" for="repeat">
                                                                Repetir
                                                            </label>
                                                        </div>
                                                        <div class="slider-container mt-3">
                                                            <label for="interval" class="form-label me-3">Intervalo de semanas:</label>
                                                            <input type="range" class="form-range" id="interval" name="interval" min="1" max="10" value="1">
                                                            <span id="interval-value" class="ms-3">1</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Visualizar-->
            <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel">Detalhes do Evento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Título:</strong> <span id="eventTitle"></span></p>
                            <p><strong>Descrição:</strong> <span id="eventDesc"></span></p>
                            <p><strong>Início:</strong> <span id="eventStart"></span></p>
                            <p><strong>Fim:</strong> <span id="eventEnd"></span></p>
                            <p><strong>Cor:</strong> <span id="eventColor"></span></p>
                            <div id="colorPreview" style="width: 100%; height: 30px;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src='/js/bootstrap/index.global.min.js'></script>
    <script src='/js/calendar/index.global.min.js'></script>
    <script src="/js/script.js"></script>
    <script src="/js/calendar/locales/locales-all.global.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>