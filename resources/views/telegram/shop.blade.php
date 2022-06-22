@extends('telegram.layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8">
            <nav>
                <div class="nav nav-tabs animate__animated animate__fadeInDown" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-store" type="button"
                            role="tab"><i class="fa-solid fa-store"></i> Dukon
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-blog" type="button"
                            role="tab"><i class="fa-solid fa-rss"></i> Blog
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-about" type="button"
                            role="tab"><i class="fa-solid fa-headset"></i> FAQ
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-checkout" type="button"
                            role="tab"><i class="fa-solid fa-cart-shopping"></i><span
                            class="badge rounded-pill bg-danger cart-sum">0</span></button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-store" role="tabpanel">
                    <h2 class="animate__animated animate__fadeInUp text-center">Green Market ECO mahsulotlari</h2>
                    <div class="row">
                        <!-- product -->
                        @foreach ($products as $product)
                            <div class="col-4 product animate__animated animate__fadeInUp">
                                <img src="{{ $product['photo'] }}" alt="product">
                                <div class="position-relative">
                                    <span class="badge rounded-pill bg-danger price-badge">{{ $product['price'] }} s.</span>
                                </div>
                                <div class="btn-group btn-group-sm " role="group" data-product=\''.@json($product).'\'>
                                    <button type="button" class="btn btn-outline-info" data-rol="info" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                                    <button type="button" class="btn btn-outline-info" data-rol="save"><i class="fa-solid fa-heart"></i></button>
                                    <button type="button" class="btn btn-outline-info" data-rol="buy"><i class="fa-solid fa-cart-shopping"></i></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <pre id="logbox"></pre>
                </div>
                <div class="tab-pane fade" id="nav-blog" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <h2 class="animate__animated animate__fadeInUp text-center">Do'konimizdagi eng so'ngi
                        yangiliklar</h2>
                    <div id="carouselExampleIndicators" class="carousel slide animate__animated animate__fadeInUp"
                         data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://megaimkon.uzwebline.com/storage/photos/all_users/homepage-cat-img/4.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://megaimkon.uzwebline.com/storage/photos/all_users/homepage-cat-img/4.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://megaimkon.uzwebline.com/storage/photos/all_users/homepage-cat-img/4.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="card" style="margin-top:30px;" class="animate__animated animate__fadeInUp">
                        <img src="https://megaimkon.uzwebline.com/storage/photos/all_users/homepage-cat-img/4.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the
                                card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card" style="margin-top:30px;" class="animate__animated animate__fadeInUp">
                        <img src="https://megaimkon.uzwebline.com/storage/photos/all_users/homepage-cat-img/4.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the
                                card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card" style="margin-top:30px;" class="animate__animated animate__fadeInUp">
                        <img src="https://megaimkon.uzwebline.com/storage/photos/all_users/homepage-cat-img/4.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the
                                card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <h2 class="animate__animated animate__fadeInUp text-center">Texnik yordam bo'limi</h2>
                    <div class="accordion animate__animated animate__fadeInUp" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                    Texnik savol #1
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                    default, until the
                                    collapse plugin adds the appropriate classes that we use to style each element.
                                    These classes
                                    control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can
                                    modify any of this with custom CSS or overriding our default variables. It's
                                    also worth noting
                                    that just about any HTML can go within the <code>.accordion-body</code>, though
                                    the transition
                                    does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                    Texnik savol #2
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by
                                    default, until the
                                    collapse plugin adds the appropriate classes that we use to style each element.
                                    These classes
                                    control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can
                                    modify any of this with custom CSS or overriding our default variables. It's
                                    also worth noting
                                    that just about any HTML can go within the <code>.accordion-body</code>, though
                                    the transition
                                    does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                    Texnik savol #3
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by
                                    default, until the
                                    collapse plugin adds the appropriate classes that we use to style each element.
                                    These classes
                                    control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can
                                    modify any of this with custom CSS or overriding our default variables. It's
                                    also worth noting
                                    that just about any HTML can go within the <code>.accordion-body</code>, though
                                    the transition
                                    does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <h3 class="animate__animated animate__fadeInUp">Savolingizga javob topolmadingizmi ?</h3>
                    <form class="animate__animated animate__fadeInUp">
                        <div class="mb-3">
                            <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i
                                            class="fa-solid fa-mobile-screen"></i></span>
                                <input type="tel" class="form-control" placeholder="Phone..." name="phone">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="theme" class="form-label">Murojat mavzusi *:</label>
                            <select class="form-select form-control" name="theme" id="theme">
                                <option value="1" selected>Texnik yordam</option>
                                <option value="2">Mahsulot sifat nazorati</option>
                                <option value="3">Chegirmalar va aksiyalar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="method" class="form-label">Yuborish vositasi *:</label>
                            <select class="form-select form-control" id="method" name="method">
                                <option value="telegram" selected>Telegram</option>
                                <option value="email">Email</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Xabar...</label>
                            <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="sender">Yuborish</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-checkout" role="tabpanel">
                    <h2 class="animate__animated animate__fadeInUp text-center">Mahsulotlar savatchasi
                        <span class="btn btn-danger bg-danger checkout-clear"><i
                                class="fa-solid fa-trash-arrow-up"></i></span>
                    </h2>
                    <style>
                        img.card-thumps {
                            display: block;
                            max-width: inherit;
                            height: 50px;
                        }

                        .checkout-clear {
                            border-radius: 40%;
                        }
                    </style>
                    <ul class="list-group cart-list">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2">
                                <img src="img/1.png" alt="text" class="card-thumps">
                            </div>
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Mahsulot nomi</div>
                                <span>0.00 sum.</span>
                            </div>
                            <span class="badge bg-danger rounded-pill"><i
                                    class="fa-regular fa-trash-can"></i></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
