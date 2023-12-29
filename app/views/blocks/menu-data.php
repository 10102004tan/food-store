<?php 
$page = 1;
if (isset($_GET["page"])){
    $page = $_GET['page'];
}

?>
<div class="overlay">
</div>
<div class="container">
    <h1 class="text-center mt-3 mb-3">Menu Data</h1>
    <div class="group-btn d-flex align-items-center justify-content-between">
        <div class="group-btn d-flex align-items-center justify-content-between">
            <form class="input-group d-flex align-items-center justify-content-center" style="max-width: 320px"
                action="find.php" method="GET">
                <input type="text" class="form-control menu-key" placeholder="Search ..." name="key">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary ms-2" type="submit">Search</button>
                </div>
            </form>
        </div>
        <button class="btn btn-info btn-add-category text-light" type="button">
            Add new Menu
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
                <th scope="col">Menu id</th>
                <th scope="col">Menu name</th>
                <th scope="col">Menu description</th>
                <th scope="col">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="body-data-menu">
            <?php foreach($menu_data as $menu): ?>
            <tr>
                <th scope="row"><?= $menu['id'] ?></th>
                <td><?= $menu['name'] ?></td>
                <td><?= $menu['description'] ?></td>
                <td>
                    <div class="d-flex align-items-center justify-content-center w-fit">
                        <form onsubmit="return confirm('Xác nhận xóa ?')" ; action="destroy.php" method="post"
                            class="me-2 form-delete-menu">
                            <button class="btn btn-danger btn-delete-menu" type="submit" name="id"
                                value="<?= $menu['id'] ?>">Delete</button>
                        </form>
                        <button value="<?=$menu['id'] ?>" class="btn btn-primary btn-edit-category" type="button"
                            data-edit="">Edit</button>
                    </div>
                </td>
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


<div class="form-add">
    <div class="btn-close-form">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x"
            viewBox="0 0 16 16">
            <path
                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
        </svg>
    </div>

    <h3 class="text-center mt-3 mb-3">Add data</h3>
    <form action="store.php" method="post">
        <div class="mb-3">
            <label for="category-name-add" class="form-label">Menu Name</label>
            <input type="text" class="form-control" id="category-name-add" name="name" required>
        </div>
        <div class="mb-3">
            <label for="parent-id-add" class="form-label">Menu Description</label>
            <input type="text" class="form-control" id="parent-id-add" name="description">
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
    <form action="update.php" method="post">
        <input type="number" class="form-control input-category-id menu-id" name="id" id="category-id" hidden>
        <div class="mb-3">
            <label for="category-name" class="form-label">Menu Name</label>
            <input type="text" class="form-control menu-name" id="category-name" name="name">
        </div>
        <div class="mb-3">
            <label for="parent-id" class="form-label">Menu Description</label>
            <input type="text" class="form-control menu-description" id="parent-id" name="description">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>

<!-- Script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
const btnEditCategory = document.querySelectorAll(".btn-edit-category");
const formData = document.querySelector(".form-edit");
const formAdd = document.querySelector(".form-add");
const overlay = document.querySelector(".overlay");
const btnAdd = document.querySelector(".btn-add-category");
const btnCloseForm = document.querySelectorAll(".btn-close-form");
const inputMenuNameEdit = formData.querySelector(".menu-name");
const inputMenuDescriptionEdit = formData.querySelector(".menu-description");
const inputMenuIdEdit = formData.querySelector(".menu-id");
const btnDeleteMenu = document.querySelectorAll(".btn-delete-menu");
const inputMenuKey = document.querySelector('.menu-key');




btnEditCategory.forEach((btn) => {
    btn.addEventListener("click", (event) => {
        formData.classList.add("active");
        inputMenuIdEdit.value = btn.value;
        $.ajax({
            url: "./get-menu-by-id.php",
            type: "POST",
            data: {
                id: btn.value,
            },
            success: function(data) {
                inputMenuNameEdit.value = data.name;
                inputMenuDescriptionEdit.value = data.description;
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
    overlay.classList.add("active");
    formAdd.classList.add("active");
});
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>