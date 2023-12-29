<?php
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
?>
<div class="overlay">

</div>




<div class="container">
    <h1 class="text-center mt-3 mb-3">Food Data</h1>
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
                    <?= $food['fullname'] ?>
                </td>
                <td class="t-desc">
                    <?= $food['description'] ?>
                </td>
                <td>
                    <?= $food['price'] ?>
                </td>
                <td>
                    <?= $food['menu_name'] ?>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center w-fit">
                        <form onsubmit="return confirm('Xác nhận xóa')" action="destroy.php" method="post" class="me-2">
                            <button class="btn btn-danger btn-delete-food" name="id" value="<?= $food['id'] ?>"
                                type="submit">Delete</button>
                        </form>
                        <button class="btn btn-primary btn-edit-category me-2" type="button"
                            value="<?= $food['id'] ?>">Edit</button>
                        <button class="btn btn-warning btn-edit-image-food" data-edit="<?= $food['id'] ?>">
                            Image
                        </button>
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
const btnEditCategory = document.querySelectorAll(".btn-edit-category");
const formData = document.querySelector(".form-edit");
const formAdd = document.querySelector(".form-add");
const overlay = document.querySelector(".overlay");
const btnAdd = document.querySelector(".btn-add-category");
const btnCloseForm = document.querySelectorAll(".btn-close-form");
const inputMenuId = document.querySelector("#category-id");
const inputMenuName = document.querySelector("#category-name");
const inputMenuDescription = document.querySelector("#parent-id");
const btnChooseMenu = document.querySelectorAll(".btn-choose-menu");
const inputFoodImage = document.querySelector("input[name='food-image']");
const btnChooseMenuImage = document.querySelector(".btn-choose-image-file");
const boxImage = document.querySelector(".grid-box-image");
const inputEditFoodName = document.querySelector("#food-name-edit");
const inputEditFoodPrice = document.querySelector("#food-price-edit");

const inputEditFoodDescription = document.querySelector(".food-description-edit");

const boxDisplayImage = document.querySelector(".show-image img");
const inputEditFoodId = document.querySelector("#food-id-edit");
const labelEditMenuIds = document.querySelectorAll(".label-menu-id-edit");
const btnDeleteFood = document.querySelectorAll(".btn-delete-food");
const inputAddMoreFoodImage = document.querySelector('#add-more-food-images');
const inputFoodImageEdit = document.querySelector("#input-food-image");
const inputMenuIdEdit = document.querySelectorAll(".input-menu-id-edit");
const formEditFoodImage = document.querySelector(".form-edit-food-image");
const btnEditFoodImage = document.querySelectorAll(".btn-edit-image-food");
const inputIdEditFoodImage = document.querySelector("#input-food-id-edit-image");
const labelInputEditMainImageFood = document.querySelector("label[for='input-edit-main-image-food']");
const inputEditMainImageFood = document.querySelector("#input-edit-main-image-food");

inputEditMainImageFood.addEventListener("input", (e) => {
    labelInputEditMainImageFood.textContent = e.target.files[0].name;
})

btnEditFoodImage.forEach(btn => {
    btn.addEventListener("click", () => {
        const idEdit = btn.getAttribute("data-edit");
        inputIdEditFoodImage.value = idEdit.toString();
        formEditFoodImage.classList.add("active");
        overlay.classList.add("active");
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

inputFoodImage.addEventListener("input", (e) => {
    btnChooseMenuImage.textContent = "File selected: " + (e.target.files[0].name);
    boxDisplayImage.src = URL.createObjectURL(e.target.files[0]);
})

let prevBtnChooseMenu = null;



btnChooseMenu.forEach((btn) => {
    btn.addEventListener("click", () => {
        console.log(prevBtnChooseMenu);
        if (prevBtnChooseMenu != null) {
            prevBtnChooseMenu.classList.remove("btn-warning");
            prevBtnChooseMenu.nextElementSibling.checked = false;
        }
        btn.classList.add("btn-warning");
        btn.nextElementSibling.checked = true;
        prevBtnChooseMenu = btn;
    });
});

btnEditCategory.forEach((btn) => {
    btn.addEventListener("click", (event) => {
        event.preventDefault();
        overlay.classList.add("active");
        formData.classList.add("active");
        const id = btn.value;
        $.ajax({
            url: "./get-product-by-id.php",
            type: "POST",
            data: {
                id: btn.value,
            },
            success: function(data) {

                inputEditFoodId.value = data.id;
                inputEditFoodName.value = data.name;
                CKEDITOR.instances['product-content-edit'].setData(data.description);

                inputEditFoodPrice.value = data.price;
                inputFoodImageEdit.value = data.image;
                inputMenuIdEdit.forEach((input) => {
                    if (input.value == data.menu_id) {
                        input.checked = true;
                        input.previousElementSibling.classList.toggle(
                            "btn-warning");
                        prevBtnChooseMenu = input.previousElementSibling;

                    }
                })

                boxImage.textContent = "";
                let images = data.images;
                images.push({
                    name: data.image
                });

                images.forEach((img) => {
                    // <img src="images/spaghetti-bolognese-36.jpg" style="max-width: 200px; height: auto" class="rounded-3" alt="food image"/>
                    const imgTag = document.createElement("img");
                    imgTag.setAttribute("src", "../../public/storage/" + img.name);
                    imgTag.style.maxWidth = "200px";
                    imgTag.classList.add("rounded-3");
                    imgTag.setAttribute("alt", "food image");
                    boxImage.appendChild(imgTag);
                });
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

btnAdd.addEventListener("click", (event) => {
    event.preventDefault();
    overlay.classList.add("active");
    formAdd.classList.add("active");
});

inputAddMoreFoodImage.addEventListener("input", (e) => {

    const files = e.target.files;
    for (let i = 0; i < files.length; i++) {
        const src = URL.createObjectURL(files[i]);
        const imgTag = document.createElement("img");
        imgTag.setAttribute("src", src);
        imgTag.style.maxWidth = "200px";
        imgTag.classList.add("rounded-3");
        imgTag.setAttribute("alt", "food image");
        boxImage.appendChild(imgTag);
    }
})
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>