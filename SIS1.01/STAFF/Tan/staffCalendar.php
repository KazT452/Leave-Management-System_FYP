<?php
    require_once "../../dbconnection.php";
    include('../class/User.php');

    $user = new User();
    $user->adminLoginStatus();
    $today = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <title>Leave Dashboard</title>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="main-dashboard d-flex">
            <nav class="sidebar collapsed border-end vh-100">
                <div class="position-sticky pt-4 px-3">
                    <ul class="nav flex-column gap-2 mt-4">
                        <li class="nav-item">
                            <a class="nav-link border-transparent py-3 ps-4" href="../Tan/staffdashboard.php">
                                <span class="fa fa-calendar-check me-3"></span> Leave Management
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link active bg-white shadow-sm border-start border-primary border-4 py-3 ps-4" href="#">
                                <span class="fa fa-calendar-check me-3"></span> Leave Calendar
                            </a>
                        </li>
                        <li class="nav-item mt-5 pt-5">
                            <a class="nav-link text-danger py-3 ps-4 border-top" href="../home.php">
                                <span class="fa fa-sign-out-alt me-3"></span> Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content-area p-4 w-100">
                <div class="d-flex align-items-center pb-3 mb-4 border-bottom">
                    <button class="btn btn-dark me-3" id="sidebarToggle" style="width: 45px; height: 45px;">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="lh-sm">
                        <h2 class="fw-bold mb-0" style="letter-spacing: -0.5px;">Leave Calendar</h2>
                        <small class="text-muted">
                            Welcome back,
                            <span class="fw-bold text-primary">
                                <?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'User'; ?>
                            </span>
                        </small>
                    </div>
                </div>

                <!-- Calendar Grid Container -->
                <div id='calendar'></div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                // This calls your separate get_events.php file asynchronously via AJAX
                events: 'get_events.php',
                selectable: true,
                dateClick: function(info) {
                    alert('Clicked date: ' + info.dateStr);
                }
            });
            calendar.render();
        });

        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>
</html>