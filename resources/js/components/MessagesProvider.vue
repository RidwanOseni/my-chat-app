<template>
    <div class="msg-provider" :contact="contact" ref="provider">

        <div class="chat-output-box card" v-chat-scroll>
            <div class="chat-messages" v-for="message in messages" :key="message.id" >
                <ul v-for="item in message" :key="item.id" :class="`message${item.to == contact.id ? ' sent' : ' received'} `">
                    <li>
                        {{ item.text }}
                    </li>
                </ul>
            </div>
        </div>

    </div>
</template>

<script>

export default {
    props: {
        contact: {
            type: Object,
        },

        messages: {
            type: Array,
            required: true
        },
    },
    methods: {

    scrollToBottom() {
        setTimeout(()=> {
            this.$refs.provider.scrollTop =this.$refs.provider.scrollHeight - this.$refs.provider.clientHeight;
        }, 50);

        }
    },
    watch: {
        contact(contact) {
            this.scrollToBottom();
        },
        messages(messages) {
            this.scrollToBottom();
        }
    }
}
</script>
