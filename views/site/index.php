<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">CleanHome!</h1>

        <p class="lead fs-4">Лучший клиниг сервис в стране.</p>
    </div>

    <div class="body-content">

        <div class="row mb-5">
            <div class="col-lg-4 mb-3 text-center">
                <img src="../img/1.jpg" alt="" class="home_circle">
                <h2 class="fs-3 fw-normal">Качественный сервис</h2>
            </div>
            <div class="col-lg-4 mb-3 text-center">
                <img src="../img/1.jpg" alt="" class="home_circle">
                <h2 class="fs-3 fw-normal">Лучшие средства для очистки</h2>
            </div>
            <div class="col-lg-4 text-center">
                <img src="../img/1.jpg" alt="" class="home_circle">
                <h2 class="fs-3 fw-normal">Более 100+ довольных клиентов</h2>
            </div>
        </div>

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="../img/2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="../img/2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="../img/2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</div>