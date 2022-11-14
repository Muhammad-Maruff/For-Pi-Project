<?php
  //Koneksi database
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "kinerjapegawai";

  //buat koneksi
  $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../dist/css/style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../dist/js/fullcalendar/lib/main.css" />
    <script src="../dist/js/fullcalendar/lib/main.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var calendarEl = document.getElementById("calendar");

        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: "dayGridMonth",
          height: 650,
          events: "fetchEvents.php",

          selectable: true,
          select: async function (start, end, allDay) {
            const { value: formValues } = await Swal.fire({
              title: "Add Event",
              html:
                '<input id="swalEvtTitle" class="swal2-input" placeholder="Enter title">' +
                '<textarea id="swalEvtDesc" class="swal2-input" placeholder="Enter description"></textarea>' +
                '<input id="swalEvtURL" class="swal2-input" placeholder="Enter URL">',
              focusConfirm: false,
              preConfirm: () => {
                return [
                  document.getElementById("swalEvtTitle").value,
                  document.getElementById("swalEvtDesc").value,
                  document.getElementById("swalEvtURL").value,
                ];
              },
            });

            if (formValues) {
              // Add event
              fetch("eventHandler.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                  request_type: "addEvent",
                  start: start.startStr,
                  end: start.endStr,
                  event_data: formValues,
                }),
              })
                .then((response) => response.json())
                .then((data) => {
                  if (data.status == 1) {
                    Swal.fire("Event added successfully!", "", "success");
                  } else {
                    Swal.fire(data.error, "", "error");
                  }

                  // Refetch events from all sources and rerender
                  calendar.refetchEvents();
                })
                .catch(console.error);
            }
          },

          eventClick: function (info) {
            info.jsEvent.preventDefault();

            // change the border color
            info.el.style.borderColor = "red";

            Swal.fire({
              title: info.event.title,
              icon: "info",
              html:
                "<p>" +
                info.event.extendedProps.description +
                '</p><a href="' +
                info.event.url +
                '">Visit event page</a>',
              showCloseButton: true,
              showCancelButton: true,
              cancelButtonText: "Close",
              confirmButtonText: "Delete Event",
            }).then((result) => {
              if (result.isConfirmed) {
                // Delete event
                fetch("eventHandler.php", {
                  method: "POST",
                  headers: { "Content-Type": "application/json" },
                  body: JSON.stringify({
                    request_type: "deleteEvent",
                    event_id: info.event.id,
                  }),
                })
                  .then((response) => response.json())
                  .then((data) => {
                    if (data.status == 1) {
                      Swal.fire("Event deleted successfully!", "", "success");
                    } else {
                      Swal.fire(data.error, "", "error");
                    }

                    // Refetch events from all sources and rerender
                    calendar.refetchEvents();
                  })
                  .catch(console.error);
              } else {
                Swal.close();
              }
            });
          },
        });

        calendar.render();
      });
    </script>
  </head>
  <body>
    <div class="containerr">
      <div class="wrapperr">
        <h1 class="text-center">CALENDAR</h1>
        <div id="calendar"></div>
      </div>
    </div>

    <table class="table table-striped table:hover table-bordered">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Description</th>
              <th>URL</th>
              <th>Start</th>
              <th>End</th>

            </tr>
            <?php
            $no = 1;
              //persiapan menampilkan data
            $user = mysqli_query($koneksi, "SELECT * FROM events order by id asc");
            while($account = mysqli_fetch_array($user)) :
            ?>

            <tr>
              <td><?= $no++?></td>
              <td><?= $account['title'] ?></td>
              <td><?= $account['description'] ?></td>
              <td><?= $account['url'] ?></td>
              <td><?= $account['start'] ?></td>
              <td><?= $account['end'] ?></td>
              
            </tr>
            <?php endwhile; ?>


      </table>
      <script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
  </body>
</html>
