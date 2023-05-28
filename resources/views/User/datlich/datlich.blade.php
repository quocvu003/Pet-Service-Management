@extends('user.main')

@section('content')
    <section style="margin-bottom: 50px">
        <div class="row" style="margin: 80px 100px 0 100px ">
            @include('admin.alert')
            <div class="card card-body border-0 shadow mt-3 mb-5">
                <form action="" method="POST">
                    <h3 style="margin: 30px 0;text-align: center">Đặt dịch vụ của {{ $shops->ten }}</h3>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="menu">Tên Shop</label>
                                <label name="tenshop" class="form-control">{{ $shops->ten }} </label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <label name="diachi" class="form-control">{{ $shops->diachi }} </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Tên người đặt lịch</label>
                                <input type="text" name="ten" value="{{ $user->ten }}" class="form-control"
                                    placeholder="Nhập tên">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                    placeholder="Nhập email">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Số điện thoại</label>
                                <input type="text" name="sdt" value="{{ $user->sdt }}" class="form-control"
                                    placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Ngày</label>
                                <input type="date" name="ngay" id="ngay" value="{{ old('ngay') }}"
                                    min="{{ date('Y-m-d') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Giờ</label>
                                <input type="time" name="gio" id="gio" value="{{ old('gio') }}"
                                    class="form-control" pattern="(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]">
                            </div>
                        </div>




                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Loại thú cưng</label>
                                <select class="form-control" name="loaithucung">
                                    <option value="">Chọn loại</option>
                                    <option value="1">Chó</option>
                                    <option value="2">Mèo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <form action="" method="post" autocomplete="off">

                            <div class="field">
                                <input type="text" name="notes[]">
                                <span onclick="addField(this)">+</span>
                                <span onclick="removeField(this)">-</span>
                            </div>




                        </form>
                    </div> --}}
                    <div class="row">

                        <div class="col-md-8 mb-3">

                            <label for="services">Dịch vụ </label><br>
                            @foreach ($shops->dichvus as $dichvu)
                                <input type="checkbox" id={{ $dichvu->id }} name="dichvu[]" value={{ $dichvu->id }}
                                    {{ $dichvu->id == $dichvus->id ? 'checked' : '' }}
                                    onchange="handleCheckBox({{ $dichvu->gia }},event)">

                                <label for={{ $dichvu->id }}>{{ $dichvu->ten }} - Giá :
                                    {{ number_format($dichvu->gia) }}
                                    VNĐ </label><br>
                            @endforeach
                        </div>

                        <div class="col-md-4 mb-3">

                            <label for="menu">Tổng giá (VNĐ)</label>
                            <div class="form-group">
                                <input class="form-control" name='tongtien' id='tongtien' value={{ $dichvus->gia }}
                                    hidden>

                                <input class="form-control" name='tongtiensting' id='tongtiensting'
                                    value={{ number_format($dichvus->gia) }} disabled>

                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Đặt lịch</button>
                        </div>
                    </div>

            </div>
        </div>


        <input type="hidden" name="shop_id" value="{{ $shops->id }}">
        <input type="hidden" name="taikhoan_id" value="{{ $user->id }}">


        @csrf
        </form>
    </section>
