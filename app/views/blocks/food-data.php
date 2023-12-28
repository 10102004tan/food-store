<?php
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
?>
<div class="overlay">

</div>
<div class="form-edit-food-image">
    <div class="btn-close-form">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x"
            viewBox="0 0 16 16">
            <path
                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
        </svg>
    </div>

    <h3 class="text-center mt-3 mb-3">Edit main image food</h3>

    <form action="update-main-image.php" method="post" class="d-flex flex-column" enctype="multipart/form-data">
        <div class="mb-3">
            <!-- <label for="input-food-id-edit-image" class="form-label">Food Id</label> -->
            <input type="hidden" class="form-control" id="input-food-id-edit-image" name="id">
        </div>
        <label for="input-edit-main-image-food" class="upload-type">
            Choose image file
        </label>
        <input id="input-edit-main-image-food" hidden type="file" name="new-food-image" multiple />

        <button class="btn btn-warning btn-edit-image-food mt-3" type="submit">
            Update
        </button>
    </form>
</div>


<div class="form-add">
    <div class="btn-close-form">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x"
            viewBox="0 0 16 16">
            <path
                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
        </svg>
    </div>

    <h3 class="text-center mt-3 mb-3">Add data</h3>
    <form action="store.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="category-name-add" class="form-label">Food Name</label>
            <input type="text" class="form-control" id="category-name-add" name="name">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Food Description</label>
            <textarea id="product-content-add" class="form-control"  name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="parent-id-add" class="form-label">Food Price</label>
            <input type="number" class="form-control" id="parent-id-add" name="price">
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <label for="parent-id-a" class="form-label btn btn-primary btn-choose-image-file">Choose food
                    image</label>
                <input type="file" class="form-control" id="parent-id-a" name="image" multiple hidden>
            </div>

            <div class="show-image ms-3">
                <img src="images/default-image.png" alt="image" style="max-width: 200px" class="rounded-1" />
            </div>
        </div>

        <div class="mb-3 d-flex flex-column">
            <p>Choose menu</p>
            <div>
                <?php foreach ($menus_data as $menu_data) : ?>

                <label for="parent-id-add-c-<?= $menu_data['id'] ?>"
                    class="form-label btn btn-primary btn-choose-menu input-menu-id">
                    <?= $menu_data['name'] ?>
                </label>
                <input type="radio" class="form-control" id="parent-id-add-c-<?= $menu_data['id'] ?>" name="menu_id"
                    value="<?= $menu_data['id'] ?>" hidden>
                <?php endforeach ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>


<div class="form-edit">
    <div class="btn-close-form">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x"
            viewBox="0 0 16 16">
            <path
                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
        </svg>
    </div>

    <h3 class="text-center mt-3 mb-3">Edit data</h3>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="box-image mb-3">
            <div class="grid-box-image mb-3">
            </div>
            <input type="text" name="food-image" id="input-food-image" hidden />
            <label class="btn btn-primary mb-3" for="add-more-food-images">
                Add more image
                <input type="file" multiple hidden name="food-images[]" id="add-more-food-images" />
            </label>
            <div style="flex: 1" class="">
                <input type="text" class="form-control" id="food-id-edit" name="id" hidden>
                <div class="mb-3">
                    <label for="food-name-edit" class="form-label">Food Name</label>
                    <input type="text" class="form-control" id="food-name-edit" name="name">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Food Description</label>
                    <textarea id="product-content-edit" class="form-control food-description-edit"  name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="food-price-edit" class="form-label">Food Price</label>
                    <input type="number" class="form-control" id="food-price-edit" name="price">
                </div>
                <div class="mb-3 d-flex flex-column">
                    <p>Choose menu</p>
                    <div>
                        <?php foreach ($menus_data as $menu_data) : ?>
                        <label for="parent-id-add-c-<?= $menu_data['id'] ?>"
                            class="form-label btn btn-primary btn-choose-menu input-menu-id">
                            <?= $menu_data['name'] ?>
                        </label>
                        <input type="radio" class="form-control input-menu-id-edit"
                            id="parent-id-add-c-<?= $menu_data['id'] ?>" required name="menu_id"
                            value="<?= $menu_data['id'] ?>" hidden>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
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
        <button class="btn btn-info btn-add-category text-light" type="button">
            Add new food
        </button>
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
                <th scope="col">Food id</th>
                <th scope="col">Food image</th>
                <th scope="col">Food name</th>
                <th scope="col">Food description</th>
                <th scope="col">Food price</th>
                <th scope="col">Menu</th>
                <th scope="col">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($foods as $food) : ?>
            <tr>
                <th scope="row">
                    <?= $food['id'] ?>
                </th>
                <td>
                    <img src="../../public/storage/<?= $food['image'] ?>" alt="<?= $food['name'] ?>"
                        style="max-width: 200px" class="rounded-3" />
                </td>
                <td>
                    <?= $food['name'] ?>
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