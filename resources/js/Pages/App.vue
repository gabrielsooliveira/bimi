<script setup>
import { Head } from '@inertiajs/vue3';
import Logo from '@/assets/images/logo-gradient.svg';
import LinkButton from '@/js/Components/LinkButton.vue';

const props = defineProps ({
    services: Array
});
</script>

<template>
    <Head title="Painel de Empresas"></Head>
        <div class="d-flex align-items-center  text-center bg-light vh-100">
            <div class="m-auto px-4">
                <img :src="Logo" class="img-fluid">
                <p class="text-secondary mt-4 semi-bold fs-4">Porque solucionar para um, quando podemos transformar o atendimento para todos?</p>
                <div class="mt-3 row">
                    <div class="col-md-4 mt-3" v-for="service in props.services" :key="service.id">
                        <LinkButton :service="service"></LinkButton>
                    </div>
                </div>

                <footer class="mt-5 text-secondary">
                    <p>© 2024 - Desenvolvido pela equipe Humam AI.</p>
                </footer>
            </div>
        </div>
</template>
