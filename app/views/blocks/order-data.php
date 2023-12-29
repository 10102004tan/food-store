<?php
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
?>
<div class="overlay">

</div>

<div class="form-edit"">
    <div class="btn-close-form">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x"
            viewBox="0 0 16 16">
            <path
                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
        </svg>
    </div>

    <h3 class="text-center mt-3 mb-3">Edit data</h3>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="box-image mb-3 row">
            <div class="col" style="min-width: 600px;">
                <input type="text" class="form-control" id="order-id-edit" name="id" hidden>
                <div class="mb-3">
                    <label for="order-name-edit" class="form-label">Customer name</label>
                    <input type="text" class="form-control" id="order-name-edit" name="fullname">
                </div>
                <div class="mb-3">
                    <label for="order-email-edit" class="form-label">Email</label>
                    <input id="order-email-edit" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="order-phone-edit" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="order-phone-edit" name="phone">
                </div>
                <div class="mb-3">
                    <label for="order-address-edit" class="form-label">Address</label>
                    <input type="text" class="form-control" id="order-address-edit" name="address">
                </div>
                <div class="mb-3 d-flex align-items-center" style="gap: 10px">
                    Payment status
                    <label for="order-payment-edit-2" class="form-label btn btn-success mb-0 label-payment">
                        unpaid
                        <input type="radio" class="form-control" id="order-payment-edit-2" name="payment-status" hidden value="0">
                    </label>
                    <label for="order-payment-edit-1" class="form-label btn btn-success mb-0 label-payment">
                        paid
                        <input type="radio" class="form-control" id="order-payment-edit-1" name="payment-status" hidden value="1">
                    </label>
                </div>
                <div class="mb-3 d-flex align-items-center" style="gap: 10px">
                    Delivery status
                    <label for="order-delivery-edit-3" class="form-label btn btn-success mb-0 label-delivery">
                        preparing
                        <input type="radio" class="form-control" id="order-delivery-edit-3" name="delivery-status" hidden value="0">
                    </label>
                    <label for="order-delivery-edit-1" class="form-label btn btn-success mb-0 label-delivery">
                        in transit
                        <input type="radio" class="form-control" id="order-delivery-edit-1" name="delivery-status" hidden value="1">
                    </label>
                    <label for="order-delivery-edit-2" class="form-label btn btn-success mb-0 label-delivery">
                        delivered                        
                        <input type="radio" class="form-control" id="order-delivery-edit-2" name="delivery-status" hidden value="2">
                    </label>
                </div>
            </div>
            <div class="box-product col" style="margin: 12px;">
                <div class="products" style="height: 400px; overflow-y: scroll">
                
                </div>
                <span class="total-pay">Total: 0$</span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>




<div class="container">
    <h1 class="text-center mt-3 mb-3">Order Data</h1>
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

    <?php if (isset($_SESSION['notify-success'])) : ?>
    <div class="alert alert-success mt-3">
        <?php echo $_SESSION['notify-success'];
                unset($_SESSION['notify-success']); ?>
    </div>
    <?php endif ?>

    <?php if (isset($_SESSION['notify-fail'])) : ?>
    <div class="alert alert-danger mt-3">
        <?= $_SESSION['notify-fail'];
                unset($_SESSION['notify-fail']); ?>
    </div>
    <?php endif ?>
    <table class="table w-100">
        <thead>
            <tr>
                <th scope="col">Order id</th>
                <th scope="col">Customer name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Payment status</th>
                <th scope="col">Delivery status</th>
                <th scope="col">Created at</th>
                <th scope="col">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) : ?>
            <tr>
                <th scope="row">
                    <?= $order['id'] ?>
                </th>
                <td>
                    <?= $order['fullname'] ?>
                </td>
                <td class="">
                    <?= $order['email'] ?>
                </td>
                <td>
                    <?= $order['phone'] ?>
                </td>
                <td>
                    <?= $order['address'] ?>
                </td>
                <td>
                <?php
                    if ($order["payment_status"] == 1) {
                        echo "<button class='btn btn-success'>paid</button>";
                    }else {
                        echo "<button class='btn btn-warning'>unpaid</button>";
                    }
                ?>
                </td>
                <td>
                <?php
                if ($order["delivery_status"] == 1) {
                    echo "<button class='btn btn-warning'>in transit</button>";
                }else if ($order["delivery_status"] == 0 ) {
                    echo "<button class='btn btn-warning'>preparing</button>";
                }else {
                    echo "<button class='btn btn-success'>delivered</button>";
                }
                ?>
                </td>
                <td>
                <?php
                    $timestamp = strtotime($order["created_at"]);
                    $formattedDate = date("F j, Y  H:i:s", $timestamp);
                    echo $formattedDate;
                    ?>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center w-fit">
                        <form action="destroy.php" method="post" class="me-2">
                            <button class="btn btn-danger btn-delete-food" name="id" value="<?= $order['id'] ?>"
                                type="submit">Delete</button>
                        </form>
                        <button class="btn btn-primary btn-edit-category me-2" type="button"
                            data-edit="<?= $order['id'] ?>">Edit</button>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="d-flex align-items-center justify-content-center w-100">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?= ($page - 1) ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php endif ?>
                <?php for ($i = 1; $i <= $endPage; $i++) : ?>
                <li class="page-item <?= ($page == $i) ? "active" : "" ?>">
                    <a class="page-link" href="index.php?page=<?= $i ?>">
                        <?= $i ?>
                    </a>
                </li>
                <?php endfor ?>

                <?php if ($page < $endPage) : ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?= ($page + 1) ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</div>

