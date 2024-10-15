<script setup>
import { useForm, Head, Link } from '@inertiajs/vue3';
import Toast from '@/js/Components/Toast.vue';
import Logo from '@/assets/images/logo-gradient.svg';

const props = defineProps({
    service: Object,
});

const form = useForm({
    email: '',
    password: ''
});

const route_name = props.service.slug + '.login';
</script>

<template>
    <Head title="Login"></Head>
    <div class="d-flex align-items-center text-center bg-body-tertiary vh-100">
        <div class="row w-100 h-100">
            <div class="col-lg-8 d-none d-lg-flex align-items-center justify-content-center h-100 bg-secondary">
                <h1 class="text-white text-center">{{ service.name }}</h1>
            </div>
            <div class="col-lg-4 col-12 d-flex align-items-center h-100">
                <div class="p-4 w-100">
                    <div class="d-flex justify-content-end mb-5">
                        <Link :href="route('panel')" class="text-decoration-none fw-bold link-secondary">
                        <font-awesome-icon icon="fa-solid fa-right-from-bracket" /> Retornar</Link>
                    </div>
                    <img :src="Logo" class="img-fluid my-5">

                    <div class="form-signin m-auto">
                        <form @submit.prevent="form.post(route(route_name))">
                            <div class="form-floating mt-2">
                                <input type="email" class="form-control" id="floatingEmail" v-model="form.email"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="floatingPassword"
                                    v-model="form.password" placeholder="Password">
                                <label for="floatingPassword">Senha</label>
                            </div>

                            <button type="submit" class="btn btn-secondary w-100 mt-3">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Toast></Toast>
</template>
