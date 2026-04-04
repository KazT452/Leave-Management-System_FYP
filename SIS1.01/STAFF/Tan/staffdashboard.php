<?php
	require_once "../../dbconnection.php";
    include('../class/User.php');
    $user = new User();
    $user->adminLoginStatus();
    $today = date('Y-m-d');
	$userid = $_SESSION['userid'];

    // Include the CASE logic here so 'display_status' always exists
    $sql = "SELECT *,
            CASE
                WHEN status = 'Pending' AND start_date < '$today' THEN 'Expired'
                ELSE status
            END AS display_status
            FROM leave_requests
            WHERE staff_id = $userid";

    // Filter by Date Range
    if (!empty($_GET['date_range'])) {
        $dates = explode(" to ", $_GET['date_range']);
        if (count($dates) == 2) {
            $start = date('Y-m-d', strtotime($dates[0]));
            $end = date('Y-m-d', strtotime($dates[1]));
            $sql .= " AND (start_date BETWEEN '$start' AND '$end')";
        }
    }

    // Filter by Status
	$isPending  = isset($_GET['pending']);
    $isApproved = isset($_GET['approved']);
    $isRejected = isset($_GET['rejected']);
    $isExpired  = isset($_GET['expired']);

    $statusFilters = [];
    if ($isPending)  $statusFilters[] = "(lr.status = 'Pending' AND lr.start_date >= '$today')";
    if ($isApproved) $statusFilters[] = "lr.status = 'Approved'";
    if ($isRejected) $statusFilters[] = "lr.status = 'Rejected'";
    if ($isExpired)  $statusFilters[] = "(lr.status = 'Pending' AND lr.start_date < '$today')";

    if (!empty($statusFilters)) {
        $sql .= " AND status IN (" . implode(',', $statusFilters) . ")";
    }

	// Filter by latest requests
	$sql .= " ORDER BY created_at DESC";

    $result = mysqli_query($conn, $sql);
    $requests = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <title>Leave Dashboard</title>
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
						<a class="nav-link text-danger py-3 ps-4 border-top" href="../home.php">
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
					<h2 class="fw-bold mb-0" style="letter-spacing: -0.5px;">Leave Dashboard</h2>
					<small class="text-muted">
						Welcome back,
						<span class="fw-bold text-primary">
							<?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'User'; ?>
						</span>
					</small>
				</div>

			</div>
			<div class="card shadow-sm border-0 mb-4 bg-light">
				<div class="card-body py-2">
					<div class="d-flex align-items-center justify-content-start flex-wrap gap-4">
						<div class="d-flex align-items-center gap-3 flex-wrap">
							<div style="min-width: 200px;">
								<input type="text" id="staffHistoryPicker" class="form-control form-control-sm bg-white" placeholder="Select dates">
							</div>

							<div class="vr d-none d-md-block" style="height: 20px;"></div>

							<div class="d-flex align-items-center gap-2">
								<span class="small fw-bold text-muted">Status:</span>
								<div class="form-check form-check-inline mb-0">
									<input class="form-check-input" type="checkbox" id="pending" value="Pending" <?php echo $isPending ? 'checked' : ''; ?>>
									<label class="form-check-label small" for="pending">Pending</label>
								</div>
								<div class="form-check form-check-inline mb-0">
									<input class="form-check-input" type="checkbox" id="approved" value="Approved">
									<label class="form-check-label small" for="approved">Approved</label>
								</div>
								<div class="form-check form-check-inline mb-0">
									<input class="form-check-input" type="checkbox" id="rejected" value="Rejected">
									<label class="form-check-label small" for="rejected">Rejected</label>
								</div>
								<div class="form-check form-check-inline mb-0">
									<input class="form-check-input" type="checkbox" id="expired" value="Expired">
									<label class="form-check-label small" for="expired">Expired</label>
								</div>
							</div>
						</div>

						<div>
							<button class="btn btn-primary btn-sm px-4 shadow-sm" onclick="filterHistory()">
								<span class="fa fa-search small"></span> Search
							</button>
						</div>
					</div>
				</div>
			</div>

			<div class="d-flex justify-content-between align-items-center mb-3">
				<h5 class="fw-bold mb-0 text-secondary">
					<span class="fa fa-list-ul me-2"></span>Leave Requests
				</h5>

				<button class="btn btn-success shadow-sm px-4 fw-bold" onclick="openCreateModal()">
					<span class="fa fa-plus-circle me-2"></span>Apply for New Leave
				</button>
			</div>

			<div class="table-responsive bg-white rounded shadow-sm">
				<table class="table table-hover align-middle mb-0">
					<thead class="table-light">
						<tr>
							<th class="text-center">Leave Type & ID</th>
							<th class="text-center">Duration</th>
							<th class="text-center">Reason</th>
							<th class="text-center">Attachment</th>
							<th class="text-center">Status</th>
							<th class="text-center">Days</th>
							<th class="text-center">Admin Remark</th>
							<th class="text-center pe-3">Actions</th>
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
								<td class="text-center;">
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
								<td class="text-center"><?php echo $row['leave_days']; ?></td>
								<td style="padding: 10px; max-width: 180px;">
									<div style="
										white-space: nowrap;
										overflow: hidden;
										text-overflow: ellipsis;
										cursor: help;"
										title="<?php echo htmlspecialchars($row['admin_remark'] ?? ''); ?>">
         								<?php echo htmlspecialchars($row['admin_remark'] ?? ''); ?>
									</div>
								</td>
								<td class="text-center pe-3">
									<?php if ($row['display_status'] == 'Pending'): ?>
										<button class="btn btn-sm btn-outline-primary" onclick="editLeave(<?php echo htmlspecialchars(json_encode($row)); ?>)">
											<span class="fas fa-edit"></span> Edit
										</button>
										<button onclick="deleteLeave(<?php echo $row['leave_id']; ?>)" style="color: red; cursor: pointer;">
											<span class="fas fa-trash"></span> Delete
    									</button>
									<?php else: ?>
										<button class="btn btn-sm btn-outline-secondary" disabled>
											<span class="fas fa-lock"></span> Edit
										</button>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div id="leaveModal" class="modal" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color: rgba(0,0,0,0.5);">
		<div class="modal-content" style="background-color: #fff; margin: 5% auto; padding: 25px; width: 90%; max-width: 550px; border-radius: 8px; position: relative;">
			<form id="leaveForm" action="submit_leave.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="leave_id" id="modal_leave_id" value="">
    			<h3 id="modalTitle">Apply for New Leave</h3>

				<div style="display: flex; gap: 20px; margin-bottom: 15px;">
					<div style="flex: 1;">
						<label><strong>Type</strong></label><br>
						<select name="leave_type" style="width: 100%; padding: 8px; margin-top: 5px;">
							<option value="Medical">Medical</option>
							<option value="Annual">Annual</option>
							<option value="Unpaid">Unpaid</option>
							<option value="Emergency">Emergency</option>
							<option value="Maternity">Maternity</option>
							<option value="Paternity">Paternity</option>
							<option value="Compassionate">Compassionate</option>
						</select>
					</div>

					<div style="flex: 1;">
						<label><strong>Date Selection</strong></label><br>
						<div style="display: flex; align-items: center; gap: 5px; margin-top: 5px;">
							<input type="date" id= "start_date" name="start_date" min="<?php echo $today; ?>" onchange="syncEndDate()" required style="padding: 5px; width: 100%;">
							<span>to</span>
							<input type="date" id="end_date" name="end_date" min="<?php echo $today; ?>" required style="padding: 5px; width: 100%;">
						</div>
					</div>
				</div>

				<div style="margin-bottom: 15px;">
					<label><strong>Reason (Optional)</strong></label><br>
					<textarea name="reason" rows="4" style="width: 100%; padding: 8px; margin-top: 5px; resize: vertical;" placeholder="Enter your reason here..."></textarea>
				</div>

				<div style="margin-bottom: 20px;">
					<label><strong>Additional Reference (MC / Documents)</strong></label><br>
					<input type="file" name="attachment" style="margin-top: 8px;">
				</div>

				<div style="display: flex; justify-content: flex-end; gap: 10px;">
					<button type="submit" style="padding: 10px 25px; background: #444; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Submit</button>
					<button type="button" onclick="closeModal()" style="padding: 10px 25px; background: #ccc; color: #333; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>