<!-- Script-->
<script>
CKEDITOR.replace('product-content-add');
CKEDITOR.replace('product-content-edit');
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
const btnEditOrders = document.querySelectorAll(".btn-edit-category");
const formData = document.querySelector(".form-edit");
const overlay = document.querySelector(".overlay");
const btnCloseForm = document.querySelectorAll(".btn-close-form");
const btnDeleteFood = document.querySelectorAll(".btn-delete-food");
const inputOrderId = document.querySelector("#order-id-edit");
const inputOrderCustomerName = document.querySelector("#order-name-edit");
const inputOrderEmail = document.querySelector("#order-email-edit");
const inputOrderPhone = document.querySelector("#order-phone-edit");
const inputOrderAddress = document.querySelector("#order-address-edit");
const boxProduct = document.querySelector(".products");
const totalPay = document.querySelector(".total-pay");

const labelDeliveries = document.querySelectorAll("label.label-delivery"); 
const labelPayments = document.querySelectorAll("label.label-payment"); 

let prevLableDelivery = null;
let prevLablePayment = null;

labelDeliveries.forEach((label) => {
    label.addEventListener("click", () => {
        if (prevLableDelivery != null) {
            prevLableDelivery.classList.remove("btn-danger");
        }
        label.classList.add("btn-danger");
        prevLableDelivery = label;
    })
})

labelPayments.forEach((label) => {
    label.addEventListener("click", () => {
        if (prevLablePayment != null) {
            prevLablePayment.classList.remove("btn-danger");
        }
        label.classList.add("btn-danger");
        prevLablePayment = label;
    })
})

btnDeleteFood.forEach((btn) => {
    btn.addEventListener("click", () => {
        const form = btn.parentElement;
        if (confirm("Are you sure to delete it ?")) {
            form.submit();
        }
    })
});

btnEditOrders.forEach((btn) => {
    btn.addEventListener("click", (event) => {
        event.preventDefault();
        overlay.classList.add("active");
        formData.classList.add("active");
        const id = btn.getAttribute("data-edit");
        $.ajax({
            url: "./get-order-by-id.php?id=" + id,
            type: "GET",
            success: function(data) {
                console.log(data);
                inputOrderId.value = data.id;
                inputOrderCustomerName.value = data.fullname;
                inputOrderEmail.value = data.email;
                inputOrderPhone.value = data.phone;
                inputOrderAddress.value = data.address;
                labelDeliveries[data.delivery_status].classList.add("btn-danger");
                prevLableDelivery = labelDeliveries[data.delivery_status];
                labelPayments[data.payment_status].classList.add("btn-danger");
                prevLablePayment = labelPayments[data.payment_status];
                const inputDeliveryStatus = labelDeliveries[data.delivery_status].childNodes[1];
                inputDeliveryStatus.checked = true;
                const inputPaymentStatus = labelPayments[data.payment_status].childNodes[1];
                inputPaymentStatus.checked = true;

                let html = "";
                let total = 0;
                data.details.forEach((detail) => {
                    total += (detail.product.price * detail.quantity);
                    html += `
                    <div class="product-item">
                        <img src="../../public/storage/${detail.product.image}" alt="product image">
                        <div class="product-infor">
                            <h3 class="product-name">${detail.product.name}</h3>
                            <p class="product-quantity">x${detail.quantity}</p>
                            <p class="product-price">
                                $${detail.product.price}
                            </p>
                        </div>
                    </div>`;
                })

                boxProduct.innerHTML = html;
                totalPay.innerHTML = "<b>Total:</b> $" + total;

                
            },
            error: function(xhr) {

            }
        });
    });
});

btnCloseForm.forEach((btn) => {
    btn.addEventListener("click", () => {
        overlay.classList.remove("active");
        btn.parentElement.classList.remove("active");
    });
});

</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>