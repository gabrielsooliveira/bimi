<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    service: Object,
});

const menu = [
    {
        href: props.service.slug + '.index.home',
        title: 'Inicio',
        icon: 'fa-solid fa-house'
    },
    {
        href: props.service.slug + '.index.home',
        title: 'Faturas',
        icon: 'fa-solid fa-money-bill-wave'
    },
    {
        href: props.service.slug + '.index.home',
        title: 'Conta',
        icon: 'fa-solid fa-user'
    },
    {
        href: props.service.slug + '.logout',
        title: 'Sair',
        icon: 'fa-solid fa-right-from-bracket',
        method: 'post', // O método post para logout
        as: 'button' // Botão para post
    }
];
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
                        <li v-for="item in menu" :key="item.title" class="nav-item">
                            <Link
                                class="nav-link link-secondary"
                                :aria-current="item.href === $page.url ? 'page' : null"
                                :class="{ 'active': $page.url === item.href }"
                                :href="route(item.href)"
                                v-bind="{ method: item.method || 'get', as: item.as || 'a' }"
                            >
                                <font-awesome-icon :icon="item.icon" />
                                {{ item.title }}
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>
