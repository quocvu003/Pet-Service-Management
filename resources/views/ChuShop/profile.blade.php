@extends('ChuShop.main')
@section('content')
    <main class="content">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow border-0 text-center p-0">
                    <div class="profile-cover rounded-top" style="background-color: rgb(170, 173, 132)">
                    </div>
                    <div class="card-body pb-5">
                        <img src="/template/ChuShop/assets/img/team/profile-picture-1.jpg"
                            class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                        <h4 class="h3">Neil Sims</h4>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">Thông tin chung</h2>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="first_name">Họ và tên</label>
                                    <input class="form-control" id="first_name" type="text"
                                        placeholder="Enter your first name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="last_name">Tên Shop</label>
                                    <input class="form-control" id="last_name" type="text"
                                        placeholder="Also your last name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <label for="birthday">Birthday</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input data-datepicker="" class="form-control" id="birthday" type="text"
                                        placeholder="dd/mm/yyyy" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender">Gender</label>
                                <select class="form-select mb-0" id="gender" aria-label="Gender select example">
                                    <option selected>Gender</option>
                                    <option value="1">Female</option>
                                    <option value="2">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" id="email" type="email" placeholder="name@company.com"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input class="form-control" id="phone" type="number" placeholder="+12-345 678 910"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-9 mb-3">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input class="form-control" id="address" type="text"
                                        placeholder="Enter your home address" required>
                                </div>
                            </div>

                        </div>

                        <div class="mt-3">
                            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
                        </div>
                    </form>
                </div>

            </div>






    </main>
@endsection
