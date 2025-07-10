<script setup>
import { ref } from 'vue';
import axios from 'axios';
import ModalDialog from '@/js/Components/ModalDialog.vue';

const props = defineProps({
    service: Object
});

const showModal = ref(false);
const chatHistory = ref([]);
const message = ref('');

const submitForm = async () => {
    if (!message.value.trim()) return;

    try {
        const response = await axios.post(route('chat-bot'), {
            message: message.value,
            service: props.service
        });

        const botReply = response.data.reply;

        chatHistory.value.push({
            user: message.value,
            bot: botReply
        });

        message.value = '';

    } catch (error) {
        console.error('Erro ao enviar a mensagem:', error);
    }
};

const showModalChat = () => {
    showModal.value = true;
};

// Finalizar conversa e enviar histórico
const endConversation = async () => {
    try {
        await axios.post(route('end-chat'), {
            chatHistory: chatHistory.value,
            service: props.service
        });
        alert('Conversa finalizada e registrada com sucesso.');
        chatHistory.value = []; // Limpar histórico após salvar
        showModal.value = false; // Fechar modal
    } catch (error) {
        console.error('Erro ao finalizar a conversa:', error);
    }
};
</script>

<template>
    <button
        type="button"
        class="btn btn-light position-fixed bottom-0 end-0 p-2 m-3 rounded bg-primary text-white fw-bold"
        @click="showModalChat"
    >
        <font-awesome-icon icon="fa-solid fa-robot" /> BIMI
    </button>

    <ModalDialog :isVisible="showModal" @close="showModal = false" title="BIMI - Assistente Virtual" size="lg">
        <button @click="endConversation" class="btn btn-danger mb-2 btn-sm ms-auto d-block">Finalizar Conversa</button>
        <div class="overflow-y-auto p-4 bg-light rounded" style="height: 300px">
            <div v-for="(message, index) in chatHistory" :key="index">
                <!-- Mensagem do Usuário -->
                <div class="d-flex justify-content-end my-1" v-if="message.user">
                    <div class="p-3 bg-primary text-white rounded-3">
                        {{ message.user }}
                    </div>
                </div>
                <!-- Resposta do Bot -->
                <div class="d-flex justify-content-start my-1" v-if="message.bot">
                    <div class="p-3 bg-secondary text-white rounded-3">
                        {{ message.bot }}
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <form @submit.prevent="submitForm" class="w-100 d-flex">
            <textarea name="message" id="message" class="form-control me-2" rows="1" v-model="message"></textarea>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </ModalDialog>
</template>
