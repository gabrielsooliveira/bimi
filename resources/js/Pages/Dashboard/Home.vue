<script setup>
import { useForm, Head, Link } from "@inertiajs/vue3";
import LogoMin from "@/assets/images/logo-min-gradient.svg";
import PlanCard from "@/js/Components/PlanCard.vue";

const props = defineProps({
    chatHistory: {
        type: Array,
        default: () => [],
    },
    user: Object,
    plans: Array
});

const form = useForm({
    message: "", // Mensagem a ser enviada
});

function submitForm() {
    form.post(route("chat")); // Envia a mensagem para o backend
}
</script>

<template>
    <Head title="Home"></Head>
    <div class="px-4">
        <div class="container mt-5">
            <div v-if="plans.length > 0">
                <p class="lead text-center mb-5">Conheça nosso planos.</p>
                <div class="row g-4">
                    <PlanCard
                        v-for="plan in plans"
                        :key="plan.id"
                        :plan="plan"
                    />
                </div>
            </div>
        </div>
    </div>

    <!-- Botão para Abrir o Modal -->
    <button
        type="button"
        class="btn btn-light position-fixed bottom-0 end-0 p-2 m-3 rounded"
        data-bs-toggle="modal"
        data-bs-target="#chatModal"
    >
        <img :src="LogoMin" class="img-fluid" width="35" />
    </button>

    <div
        class="modal fade"
        id="chatModal"
        tabindex="-1"
        aria-labelledby="chatModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatModalLabel">BIMI</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <!-- Área do Chat -->
                    <div
                        class="overflow-y-auto p-4 bg-light"
                        style="max-height: 400px"
                    >
                        <div
                            class="message mb-3"
                            v-for="(message, index) in chatHistory"
                            :key="index"
                        >
                            <div
                                class="d-flex justify-content-end my-1"
                                v-if="message.user"
                            >
                                <div
                                    class="p-3 bg-primary text-white rounded-3"
                                >
                                    {{ message.user }}
                                </div>
                            </div>
                            <div
                                class="d-flex justify-content-start my-1"
                                v-if="message.bot"
                            >
                                <div
                                    class="p-3 bg-secondary text-white rounded-3"
                                >
                                    {{ message.bot }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form @submit.prevent="submitForm" class="w-100 d-flex">
                        <input
                            type="text"
                            class="form-control me-2"
                            placeholder="Digite sua mensagem..."
                            aria-label="Digite sua mensagem"
                            v-model="form.message"
                        />
                        <button
                            type="submit"
                            class="btn btn-primary"
                            :disabled="form.processing"
                        >
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
