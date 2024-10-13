<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <nav class="navbar navbar-expand-lg fw-bold shadow-lg mb-5" aria-label="Offcanvas navbar principal">
        <div class="container-fluid">
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <font-awesome-icon icon="fa-solid fa-bars" />
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-bold" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn ms-auto" data-bs-dismiss="offcanvas" aria-label="Close">
                        <font-awesome-icon icon="fa-solid fa-close" />
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <Link class="nav-link link-secondary" aria-current="page" :class="{ 'active': $page.url === '/' }" href="#">
                                <font-awesome-icon icon="fa-solid fa-house" />
                                Inicio
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link link-secondary" aria-current="page" :class="{ 'active': $page.url === '/dados' }" href="#">
                                <font-awesome-icon icon="fa-solid fa-gift" />
                                Planos
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link link-secondary" aria-current="page" :class="{ 'active': $page.url === '/dados-editados' }" href="#">
                                <font-awesome-icon icon="fa-solid fa-money-bill-wave" />
                                Faturas
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link link-secondary" aria-current="page" :class="{ 'active': $page.url === '/perfil' }" href="#">
                                <font-awesome-icon icon="fa-solid fa-user" />
                                Conta
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link link-secondary" :href="route('logout')" method="post" as="button">
                                <font-awesome-icon icon="fa-solid fa-right-from-bracket" />
                                Sair
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>
