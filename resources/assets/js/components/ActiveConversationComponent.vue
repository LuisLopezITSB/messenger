<template>
    <b-row class="h-100">
        <b-col cols="8">
            <b-card no-body
                footer-bg-variant="light"
                footer-border-variant="dark"
                title="Conversación Activa"
                class="h-100">

                <b-card-body class="card-body-scroll">
                    <message-conversation-component v-for="message in messages" :key="message.id" :written-by-me="message.written_by_me">
                        {{ message.content }}
                    </message-conversation-component>
                </b-card-body>

                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessages" autocomplete="off">
                        <b-input-group>
                            <b-form-input v-model="newMessage" class="text-center" type="text" placeholder="Escribe un mensaje"></b-form-input>
                            <b-input-group-append>
                                <b-button type="submit" variant="primary">Enviar</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>
                </div>
            </b-card>
        </b-col>
        <b-col cols="4">
            <b-img rounded="circle" blank width="60" height="60" blank-color="#777" alt="image" class="m-1">
            </b-img>
            <p>{{ contactName }}</p>
            <hr>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>
<script>
export default {
    props: {
        contactId: Number,
        contactName: String,
        messages: Array,
    },
    data(){
        return {            
            newMessage: '',
        }
    },
    mounted(){
            
    },
    methods: {        
        postMessages(){
            const params = {
                to_id: this.contactId,
                content: this.newMessage
            };
            axios.post('/api/messages', params)
            .then((response) => {                
                if(response.data.success){
                    this.newMessage = '';
                    const message = response.data.message;
                    message.written_by_me = true;
                    this.$emit('messageCreated', message);
                }
            });
        },
        scrollToBottom(){
            const el = document.querySelector('.card-body-scroll');
            el.scrollTop = el.scrollHeight;
        }
    },
    updated() {
        this.scrollToBottom();
    }
}
</script>
<style scoped>
    .card-body-scroll {
        max-height: calc(100vh - 122px);
        overflow-y: auto;
    }
</style>