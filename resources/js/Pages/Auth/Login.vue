<script setup>
import { ref } from "vue";
import { useForm, Head, Link } from "@inertiajs/vue3";

const isView = ref(false);

const form = useForm({
  email: "",
  password: "",
});

const toggleView = () => {
  isView.value = !isView.value;
};
</script>

<template>
  <Head title="Login" />

  <div class="d-flex justify-content-center align-items-center">
    <div class="card p-5 shadow-lg rounded-4">
      <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">Bem-vindo de volta!</h2>
        <p class="text-muted small">Faça o login para continuar</p>
      </div>

      <form @submit.prevent="form.post(route('login.store'))">
        <!-- Email -->
        <div class="mb-3">
          <label class="form-label fw-semibold" for="email">Email</label>
          <input
            type="email"
            id="email"
            v-model="form.email"
            class="form-control"
            required
            autocomplete="email"
          />
        </div>

        <!-- Senha -->
        <div class="mb-3">
          <label class="form-label fw-semibold" for="password">Senha</label>
          <div class="input-group">
            <input
              :type="isView ? 'text' : 'password'"
              id="password"
              v-model="form.password"
              class="form-control"
              required
            />
            <button
              type="button"
              class="btn btn-primary text-white"
              @click="toggleView"
            >
              <font-awesome-icon
                :icon="isView ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"
              />
            </button>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
          <Link class="text-decoration-none small" href="#">Esqueceu sua senha?</Link>
        </div>

        <div class="d-grid mb-2">
          <button
            type="submit"
            class="btn btn-primary fw-semibold py-2 text-white"
            :disabled="form.processing"
          >
            Entrar
          </button>
        </div>

        <p class="text-center small text-muted mb-4">
          Ao fazer login você concorda com os
          <a href="#" target="_blank">Termos de Uso</a> e
          <a href="#" target="_blank">Política de Privacidade</a>.
        </p>
      </form>

      <!-- Separador -->
      <div class="d-flex align-items-center my-3">
        <hr class="flex-grow-1" />
        <span class="mx-2 text-muted small">ou continue com</span>
        <hr class="flex-grow-1" />
      </div>

      <!-- Login com redes sociais -->
      <div class="d-flex justify-content-center gap-3 mb-4">
        <a
          href="/auth/google/redirect"
          class="btn btn-light border d-flex align-items-center gap-2 px-3 py-2 shadow-sm"
        >
          <font-awesome-icon icon="fa-brands fa-google" class="text-danger fs-5" />
          <span class="fw-semibold d-none d-sm-inline text-dark">Google</span>
        </a>

        <a
          href="/auth/facebook/redirect"
          class="btn btn-primary d-flex align-items-center gap-2 px-3 py-2 shadow-sm text-white"
        >
          <font-awesome-icon icon="fa-brands fa-facebook-f" class="fs-5" />
          <span class="fw-semibold d-none d-sm-inline">Facebook</span>
        </a>
      </div>

      <!-- Links extras -->
      <div class="text-center small">
        <Link :href="route('register')" class="text-decoration-none fw-semibold">
          Ainda não possui uma conta?
          <span class="text-dark">Registre-se</span>
        </Link>
      </div>
    </div>
  </div>
</template>
