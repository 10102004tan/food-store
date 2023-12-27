<div class="container">
    <h1 class="text-center mt-3 mb-3">Reservation Data</h1>
    <div class="group-btn d-flex align-items-center justify-content-between">
        <div class="group-btn d-flex align-items-center justify-content-between">
            <form class="input-group d-flex align-items-center justify-content-center" style="max-width: 320px"
                action="find.php" method="GET">
                <input type="text" class="form-control" placeholder="Search ..." name="key">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary ms-2" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Date</th>
                <th scope="col">People</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($reservations_data as $reservation_data): ?>
            <tr>
                <th scope="row"><?=$reservation_data['id'] ?></th>
                <td><?=$reservation_data['date'] ?>
                <td><?=$reservation_data['people'] ?></td>
                <td><?=$reservation_data['name'] ?></td>
                <td><?=$reservation_data['phone'] ?></td>
                <td><?=$reservation_data['email'] ?></td>
                <td>
                    <?php if ($reservation_data['status'] == 0) :?>
                    <p class="pending_approval btn btn-warning mb-0 reservation-status">Pending approval</p>
                    <?php endif ?>
                    <?php if ($reservation_data['status'] == 1) :?>
                    <p class="approved btn btn-success mb-0">Approved</p>
                    <?php endif ?>
                    <?php if ($reservation_data['status'] == 2) :?>
                    <p class="cancelled btn btn-danger mb-0">Cancelled</p>
                    <?php endif ?>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center w-fit list-btn-status">
                        <button class="btn btn-primary me-2 btn-status-reservation" value="1" type="button"
                            data-id="<?=$reservation_data['id'] ?>">Approved</button>
                        <button class="btn btn-danger me-2 btn-status-reservation" type="button" value="2"
                            data-id="<?=$reservation_data['id'] ?>">Cancelled</button>
                    </div>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="d-flex align-items-center justify-content-center w-100">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($page > 1) :?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?=($page - 1)?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php endif ?>
                <?php for($i = 1 ; $i <= $endPage ; $i++): ?>
                <li class="page-item <?= ($page == $i) ? "active" : ""?>">
                    <a class="page-link" href="index.php?page=<?=$i?>"><?= $i ?></a>
                </li>
                <?php endfor ?>

                <?php if ($page < $endPage) : ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?=($page + 1)?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
const listBtnStatus = document.querySelectorAll(".btn-status-reservation");
listBtnStatus.forEach(btn => {
    btn.addEventListener('click', function() {
        $.ajax({
            url: "update-status.php",
            type: "POST",
            data: {
                id: btn.getAttribute("data-id"),
                status: btn.value,
            },
            success: function(data) {
                alert(data);
                location.reload();
            },
            error: function(xhr) {

            }
        });
    })
})
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>