<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>PHP TEST</title>
</head>
<body>
    <?php
    include_once './classes/model.class.php';
    $model = new Model();
    $insert = $model->insert();
    ?>
    <div class="container mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Product Add</h2>
                </div>
                <div class="col">
                </div>
                <div class="col text-right">
                    <a href="#">
                        <button
                            class="btn btn-primary mr-1"
                            type="submit"
                            name="submit"
                            form="addform"
                        >Save</button>
                      </a>
                    <a href="index.php">
                        <button class="btn btn-danger">Cancel</button>
                    </a>
                </div>
            </div>

            <hr />

            <div class="row justify-content-start pl-4">

                <form class="col-7" method="post" id="addform">
                    <div class="form-group row">
                        <label class="col-5 col-form-label">SKU</label>
                        <div class="col">
                            <input
                                type="text"
                                class="form-control text-uppercase"
                                name ="sku"
                                id="sku"
                                placeholder="Stock Keeping Unit"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-5 col-form-label">Name</label>
                        <div class="col">
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                placeholder="Product Name"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-5 col-form-label">Price ($)</label>
                        <div class="col">
                            <input
                                type="number"
                                step=".01"
                                class="form-control"
                                name="price"
                                id="price"
                                placeholder="0"
                                min="0"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-5 col-form-label">Type Switcher</label>
                        <div class="col">
                            <select required class="form-control" name="type" id="type-switcher">
                                <option selected disabled value="">Select a Type</option>
                                <option value="book">Book</option>
                                <option value="dvd">DVD</option>
                                <option value="furniture">Furniture</option>
                            </select>
                        </div>
                    </div>

                    <!-- BOOK Type -->
                    <div class="d-none product_type" id="book_type">
                        <div class="form-group row">
                            <label class="col-5 col-form-label">Weight (KG)</label>
                            <div class="col">
                                <input
                                    type="number"
                                    step=".01"
                                    class="form-control product_input book_input"
                                    name="book_weight"
                                    id="book_weight"
                                    placeholder="0"
                                    min="0"
                                />
                            </div>
                        </div>
                        <h6 class="text-muted">Please, provide weight</h6>
                    </div>

                    <!-- DVD Type -->
                    <div class="d-none product_type" id="dvd_type">
                        <div class="form-group row">
                            <label class="col-5 col-form-label">Size (MB)</label>
                            <div class="col">
                                <input
                                    type="number"
                                    step=".01"
                                    class="form-control product_input dvd_input"
                                    name="dvd_size"
                                    id="dvd_size"
                                    placeholder="0"
                                    min="0"
                                />
                            </div>
                        </div>
                        <h6 class="text-muted">Please, provide size</h6>
                    </div>

                    <!-- FURNITURE Type -->
                    <div class="d-none product_type" id="furniture_type">
                        <div class="form-group row">
                            <label class="col-5 col-form-label">Height (CM)</label>
                            <div class="col">
                                <input
                                    type="number"
                                    step=".01"
                                    class="form-control product_input furniture_input"
                                    name="furn_height"
                                    id="furn_height"
                                    placeholder="0"
                                    min="0"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-5 col-form-label">Width (CM)</label>
                            <div class="col">
                                <input
                                    type="number"
                                    step=".01"
                                    class="form-control product_input furniture_input"
                                    name="furn_width"
                                    id="furn_width"
                                    placeholder="0"
                                    min="0"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-5 col-form-label">Length (CM)</label>
                            <div class="col">
                                <input
                                    type="number"
                                    step=".01"
                                    class="form-control product_input furniture_input"
                                    name="furn_length"
                                    id="furn_length"
                                    placeholder="0"
                                    min="0"
                                />
                            </div>
                        </div>

                        <h6 class="text-muted">Please, provide dimensions</h6>
                    </div>
                </form>

            </div>
        </div>

        <hr />
        <div class="row justify-content-center">Scandiweb Test assignment</div>
    </div>
    <script>
        const list = $('#type-switcher');

        list.on('change',()=> {
            const selectedItem = list[0].value;
            const product_inputs = $('.product_input');
            const product_type = $('.product_type');

            // Classes
            product_type.removeClass('d-none');
            product_type.addClass('d-none');
            $(`#${selectedItem}_type`).removeClass('d-none');

            // Required
            $.each(product_inputs, (i, item) => {
                if (!item.hasAttribute('required')) {
                    return;
                } else {
                    item.removeAttribute('required');
                }

            });

            $(`.${selectedItem}_input`).attr("required", "required");

        });
    </script>
</body>
</html>