<script>
	const today = "<?php echo $today; ?>";
	// Initialize calendar to Filter/History view
	const picker = flatpickr("#staffHistoryPicker", {
        mode: "range",
        dateFormat: "m/d/Y",
        onClose: function(selectedDates, dateStr) {
            console.log("Searching history for: " + dateStr);
        }
    });

    function filterHistory() {
		//Get the range of date filter regardless
        const dateRange = document.getElementById('staffHistoryPicker').value;

		// Get statuses (Checkboxes)
		const pending = document.getElementById('pending').checked ? 'Pending' : '';
		const approved = document.getElementById('approved').checked ? 'Approved' : '';
		const rejected = document.getElementById('rejected').checked ? 'Rejected' : '';
		const expired = document.getElementById('expired').checked ? 'Expired' : '';

		// Build the URL with the search data
		// This sends data back to your dashboard page
		let url = "staffdashboard.php?date_range=" + encodeURIComponent(dateRange);

		if(pending)  url += "&pending=1";
		if(approved) url += "&approved=1";
		if(rejected) url += "&rejected=1";
		if(expired) url += "&expired=1";

		// Redirect the page to apply filters
		window.location.href = url;
    }

	function editLeave(data) {
		// Safety check: if for some reason the button was clickable, block the edit if it's expired.
		if (data.display_status === 'Expired') {
			alert("This request has expired and can no longer be edited.");
			return;
    	}
		// Change the Modal Title and Button text
		document.getElementById('modalTitle').innerText = "Edit Leave Request #" + data.leave_id;
		// Find the submit button and change its text
		const submitBtn = document.querySelector('#leaveForm button[type="submit"]');
		submitBtn.innerText = "Save Changes";

		// Fill the hidden ID field so PHP knows we are UPDATING
		document.getElementById('modal_leave_id').value = data.leave_id;

		// Fill the form fields with existing data from the database
		document.getElementsByName('leave_type')[0].value = data.leave_type;
		document.getElementById('start_date').value = data.start_date;
		document.getElementById('end_date').value = data.end_date;
		document.getElementsByName('reason')[0].value = data.reason;

		// Important: Update the 'min' date logic for the end date
		syncEndDate();

		// Open the modal
		document.getElementById('leaveModal').style.display = 'block';
	}

	function deleteLeave(id) {
		// A simple browser popup for safety
		if (confirm("Are you sure you want to delete this request? This cannot be undone.")) {
			// Redirect to the PHP script with the ID in the URL
			window.location.href = "delete_leave.php?id=" + id;
		}
	}

	function openCreateModal() {
		document.getElementById('modalTitle').innerText = "Apply for New Leave";
		document.querySelector('#leaveForm button[type="submit"]').innerText = "Submit";
		document.getElementById('modal_leave_id').value = ""; // Clear the ID
		document.getElementById('leaveForm').reset(); // Clear all fields
		document.getElementById('leaveModal').style.display = 'block';
	}

	function closeModal() {
		document.getElementById('leaveModal').style.display = 'none';
	}

	// Close modal if user clicks outside of the white box
	window.onclick = function(event) {
		let modal = document.getElementById('leaveModal');
		let reasonField = document.getElementsByName('reason')[0].value;

		if (event.target == modal) {
			// Get the current values of the fields
			const reason = document.getElementsByName('reason')[0].value;
			const startDate = document.getElementsByName('start_date')[0].value;
			const endDate = document.getElementsByName('end_date')[0].value;

			// If ANYTHING is filled in, ask for confirmation
			if (reason.length > 0 || startDate !== "" || endDate !== "") {
				if (confirm("You have entered details. Are you sure you want to close and lose your progress?")) {
					closeModal();
				}
			}
			else
			{
				// If the form is completely empty, just close it
				closeModal();
			}
		}
	}
	function syncEndDate() {
		const startInput = document.getElementById('start_date');
		const endInput = document.getElementById('end_date');

		if (startInput.value) {
			// Prevent past dates for the Start Date
			if (startInput.value < today) {
				startInput.value = today;
				alert("You cannot apply for leave in the past.");
			}

			// Set end date to start date to prevent being smaller than start date
			endInput.min = startInput.value;

			// PREDICTIVE FILL: If End Date is empty OR becomes invalid,
			// set it to match the Start Date automatically.
			if (!endInput.value || endInput.value < startInput.value) {
				endInput.value = startInput.value;
			}
		}
	}

	document.getElementById('sidebarToggle').addEventListener('click', function() {
		const sidebar = document.querySelector('.sidebar');
		const content = document.querySelector('.content-area');

		sidebar.classList.toggle('collapsed');
		content.classList.toggle('expanded'); // Optional: if you want the table to widen
	});
</script>
