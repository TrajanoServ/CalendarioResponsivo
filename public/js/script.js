import { EventApi } from '@fullcalendar/core';

document.addEventListener("DOMContentLoaded", function () {
    var containerEl = document.getElementById("external-events-list");
    new FullCalendar.Draggable(containerEl, {
        itemSelector: ".fc-event",
        eventData: function (eventEl) {
            return {
                title: eventEl.innerText.trim(),
            };
        },
    });
    var calendarEl = document.getElementById("calendar");
    var calendar = new FullCalendar.Calendar(calendarEl, {

        dayRender: function(date, cell){
            if (moment().diff(date,'days') > 0){
                cell.css("background-color","silver");
            }
        },

        customButtons: {
            myCustomButton: {
                text: "Adicionar Incrição",
                click: function () {
                    // Seleciona o botão que abre o modal pelo ID
                    const modalButton = document.getElementById("modalButton");

                    // Aciona o clique no botão para abrir o modal
                    modalButton.click();
                },
            },
        },

        headerToolbar: {
            left: "prev,next today myCustomButton",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
        },

        themeSystem: "bootstrap5",
        locale: "pt-br",
        initialView: "timeGridWeek",
        // selectMirror: true,
        selectable: true,
        navLinks: true,
        dayMaxEvents: true,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        events: [
            {
                title: "Incrição - dia todo",
                start: "2024-07-19",
                color: "#D00E0E",
                desc: "Descrição teste",
            },
            {
                title: "Incrição 1",
                start: "2024-07-07",
                end: "2024-07-10",
                color: "#26B6A0",
                desc: "Descrição teste",
            },

            {
                groupId: 999,
                title: "Incrição repitido",
                start: "2024-07-09T16:40:00",
                desc: "Descrição teste",
            },
            {
                groupId: 999,
                title: "Incrição repetido",
                start: "2024-07-16T16:50:00",
                desc: "Descrição teste",
            },
            {
                title: "Incrição 2",
                start: "2024-07-11",
                end: "2024-07-13",
                desc: "Descrição teste",
            },
            {
                title: "Incrição 3",
                start: "2024-07-12T10:30:00",
                end: "2024-07-12T12:30:00",
                desc: "Descrição teste",
            },
            {
                title: "Incrição 4",
                start: "2024-07-12T12:15:00",
                desc: "Descrição teste",
            },
            {
                title: "Incrição 5",
                start: "2024-07-12T14:30:00",
                desc: "Descrição teste",
            },
            {
                title: "Incrição 6",
                start: "2024-07-12T17:30:00",
                desc: "Descrição teste",
            },
            {
                title: "Incrição 7",
                start: "2024-07-12T20:10:00",
                desc: "Descrição teste",
            },
        ],

        drop: function (arg) {
            // is the "remove after drop" checkbox checked?
            if (document.getElementById("drop-remove").checked) {
                // if so, remove the element from the "Draggable Events" list
                arg.draggedEl.parentNode.removeChild(arg.draggedEl);
            }
        },

        eventClick: function (info) {
            // Pega os dados do evento clicado
            const title = info.event.title;
            const desc = info.event.extendedProps.desc;
            const start = info.event.start;
            const end = info.event.end;
            let color = info.event.backgroundColor;

            if (!color) {
                color = "#35079e"; // Cor padrão se não especificada
            }

            // Atualiza o conteúdo do modal
            document.getElementById("eventTitle").innerText = title;
            document.getElementById("eventDesc").innerText = desc;
            document.getElementById("eventStart").innerText =
                start.toLocaleString();
            document.getElementById("eventEnd").innerText = end
                ? end.toLocaleString()
                : "N/A";
            document.getElementById("eventColor").innerText = color;

            // Atualiza a cor do preview
            document.getElementById("colorPreview").style.backgroundColor =
                color;

            // Abre o modal
            const eventModal = new bootstrap.Modal(
                document.getElementById("eventModal")
            );
            eventModal.show();
        },
 
    });
    calendar.render();
});

// Obtém a data de hoje
const today = new Date();

// Formata a data para o formato yyyy-mm-dd
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, "0");
const day = String(today.getDate()).padStart(2, "0");
const formattedDate = `${year}-${month}-${day}`;

// Define o valor do campo de data
document.getElementById("formGroupExampleInput").value = formattedDate;

document.getElementById("interval").addEventListener("input", function () {
    document.getElementById("interval-value").textContent = this.value;
});