@endsection
<style>
    input[type="checkbox"] {
        display: inline-block;
        width: auto;
        margin-right: 10px;
    }

    label {
        display: inline-block;
        margin-bottom: 10px;
    }

    h1 {
        text-align: center;
        color: #888;
    }

    .notes {
        padding: 20px;
    }

    .notes p {
        border-bottom: thin dotted #d4d4d4;
        padding: 20px 10px 0px 0px;
        font-style: italic;
        font-size: 18px;
    }

    .notes p span {
        font-size: 16px;
        float: right;
        cursor: pointer;
        display: inline-block;
    }

    .notes p span.mark {
        color: green;
        font-size: 30px;
        transform: translateY(-10px);
    }

    form {
        width: 100%;
    }

    .field {
        margin-bottom: 10px;
        display: flex;
        transition: opacity 0.3s;
    }

    .field input {
        padding: 5px 10px;
        width: 100%;
        border: none;
        border: thin solid #d4d4d4;
        font-size: 20px;
        color: #888;
        font-family: ubuntu, sans-serif;
        background-color: #f9f9f9;
    }

    .field input:focus {
        outline: none;
    }

    .field span {
        display: inline-block;
        margin-left: 10px;
        cursor: pointer;
        background-color: #f9f9f9;
        padding: 10px;
        font-size: 20px;
        transition: all 0.3s;
        font-weight: bold;
        border: thin solid #d4d4d4;
    }

    .field span:last-child {
        display: none;
        padding: 12px;
    }

    .field span:hover {
        background-color: green;
        border: thin solid green;
        color: #fff;
    }

    .field span:last-child:hover {
        background-color: red;
        border: thin solid red;
        color: #fff;
    }


    button {
        display: block;
        padding: 10px 20px;
        margin-top: 30px;
        width: 150px;
        float: left;
        font-size: 16px;
        background-color: #5b8ebf;
        border: thin solid #d5e4d4;
        cursor: pointer;
        color: #fff;
    }

    button:active {
        background-color: #aedea6;
        color: #000;
    }

    .reset {
        float: right;
        background-color: green;
    }
</style>

<script>
    function handleCheckBox(gia, event) {
        console.log(event.target.checked);
        let tien = Number($('#tongtien').val())
        if (event.target.checked) {
            tien = tien + gia
        } else {
            tien = tien - gia

        }
        let tienFormat = tien.toLocaleString('it-IT', {
            style: 'currency',
            currency: 'VND'
        })
        $('#tongtien').val(tien)
        $('#tongtiensting').val(tienFormat)

        console.log(tien.toLocaleString('it-IT', {
            style: 'currency',
            currency: 'VND'
        }));
    }

    function formatVND(tien) {

        let tienFormat = tien.toLocaleString('it-IT', {
            style: 'currency',
            currency: 'VND'
        })
        return tienFormat


    }
</script>
{{-- <script>
    function addField(plusElement) {

        let displayButton = document.querySelector("form button");

        // Stopping the function if the input field has no value.
        if (plusElement.previousElementSibling.value.trim() === "") {
            return false;
        }

        // creating the div container.
        let div = document.createElement("div");
        div.setAttribute("class", "field");

        // Creating the input element.
        let field = document.createElement("input");
        field.setAttribute("type", "text");
        field.setAttribute("name", "notes[]");

        // Creating the plus span element.
        let plus = document.createElement("span");
        plus.setAttribute("onclick", "addField(this)");
        let plusText = document.createTextNode("+");
        plus.appendChild(plusText);

        // Creating the minus span element.
        let minus = document.createElement("span");
        minus.setAttribute("onclick", "removeField(this)");
        let minusText = document.createTextNode("-");
        minus.appendChild(minusText);

        // Adding the elements to the DOM.
        form.insertBefore(div, displayButton);
        div.appendChild(field);
        div.appendChild(plus);
        div.appendChild(minus);

        // Un hiding the minus sign.
        plusElement.nextElementSibling.style.display = "block"; // the minus sign
        // Hiding the plus sign.
        plusElement.style.display = "none"; // the plus sign
    }

    function removeField(minusElement) {
        minusElement.parentElement.remove();
    }

    let form = document.forms[0];
    form.addEventListener("submit", fetchTextNotes);

    function fetchTextNotes(event) {
        // prevent the form to communicate with the server.
        event.preventDefault();

        // Fetch the values from the input fields.
        let data = new FormData(form);

        // Storing the values inside an array so we can handle them.
        // we don't want empty values.
        let notes = [];
        data.forEach(function(value) {
            if (value !== "") {
                notes.push(value);
            }
        });

        // Output the values on the screen.
        let out = "";
        for (let note of notes) {
            out += `
    <p>${note} <span onclick="markAsDone(this)">Mark as done</span></p>
`;
        }
        document.querySelector(".notes").innerHTML = out;

        // Delete all input elements except the last one.
        let inputFields = document.querySelectorAll(".field");
        inputFields.forEach(function(element, index) {
            if (index == inputFields.length - 1) {
                element.children[0].value = "";
            } else {
                element.remove();
            }
        });
    }

    function markAsDone(element) {
        element.classList.add("mark");
        element.innerHTML = "&check;";
    }
</script> --}}
