<?php
    require_once "../../../dbconnection.php";
    include('../../class/User.php');
    $user = new User();
    $user->adminLoginStatus();
    $today = date('Y-m-d');

    $sql = "SELECT
            lr.*,
            u.first_name,
            u.last_name,
            CONCAT(u.first_name, ' ', u.last_name) AS staff_name,
            CASE
                WHEN lr.status = 'Pending' AND lr.start_date < '$today' THEN 'Expired'
                ELSE lr.status
            END AS display_status
        FROM leave_requests lr
        JOIN user u ON lr.staff_id = u.id
        WHERE 1=1";

    // Filter by ID Search
    if (!empty($_GET['idSearch'])) {
        $id = mysqli_real_escape_string($conn, $_GET['idSearch']);
        $sql .= " AND lr.leave_id = $id";
    }

    // Filter by Employee Name
    if (!empty($_GET['staffPicker'])) {
    $name = mysqli_real_escape_string($conn, $_GET['staffPicker']);
    $sql .= " AND (CONCAT(u.first_name, ' ', u.last_name) LIKE '%$name%' OR u.first_name LIKE '%$name%' OR u.last_name LIKE '%$name%')";
    }

    // Filter by Date Range
    if (!empty($_GET['date_range'])) {
        $dates = explode(" to ", $_GET['date_range']);
        if (count($dates) == 2) {
            $start = date('Y-m-d', strtotime($dates[0]));
            $end = date('Y-m-d', strtotime($dates[1]));
            $sql .= " AND (lr.start_date BETWEEN '$start' AND '$end')";
        }
    }

    // Filter by Status
    $isPending  = isset($_GET['pending'])  || !isset($_GET['staffPicker']);
    $isApproved = isset($_GET['approved']);
    $isRejected = isset($_GET['rejected']);
    $isExpired  = isset($_GET['expired']);

    $statusFilters = [];
    if ($isPending)  $statusFilters[] = "(lr.status = 'Pending' AND lr.start_date >= '$today')";
    if ($isApproved) $statusFilters[] = "lr.status = 'Approved'";
    if ($isRejected) $statusFilters[] = "lr.status = 'Rejected'";
    if ($isExpired)  $statusFilters[] = "(lr.status = 'Pending' AND lr.start_date < '$today')";

    if (!empty($statusFilters)) {
        $sql .= " AND (" . implode(' OR ', $statusFilters) . ")";
    }

    // Filter by latest requests
    $sql .= " ORDER BY created_at DESC";

    $result = mysqli_query($conn, $sql);
    $requests = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Get list of employees for the search datalist
    $empResult = mysqli_query($conn, "SELECT CONCAT(first_name, ' ', last_name) AS full_name FROM user");

    $employees = [];

    if ($empResult) {
        while ($row = mysqli_fetch_assoc($empResult)) {
            // 2. Use 'full_name' here to match the SQL alias above
            $employees[] = $row['full_name'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.min.css">
	<link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <title>Leave Management</title>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="main-dashboard">
            <nav class="sidebar collapsed border-end vh-100">
                <div class="position-sticky pt-4 px-3">

                    <ul class="nav flex-column gap-2 mt-4">
                        <li class="nav-item">
                            <a class="nav-link active bg-white shadow-sm border-start border-primary border-4 py-3 ps-4" href="#">
                                <span class="fa fa-calendar-check me-3"></span> Leave Management
                            </a>
                        </li>
                        <li class="nav-item mt-5 pt-5">
                            <a class="nav-link text-danger py-3 ps-4 border-top" href="../dashboard.php">
                                <span class="fa fa-sign-out-alt me-3"></span> Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content-area">

                <div class="d-flex align-items-center pb-3 mb-4 border-bottom">

                    <button class="btn btn-dark me-3" id="sidebarToggle" style="width: 45px; height: 45px;">
                        <span class="fa fa-bars"></span>
                    </button>

                    <div class="lh-sm">
                        <h2 class="fw-bold mb-0" style="letter-spacing: -0.5px;">Leave Management</h2>
                        <small class="text-muted">
                            Welcome back, Administrator
                            <span class="fw-bold text-primary">
                                <?php echo isset($_SESSION['admin']) ? htmlspecialchars($_SESSION['admin']) : 'User'; ?>
                            </span>
                        </small>
                    </div>

                </div>

                <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Update Successful!</strong> The record has been saved.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="card shadow-sm border-0 mb-4 bg-light">
                    <div class="card-body">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-2">
                                <label class="form-label small fw-bold">Leave ID</label>
                                <input type="number" id="idSearch" class="form-control" placeholder="#1">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Employee Name</label>
                                <input list="employee-list" id="staffPicker" class="form-control" placeholder="Search staff..."
                                    value="<?php echo isset($_GET['staffPicker']) ? htmlspecialchars($_GET['staffPicker']) : ''; ?>">

                                <datalist id="employee-list">
                                    <?php foreach ($employees as $name): ?>
                                        <option value="<?php echo htmlspecialchars($name); ?>">
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Date Range</label>
                                <input type="text" id="staffHistoryPicker" class="form-control bg-white" placeholder="Select dates">
                            </div>
                            <div class="col-md-4 text-end">
                                <button class="btn btn-primary px-4" onclick="filterHistory()">Search</button>
                                <button class="btn btn-outline-secondary px-3" onclick="filterClear()">Clear</button>
                            </div>
                        </div>

                        <div class="mt-3 pt-2 border-top">
                            <span class="small fw-bold me-3">Filter by Status:</span>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="pending" value="Pending" <?php echo $isPending ? 'checked' : ''; ?>>
                                <label class="form-check-label small" for="pending">Pending</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="approved" value="Approved">
                                <label class="form-check-label small" for="approved">Approved</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="rejected" value="Rejected">
                                <label class="form-check-label small" for="rejected">Rejected</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="expired" value="Expired">
                                <label class="form-check-label small" for="expired">Expired</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive bg-white rounded shadow-sm">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="padding: 10px;">Employee Name</th>
                                <th style="padding: 10px;">Leave Type & ID</th>
                                <th style="padding: 10px;">Duration</th>
                                <th style="padding: 10px;">Reason</th>
                                <th style="padding: 10px;">Attachment</th>
                                <th style="padding: 10px;">Status</th>
                                <th style="padding: 10px;">Days</th>
                                <th style="padding: 10px;">Admin Remark</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="leaveTableBody">
                            <?php foreach ($requests as $row):
                                $currentStatus = $row['display_status'];

                                $statusClass = '';
                                if ($currentStatus == 'Pending') { $statusClass = 'status-pending'; }
                                elseif ($currentStatus == 'Approved') { $statusClass = 'status-approved'; }
                                elseif ($currentStatus == 'Rejected') { $statusClass = 'status-rejected'; }
                                elseif ($currentStatus == 'Expired') { $statusClass = 'status-expired'; }
                            ?>
                                <tr>
                                    <td style="padding: 10px;"><?php echo $row['staff_name']; ?></td>
                                    <td style="padding: 10px;">
                                        <div style="font-weight: bold;"><?php echo $row['leave_type']; ?></div>
                                        <div style="font-size: 0.75em; color: #888;">#<?php echo $row['leave_id']; ?></div>
                                    </td>
                                    <td style="padding: 10px;">
                                        <div style="font-weight: 500;">
                                            <?php echo date('m/d/Y', strtotime($row['start_date'])); ?>
                                            <span style="color: #888;">→</span>
                                            <?php echo date('m/d/Y', strtotime($row['end_date'])); ?>
                                        </div>
                                    </td>
                                    <td style="padding: 10px; max-width: 180px;">
                                        <div style="
                                            white-space: nowrap;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            cursor: help;"
                                            title="<?php echo htmlspecialchars($row['reason']); ?>">
                                            <?php echo htmlspecialchars($row['reason']); ?>
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php if (!empty($row['attachment_path'])): ?>
                                            <a href="#" title="View Attached MC">📎</a>
                                        <?php else: ?>
                                            <span style="color: #ddd;">None</span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="padding: 10px;">
                                        <span class="<?php echo $statusClass; ?>">
                                            <?php echo $row['display_status']; ?>
                                        </span>
                                    </td>
                                    <td style="padding: 10px;"><?php echo $row['leave_days']; ?></td>
                                    <td style="padding: 10px; max-width: 180px;">
                                        <div style="
                                            white-space: nowrap;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            cursor: help;"
                                            title="<?php echo htmlspecialchars($row['admin_remark']?? ''); ?>">
                                            <?php echo htmlspecialchars($row['admin_remark']??''); ?>
                                        </div>
                                    </td>
                                    <td style="padding: 10px;">
                                        <?php if ($row['display_status'] == 'Pending'): ?>
                                            <button onclick="openActionModal(<?php echo htmlspecialchars(json_encode($row)); ?>)"
                                                    style="background-color: #28a745; color: white; border: none; padding: 5px 10px; cursor: pointer;"class="btn-review">Review</button>

                                            <?php elseif ($row['display_status'] == 'Expired'): ?>
                                                <small style="color: gray;">Locked (Expired)</small>

                                            <?php else: ?>
                                                <div style="display: flex; flex-direction: column; gap: 5px;">
                                                    <small style="color: #666;">Status: <strong><?php echo $row['display_status']; ?></strong></small>
                                                    <button onclick="openActionModal(<?php echo htmlspecialchars(json_encode($row)); ?>)"
                                                            style="font-size: 0.7em; background: #6c757d; color: white; border: none; padding: 3px 5px; cursor: pointer; border-radius: 3px;">
                                                        Modify Decision
                                                    </button>
                                                </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
					    </tbody>
                    </table>
                    <div id="reviewModal" class="modal" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color: rgba(0,0,0,0.5); font-family: sans-serif;">
                        <div class="modal-content" style="background-color: #fff; margin: 3% auto; padding: 30px; width: 95%; max-width: 700px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">

                            <h3 id="modalTitle" style="font-size: 1.6em; margin-top: 0; color: #333;">Review Leave Request</h3>
                            <hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 20px;">

                            <form action="process_leave.php" method="POST" style="font-size: 1.1em; line-height: 1.6;">
                                <input type="hidden" name="leave_id" id="review_leave_id">

                                <div style="margin-bottom: 15px;">
                                    <strong>Staff Member:</strong>
                                    <span id="review_staff_name" style="color: #0056b3; font-weight: bold;"></span>
                                </div>

                                <div style="margin-bottom: 15px;">
                                    <strong>Leave Type:</strong>
                                    <span id="review_leave_type"></span>
                                </div>

                                <div style="margin-bottom: 20px; background: #f9f9f9; padding: 15px; border-left: 5px solid #007bff; border-radius: 4px;">
                                    <strong>Staff Reason:</strong><br>
                                    <div id="review_reason" style="margin-top: 5px; color: #444; max-height: 150px; overflow-y: auto; word-wrap: break-word; white-space: pre-wrap;"></div>
                                </div>

                                <div style="margin-bottom: 20px;">
                                    <label><strong>Admin Decision Remarks:</strong></label>
                                    <textarea name="admin_remark" rows="5" style="width:100%; margin-top:10px; padding: 10px; font-size: 1em; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;" placeholder="Explain why this request is being approved or rejected..."></textarea>
                                </div>

                                <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 10px;">
                                    <button type="submit" name="action" value="Approved" style="background: #28a745; color: white; border:none; padding:12px 25px; border-radius:6px; cursor:pointer; font-weight: bold; font-size: 1em;">Approve Request</button>
                                    <button type="submit" name="action" value="Rejected" style="background: #dc3545; color: white; border:none; padding:12px 25px; border-radius:6px; cursor:pointer; font-weight: bold; font-size: 1em;">Reject Request</button>
                                    <button type="button" onclick="closeReviewModal()" style="background: #6c757d; color: white; border:none; padding:12px 25px; border-radius:6px; cursor:pointer; font-size: 1em;">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>

<script>
	// Initialize calendar to Filter/History view
	const picker = flatpickr("#staffHistoryPicker", {
        mode: "range",
        dateFormat: "m/d/Y",
        onClose: function(selectedDates, dateStr) {
            console.log("Searching history for: " + dateStr);
        }
    });

    function filterHistory() {
        const idSearch = document.getElementById('idSearch').value;
        const staffName = document.getElementById('staffPicker').value;
        const dateRange = document.getElementById('staffHistoryPicker').value;

        const pending = document.getElementById('pending').checked ? '1' : '';
        const approved = document.getElementById('approved').checked ? '1' : '';
        const rejected = document.getElementById('rejected').checked ? '1' : '';
        const expired = document.getElementById('expired').checked ? '1' : '';

        let url = "admindashboard.php?idSearch=" + encodeURIComponent(idSearch) +
                "&staffPicker=" + encodeURIComponent(staffName) +
                "&date_range=" + encodeURIComponent(dateRange);

        if(pending)  url += "&pending=1";
        if(approved) url += "&approved=1";
        if(rejected) url += "&rejected=1";
        if(expired)  url += "&expired=1";

        window.location.href = url;
    }

    function filterClear(){
        // 1. Reset the ID Search
        document.getElementById('idSearch').value = '';

        // 2. Reset the Employee Name Search
        document.getElementById('staffPicker').value = '';

        // 3. Reset the Date Range Picker
        document.getElementById('staffHistoryPicker').value = '';

        // 4. Reset the Checkboxes (Set 'Pending' to true, others to false)
        document.getElementById('approved').checked = false;
        document.getElementById('rejected').checked = false;

        // If you added a 'pending' checkbox, keep it checked by default
        if(document.getElementById('pending')) {
            document.getElementById('pending').checked = true;
        }

        // 5. Refresh the table view
        filterHistory();
    }

    function openActionModal(data) {
        // Fill the hidden input for the leave ID
        document.getElementById('review_leave_id').value = data.leave_id;

        // Fill the visible text for the Admin to see
        document.getElementById('review_staff_name').innerText = data.staff_name;
        document.getElementById('review_leave_type').innerText = data.leave_type;
        document.getElementById('review_reason').innerText = data.reason ? data.reason : "No reason provided";

        // Clear the remark field so it's fresh for every new review
        document.getElementsByName('admin_remark')[0].value = "";

        document.getElementById('reviewModal').style.display = 'block';

        // This line ensures the text area shows the previous remark automatically
        document.querySelector('#reviewModal textarea[name="admin_remark"]').value = data.admin_remark || "";

        document.getElementById('reviewModal').style.display = 'block';
    }

    function closeReviewModal() {
        document.getElementById('reviewModal').style.display = 'none';
    }

    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('collapsed');
    });
</script>
