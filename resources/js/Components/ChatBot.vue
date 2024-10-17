<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import ModalDialog from '@/js/Components/ModalDialog.vue';

const props = defineProps({
    service: Object
});

const showModal = ref(false);
const form = ref({
    message: '',
    service: props.service
});

const chatHistory = ref([]);

const submitForm = () => {
    if (form.value.message.trim() === '') {
        return;
    }
    console.log(form);
    // Enviar a mensagem do usuário para o backend
    form.post(route('chat-bot'), {
        onSuccess: (page) => {
            // Atualizar histórico do chat
            chatHistory.value.push({
                user: form.value.message,    // Mensagem do usuário
                bot: page.props.response.reply,  // Resposta do chatbot
            });

            form.value.message = '';  // Limpar campo de input
        },
        onError: (errors) => {
            console.error('Erro ao enviar mensagem:', errors);
        }
    });
};

const showModalChat = () => {
    showModal.value = true;
};
</script>

<template>
    <button
        type="button"
        class="btn btn-light position-fixed bottom-0 end-0 p-2 m-3 rounded bg-secondary text-white fw-bold"
        @click="showModalChat()"
    >
        <font-awesome-icon icon="fa-solid fa-robot" /> BIMI
    </button>
    <ModalDialog :isVisible="showModal" @close="showModal = false" title="BIMI - Assistente Virtual" size="lg">
        <div class="overflow-y-auto p-4 bg-light">
            <div
                class="message mb-3"
                v-for="(message, index) in chatHistory"
                :key="index"
            >
                <!-- Mensagem do Usuário -->
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

                <!-- Resposta do Bot -->
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
        <hr>
        <form @submit.prevent="submitForm" class="w-100 d-flex">
            <textarea name="message" id="message" class="form-control me-2" rows="1" v-model="form.message"></textarea>
            <button type="submit" class="btn btn-primary" :disabled="form.processing">Enviar</button>
        </form>
    </ModalDialog>
</template>

